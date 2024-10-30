<template>
    <div class="container-fluid px-4" :class="{ 'hidden': currentComponent === 'Purches' }">
        <div v-if="loading" class="d-flex justify-content-center align-items-center" style="height: 100vh;">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <div v-else>
            <div class="card mt-4 mb-3">
                <div class="card-header border-bottom-0 p-4">
                    <router-link class="text-decoration-none h5" to="/home">Dashboard</router-link>
                    <span class="text-muted h5"> / Purchase-List</span>
                </div>
            </div>
            <div class="card mb-4 mt-3 tt">
                <div class="card-header d-flex justify-content-between">
                    <div class="employee_table">
                        <i class="fas fa-table me-1"></i>
                        Purchase List
                    </div>
                    <div class="link_button">
                        <button class="btn btn-primary" @click="currentComponent = 'Purches'">Add Purchase</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table_size">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>PARTY NAME</th>
                                    <th>PAYMENT TYPE</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="purchase in purchases" :key="purchase.id">
                                    <td>{{ formatDate(purchase.created_at) }}</td>
                                    <td>{{ purchase.customer_name }}</td>
                                    <td>{{ purchase.payment_type }}</td>
                                    <td>{{ purchase.grand_total }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <component :is="currentComponent" @close="close"></component>
</template>

<script>
import Purches from './Purches.vue';
export default {
    name: "PurchaseList",
    components: {
        Purches
    },
    data() {
        return {
            currentComponent: null,
            company_id: null,
            purchases: [],
            loading: true,
        };
    },
    methods: {
        async fetchCompanyWistPurchase() {
            this.loading = true;
            await axios.get(`/api/purchase_products/${this.company_id}`)
                .then((res) => {
                    this.purchases = res.data
                })
                .catch((error) => {
                    console.log(error)
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        formatDate(dateString) {
            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            return `${day}/${month}/${year}`;
        },
        close() {
            this.currentComponent = null,
                this.fetchCompanyWistPurchase();
        }
    },
    mounted() {
        this.company_id = localStorage.getItem("company_id");
        if (this.company_id) {
            this.fetchCompanyWistPurchase()
        }
        else {
            this.$router.push({ name: "AllCompany" })
        }
    }
}
</script>

<style>
.hidden {
    display: none;
}

.spinner-border {
    width: 3rem;
    height: 3rem;
    color: rgb(13, 202, 240);
}
</style>