<template>
  <div class="container-fluid px-4">
    <div class="card mt-4 mb-3">
      <div class="card-header border-bottom-0 p-4">
        <router-link class="text-decoration-none h5" to="/home">Dashboard</router-link>
        <span class="text-muted h5"> / Supplier</span>
      </div>
    </div>

    <!-- for table part -->
    <div class="card mb-4 mt-3 tt">
      <div class="card-header d-flex justify-content-between">
        <div class="employee_table">
          <i class="fas fa-table me-1"></i>
          Supplier List
        </div>
        <div class="link_button">
          <router-link to="/all_account" class="btn btn-primary">Add New</router-link>
        </div>
      </div>
      <div class="card-body">
        <div class="table_size">
          <table class="table table-bordered table-striped table-hover">
            <thead>
              <tr>
                <th>Supplier Name</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="supplier in suppliers" :key="supplier.id">
                <td>{{ supplier.supplier_name }}</td>
                <td>{{ supplier.amount }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "SupplierList",
  data() {
    return {
      company_id: null,
      suppliers: []
    }
  },
  methods: {
    async fetchCompanyWiseSupplier() {
      await axios.get(`/api/company_supplier/${this.company_id}`)
        .then((res) => {
          this.suppliers = res.data
        })
        .catch((error) => {
          console.log(error)
        })
    }
  },
  mounted() {
    this.company_id = localStorage.getItem("company_id")
    if (this.company_id) {
      this.fetchCompanyWiseSupplier()
    }
    else {
      this.$router.push({ name: "AllCompany" })
    }
  }
}
</script>

<style scoped></style>