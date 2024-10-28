<?php

namespace App\Http\Controllers;

use App\Jobs\SendOtpEmail;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\OtpVerification;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login', 'signup', 'sendOTP']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email or password is invalid'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function sendOTP(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $otp = rand(100000, 999999);
        OtpVerification::create([
            'email' => $request->email,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(5),
        ]);
        SendOtpEmail::dispatch($request->email, $otp);

        return response()->json([
            'message' => 'OTP sent to your email',
            'companyName' => $request->companyName,
            'email' => $request->email,
        ]);
    }
    public function signup(Request $request)
    {
        $request->validate([
            'otp' => 'required|string',
        ]);
        $otpVerification = OtpVerification::where('email', $request->email)
            ->latest() // Orders by 'created_at' in descending order
            ->first();
        if (!$otpVerification) {
            return response()->json(['message' => 'OTP not found'], 404);
        }

        if (Carbon::now()->greaterThan($otpVerification->expires_at)) {
            return response()->json(['message' => 'OTP has expired'], 400);
        }

        if ($otpVerification->otp !== $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }
        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->country = $request->country;
        $user->save();

        $userId = $user->id;
        $company = new Company();
        $company->company_name = $request->companyName;
        $company->mobile = $request->mobile;
        $company->email = $request->email;
        $company->user_id = $userId;

        $company->save();

        $otpVerification->delete();
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Could not log in after signup'], 401);
        }
        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    public function all_user()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(JWTAuth::refresh(JWTAuth::getToken()));
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        // Fetch the TTL from the config, multiplied by 60 to convert minutes to seconds
        $ttl = config('jwt.ttl') * 60;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl, // TTL in seconds for 24 hours
            'name' => auth()->user()->id,
            // 'name' => auth()->user()->userName,
            'email' => auth()->user()->email,
            'mobile' => auth()->user()->mobile,
            // 'role_name' => auth()->user()->role->role_name,
            // 'image' => auth()->user()->profile_img,
            // 'status' => auth()->user()->status,
        ]);
    }
}
