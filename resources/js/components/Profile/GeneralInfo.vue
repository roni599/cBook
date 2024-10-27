<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <form @submit.prevent="signup">
          <div class="row mb-3">
            <div class="col-md-12">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName1" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Proprietor Name</label>
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
                <input class="form-control" id="inputFirstName2" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Mobile</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="inputEmail5" type="email" placeholder="name@example.com" />
            <label for="inputEmail1">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="inputEmail7" type="text" placeholder="name@example.com" />
            <label for="inputEmail2">Address</label>
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
  name: "GeneralInfo",
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