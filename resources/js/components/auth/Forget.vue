<template>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <h1 class="text-center mb-1">cBook</h1>
                            <h3 class="text-center mb-3">Recovery Password</h3>
                            <router-link class="btn btn-sm btn-primary px-5 py-2 w-100 mb-4" to="/register">Create New
                                Company</router-link>
                            <!-- <div class="card shadow-lg border-0 rounded-lg mt-5"> -->
                            <!-- <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                                </div> -->
                            <!-- <div class="card-body"> -->
                            <form>
                                <div v-if="currentStep === 'beforeOTP'" class="beforeOTP">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" type="email"
                                            placeholder="name@example.com" />
                                        <label for="inputEmail">Please Your Email address</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <!-- <router-link to="/">Return to login</router-link>
                                        <div class="small">
                                            <router-link to="/register">Need an account? Sign up!</router-link>
                                        </div> -->
                                        <button type="button" class="btn btn-primary w-100"
                                            @click="goToStep('sendotp')">Send
                                            OTP</button>
                                    </div>
                                </div>

                                <div v-if="currentStep === 'sendotp'" class="sendotp">
                                    <div
                                        class="form-floating mb-3 d-flex justify-content-between align-items-center gap-2">
                                        <input v-model="otp" @input="checkOtp" class="form-control" type="text"
                                            placeholder="Enter OTP" maxlength="8" />
                                        <label for="inputEmail2">Check email and enter your OTP</label>
                                        <span v-if="isValid" style="color: green;">✓</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="button" class="btn btn-primary w-100"
                                            @click="goToStep('regeneratePassword')">Next</button>
                                    </div>
                                </div>

                                <div v-if="currentStep === 'regeneratePassword'" class="regeneratePassword">
                                    <p class="text-center text-primary">ekroni99@gmail.com</p>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="newPassword" type="password"
                                            placeholder="New Password" />
                                        <label for="newPassword">New Password</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="rePassword" type="password"
                                            placeholder="Re-Password" />
                                        <label for="rePassword">Re-Pasword</label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button type="button" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </div>
                            </form>
                            <!-- </div> -->
                            <!-- <div class="card-footer text-center py-3">
                                <div class="small">
                                    <router-link to="/register">Need an account? Sign up!</router-link>
                                </div>
                            </div> -->
                            <!-- </div> -->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import { ref } from 'vue';
export default {
    name: 'Forget-Form',
    data() {
        return {
            currentStep: 'beforeOTP',
            otp: '',
            isChecked: false,
            isValid: false,
        };
    },
    methods: {
        goToStep(step) {
            this.currentStep = step;
        },
        checkOtp() {
            this.isValid = this.otp.length === 8;
        },
    },
    mounted() {
        if (User.loggedIn()) {
            this.$router.push({ name: "LoginForm" });
        }
    },
}
</script>

<style></style>
