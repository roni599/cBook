<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <form @submit.prevent="signup">
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Account Name</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Bank Name</label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Account Type</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">A/C No</label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Routing Number</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Bank Address</label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Bank Tow
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Card
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Mobile Bank
                </label>
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
  name: "BankInfo",
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