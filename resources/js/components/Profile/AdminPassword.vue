<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <form>
          <div v-if="currentStep === 'beforeOTP'" class="beforeOTP">
            <div class="row mb-3">
              <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                  <input class="form-control" id="inputFirstName2" type="text" placeholder="Enter your first name" />
                  <label for="inputFirstName">Mobile</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-floating mb-3 mb-md-0">
                  <input class="form-control" id="inputFirstName2" type="text" placeholder="Enter your first name" />
                  <label for="inputFirstName">Mobile</label>
                </div>
              </div>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
              <label for="inputEmail">Please Your Email address</label>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
              <button type="button" class="btn btn-primary w-100" @click="goToStep('sendotp')">Send
                OTP</button>
            </div>
          </div>

          <div v-if="currentStep === 'sendotp'" class="sendotp">
            <div class="form-floating mb-3 d-flex justify-content-between align-items-center gap-2">
              <input v-model="otp" @input="checkOtp" class="form-control" type="text" placeholder="Enter OTP"
                maxlength="8" />
              <label for="inputEmail2">Check email and enter your OTP</label>
              <span v-if="isValid" style="color: green;">✓</span>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
              <button type="button" class="btn btn-primary w-100" @click="goToStep('regeneratePassword')">Next</button>
            </div>
          </div>

          <div v-if="currentStep === 'regeneratePassword'" class="regeneratePassword">
            <div class="form-floating mb-3">
              <input class="form-control" id="newPassword" type="password" placeholder="New Password" />
              <label for="newPassword">New Password</label>
            </div>
            <div class="form-floating mb-3">
              <input class="form-control" id="rePassword" type="password" placeholder="Re-Password" />
              <label for="rePassword">Re-Pasword</label>
            </div>
            <div class="row mb-3">
              <div class="col-md-11">
                <div class="form-floating mb-3 mb-md-0">
                  <input class="form-control p-3 px-4" id="inputFile" type="file" @change="onFileSelect" />
                </div>
              </div>
              <div class="col-md-1">
                <div class="form-floating mb-3 mb-md-0">
                  <img src="#" width="55" height="55" />
                </div>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
              <button type="button" class="btn btn-primary w-100">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { inject } from 'vue';
export default {
  name: "AdminPassword",
  data() {
    const company_Name = inject('company_Name');
    return {
      currentStep: 'beforeOTP',
      otp: '',
      isChecked: false,
      isValid: false,
      company_Name,
    }
  },
  methods: {
    goToStep(step) {
      this.currentStep = step;
    },
    checkOtp() {
      this.isValid = this.otp.length === 8;
    },
    async companyfind() {
      console.log(this.company_id)
      axios.get(`/api/user_company_find/${this.company_id}`)
        .then((res) => {
          console.log(res)
          if (res.data.companyName) {
            this.companyName = res.data.companyName
            this.company_Name = res.data.companyName
          }
          else {
            this.companyName = res.data.company_name
            this.company_Name = res.data.company_name
          }
        })
        .catch((error) => {
          console.log(error)
        })
    }
  },
  mounted() {
    this.company_id = localStorage.getItem('company_id')
    this.companyfind()
  }
}
</script>

<style></style>