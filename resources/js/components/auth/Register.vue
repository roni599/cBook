<template>
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-7">
              <h1 class="text-center">cBook</h1>
              <h3 class="text-center font-weight-light mb-4">Create Company</h3>
              <div v-if="currentStep === 'beforeOTP'" class="beforeOTP">
                <form @submit.prevent="signup">
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputFirstName1" type="text" placeholder="Enter your first name"
                          v-model="form.name" />
                        <small class="text-danger" v-if="errors.name">{{ errors.name[0] }}</small>
                        <label for="inputFirstName">Business/Company Name</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <select class="form-select" aria-label="Default select example">
                          <option selected>Country</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="India">India</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputFirstName2" type="text" placeholder="Enter your first name"
                          v-model="form.mobile" />
                        <small class="text-danger" v-if="errors.mobile">{{ errors.mobile[0] }}</small>
                        <label for="inputFirstName">Mobile</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-floating mb-3">
                    <input class="form-control" id="inputEmail5" type="email" placeholder="name@example.com"
                      v-model="form.email" />
                    <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                    <label for="inputEmail1">Email address</label>
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
                        <label for="inputPasswordConfirm">Company Confirm Password</label>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 mb-0">
                    <div class="d-grid">
                      <button type="button" class="btn btn-primary w-100" @click="goToStep('sendotp')">Send
                        OTP</button>
                    </div>
                  </div>
                </form>
              </div>

              <div v-if="currentStep === 'sendotp'" class="sendotp mt-3">
                <p class="text-primary text-center"><span>DreamTechbd</span><br><span>ekroni99@gmail.com</span></p>
                <div class="form-floating mb-3 d-flex justify-content-between align-items-center gap-2">
                  <input v-model="otp" @input="checkOtp" class="form-control" type="text" placeholder="Enter OTP"
                    maxlength="8" />
                  <label for="inputEmail2">Check email and enter your OTP</label>
                  <span v-if="isValid" style="color: green;">✓</span>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                  <button type="button" class="btn btn-primary w-100" @click="signup">Create</button>
                </div>
              </div>
              <div class="mt-1">
                <router-link to="/">Have an account? Go to login</router-link>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
export default {
  name: "Register-Form",
  data() {
    return {
      currentStep: 'beforeOTP',
      otp: '',
      isChecked: false,
      isValid: false,
      form: {
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        mobile: null
      },
      errors: {}
    };
  },
  methods: {
    goToStep(step) {
      this.currentStep = step;
    },
    checkOtp() {
      this.isValid = this.otp.length === 8;
    },
    async signup() {
      this.$router.push({ name: 'Home' })
      // await axios.post("/api/auth/signup", this.form)
      //   .then((res) => {
      //     User.responseAfterLogin(res);
      //     this.$router.push({ name: 'Home' });
      //   })
      //   .catch((error) => {
      //     this.errors = error.response.data.errors;
      //   });
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
