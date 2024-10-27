<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <form @submit.prevent="signup">
          <div class="row mb-3">
            <div class="col-md-6">
              <span>Business Logo</span>
              <div class="form-floating d-flex justify-center mb-3 mb-md-0">
                <div class="form-floating mb-3 mb-md-0">
                  <img src="#" width="140" height="140" />
                </div>
                <div class="forbutton align-items-center ms-2" style="margin-top: 40px;">
                  <input type="file" id="inputFile" style="display:none;" />
                  <button type="button" class="btn btn-sm btn-primary mb-2"
                    onclick="document.getElementById('inputFile').click();">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i>
                  </button>
                  <button class="btn btn-sm btn-primary d-block"><i class="fa-solid fa-trash"></i></button>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <span>Signature</span><span class="ms-1"><i class="fa-solid fa-pen"></i></span>
              <div class="form-floating d-flex justify-center mb-3 mb-md-0">
                <div class="form-floating mb-3 mb-md-0">
                  <img src="#" width="180" height="70" />
                </div>
                <div class="forbutton align-items-center ms-2" style="margin-top: 0px;">
                  <input type="file" id="inputFile" style="display:none;" />
                  <button type="button" class="btn btn-sm btn-primary mb-2"
                    onclick="document.getElementById('inputFile').click();">
                    <i class="fa-solid fa-arrow-up-from-bracket"></i><br>
                  </button>
                  <button class="btn btn-sm btn-primary d-block"><i class="fa-solid fa-trash"></i></button>
                </div>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
            <button type="button" class="btn btn-primary w-100">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import { inject } from 'vue';
export default {
  name: "LogoSignature",
  data() {
    const company_Name = inject('company_Name');
    return {
      company_Name,
    }
  },
  methods: {
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

<style scoped></style>