<template>
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <h1 class="text-center">cBook</h1>
              <h3 class="text-center font-weight-light mb-4">Create Company</h3>

              <!-- Step 1: Before OTP Verification -->
              <div v-if="currentStep === 'beforeOTP'" class="beforeOTP">
                <form @submit.prevent="sendOTP">
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputCompanyName" type="text" placeholder="Enter company name"
                          v-model="form.companyName" />
                        <small class="text-danger" v-if="errors.companyName">{{ errors.companyName[0] }}</small>
                        <label for="inputCompanyName">Business/Company Name</label>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <select class="form-select" v-model="form.country">
                          <option disabled value="">Select Country</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="India">India</option>
                        </select>
                        <small class="text-danger" v-if="errors.country">{{ errors.country[0] }}</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputMobile" type="text" placeholder="Enter mobile number"
                          v-model="form.mobile" />
                        <small class="text-danger" v-if="errors.mobile">{{ errors.mobile[0] }}</small>
                        <label for="inputMobile">Mobile</label>
                      </div>
                    </div>
                  </div>

                  <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com"
                      v-model="form.email" />
                    <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                    <label for="inputEmail">Email address</label>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputPassword" type="password" placeholder="Create a password"
                          v-model="form.password" />
                        <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                        <label for="inputPassword">Company Password</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputPasswordConfirm" type="password"
                          placeholder="Confirm password" v-model="form.password_confirmation" />
                        <label for="inputPasswordConfirm">Confirm Password</label>
                      </div>
                    </div>
                  </div>

                  <div class="mt-4 mb-0">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary w-100">Send OTP</button>
                    </div>
                  </div>
                </form>
              </div>

              <!-- Step 2: OTP Verification -->
              <div v-if="currentStep === 'sendotp'" class="sendotp mt-3">
                <p class="text-primary text-center">
                  <span>Company Name : {{ after_send_otp_companyName }}</span><br>
                  <span class="mb-1">Email : {{ after_send_email }}</span><br>
                  <span class="text-danger">{{ after_send_message }}</span><br>
                  <span v-if="timer > 0" class="text-success"><br>
                    OTP valid for: {{ formattedTime }}
                  </span>
                  <span v-else class="text-danger">
                    OTP expired!
                    <button @click="resendOtp" class="btn btn-link p-0">Resend OTP</button>
                  </span>
                </p>
                <div class="form-floating mb-3 d-flex justify-content-between align-items-center gap-2">
                  <input v-model="form.otp" class="form-control" type="text" placeholder="Enter OTP" maxlength="8" />
                  <label for="inputOtp">Check your email for OTP</label>
                  <span v-if="isValidOtp" class="text-success">✓</span>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary w-100" @click.prevent="signup"
                    :disabled="form.otp.length !== 6">Create</button>
                </div>
              </div>

              <div class="mt-1">
                <router-link to="/">Already have an account? Go to login</router-link>
              </div>

            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: "Register-Form",
  data() {
    return {
      currentStep: 'beforeOTP',
      otp: '',
      isValidOtp: false,
      form: {
        companyName: '',
        otp: '',
        country: '',
        mobile: '',
        email: '',
        password: '',
        password_confirmation: '',
      },
      timer: 60,
      errors: {},
      after_send_otp_companyName: '',
      after_send_email: '',
      after_send_message: ''
    };
  },
  computed: {
    formattedTime() {
      const minutes = Math.floor(this.timer / 60);
      const seconds = this.timer % 60;
      return `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
    }
  },
  methods: {
    async resendOtp() {
      try {
        const response = await axios.post('/api/auth/send_otp', {
          email: this.form.email,
          companyName: this.form.companyName,
        });
        this.timer = 60;
        this.startTimer();
        this.after_send_message = 'New OTP sent successfully!';
      } catch (error) {
        this.after_send_message = 'Error resending OTP!';
      }
    },
    startTimer() {
      const countdown = setInterval(() => {
        if (this.timer > 0) {
          this.timer--;
        } else {
          this.after_send_message = ''
          this.form.otp = ''
          clearInterval(countdown);
        }
      }, 1000);
    },
    async sendOTP() {
      try {
        const response = await axios.post('/api/auth/send_otp', this.form);
        if (response) {
          this.startTimer();
          this.after_send_email = response.data.email,
            this.after_send_message = response.data.message,
            this.after_send_otp_companyName = response.data.companyName
          this.goToStep('sendotp');
        }
      } catch (error) {
        this.errors = error.response.data.errors || {};
      }
    },
    checkOtp() {
      this.isValidOtp = this.otp.length === 8;
    },
    async signup() {
      try {
        const response = await axios.post('/api/auth/signup', this.form);
        if (response) {
          this.resetForm();
          User.responseAfterLogin(response);
          Toast.fire({
            icon: "success",
            title: "Signed in successfully"
          });
          this.$router.push({ name: "Home" });
        }
      } catch (error) {
        console.log(error)
      }
    },
    resetForm() {
      this.form = {
        userName: '',
        companyName: '',
        otp: '',
        country: '',
        mobile: '',
        email: '',
        password: '',
        password_confirmation: '',
      };
    },
    goToStep(step) {
      this.currentStep = step;
    }
  }
};
</script>


<style>
.sendotp {
  display: block;
}

.beforeOTP {
  display: block;
}
</style>
