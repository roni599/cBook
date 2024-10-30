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
                    <table class="table table-bordered table-striped table-hover pointer">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customer in customers" :key="customer.id" @click="laser(customer.id)">
                                <td>{{ customer.customer_name }}</td>
                                <td>{{ customer.amount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="customerLaser" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-half-screen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card rounded-lg mt-3">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <div class="icon_text d-flex gap-2 mt-3">
                                            <p><i class="fa-regular fa-address-card"></i></p>
                                            <p class="text-black font-bold">
                                                {{ lasers.length > 0 ? lasers[0].customer.customer_name + ' Laser' : 'No Laser'}}
                                            </p>
                                        </div>
                                        <div class="code"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table_size">
                                            <table class="table table-bordered table-striped table-hover"
                                                v-if="lasers.length > 0">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <!-- <th>Customer Name</th> -->
                                                        <th>Type</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="laser in lasers" :key="laser.id">
                                                        <td>{{ formatDate(laser.created_at) }}</td>
                                                        <!-- <td>{{ laser.customer.customer_name }}</td> -->
                                                        <td>{{ laser.type }}</td>
                                                        <td>{{ laser.total }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <p v-else class="text-center text-muted">No laser found for this Customer
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            customers: [],
            lasers: []
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
        },
        async laser(id) {
            let myModal = new bootstrap.Modal(
                document.getElementById("customerLaser"),
                {}
            );
            myModal.show();
            await axios.get(`/api/sales_customer_products/${id}`)
                .then((res) => {
                    this.lasers = res.data;
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        formatDate(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        },
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

<style scoped>
.pointer {
    cursor: pointer;
}

.modal-half-screen {
    max-width: 70vw;
    height: 50vh;
}

.modal-content {
    height: 75%;
}
</style>