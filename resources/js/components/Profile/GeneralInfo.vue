<template>
  <div class="container">
    <div class="row mx-3 mt-3">
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
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "GeneralInfo",
  data() {
    return {

    }
  },
  methods: {

  }
}
</script>

<style></style>