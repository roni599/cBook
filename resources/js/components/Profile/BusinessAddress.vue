<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <form @submit.prevent="signup">
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
                <label for="inputFirstName">Zip Code</label>
              </div>
            </div>
          </div>
          <div class="form-floating mb-3">
            <input class="form-control" id="inputEmail7" type="text" placeholder="name@example.com" />
            <label for="inputEmail2">Business Address</label>
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
export default {
  name: "BusinessAddress",
  data() {
    return {

    }
  },
  methods: {

  }
}
</script>

<style></style>