<template>
    <div class="container-fluid px-4">
        <div class="card mt-4 mb-3">
            <div class="card-header border-bottom-0 p-4">
                <router-link class="text-decoration-none h5" to="/home">Dashboard</router-link>
                <span class="text-muted h5"> / Customer</span>
            </div>
        </div>

        <!-- for customer list -->
        <div class="card mb-4 mt-3 tt">
            <div class="card-header d-flex justify-content-between">
                <div class="employee_table">
                    <i class="fas fa-table me-1"></i>
                    Customer List
                </div>
                <div class="link_button">
                    <router-link to="/all_account" class="btn btn-primary">Add New</router-link>
                </div>
            </div>
            <div class="card-body">
                <div class="table_size">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <!-- <th>Company Name</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customer in customers" :key="customer.id">
                                <td>{{ customer.customer_name }}</td>
                                <!-- <td>{{ customer.company.company_name }}</td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "CustomerList",
    data() {
        return {
            company_id: null,
            customers: []
        }
    },
    methods: {
        async fetchCompanyWiseCustomer() {
            await axios.get(`/api/company_customer/${this.company_id}`)
                .then((res) => {
                    this.customers = res.data
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.company_id = localStorage.getItem("company_id")
        if (this.company_id) {
            this.fetchCompanyWiseCustomer()
        }
        else {
            this.$router.push({ name: "AllCompany" })
        }
    }
}
</script>

<style scoped></style>