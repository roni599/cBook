<template>
  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-lg-8">
        <form @submit.prevent="signup">
          <div class="row mb-3">
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Owner Ship</option>
                  <option value="Bangladesh">Self</option>
                  <option value="Pakistan">PartnerShip</option>
                  <option value="India">Others</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="date" placeholder="Enter your first name" />
                <label for="inputFirstName">Business Start Year</label>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="date" placeholder="Enter your first name" />
                <label for="inputFirstName">Software Start Date</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Opening Cash</label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Trade License No</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating mb-3 mb-md-0">
                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Vat/Bin No</label>
              </div>
            </div>
          </div>
          <p class="text-primary mb-2">Business Category</p>
          <div class="row mb-2">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Manufacturing
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Dealership
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Export & Import
                </label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Depot
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Retailer
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  E-Commerce
                </label>
              </div>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Wholesale
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Entrepreneur
                </label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Service
                </label>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-floating mb-3 mb-md-0">
              <select class="form-select" aria-label="Default select example">
                <option selected>Business Type</option>
                <option value="Bangladesh">Self</option>
                <option value="Pakistan">PartnerShip</option>
                <option value="India">Others</option>
              </select>
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
export default {
  name: "BusinessInfo",
  data() {
    return {

    }
  },
  methods: {

  }
}
</script>

<style></style>