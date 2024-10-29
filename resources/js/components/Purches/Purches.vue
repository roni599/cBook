<template>
    <div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <img src="../../../../public/backend/images/users/436_ekRoni.png" width="55" height="55"
                        class="rounded-circle me-2" />
                    <div class="adminName mt-3">
                        <span class="text-warning fw-bold">Login User</span>
                        <p class="mb-0">Md. Ebrahim Khalil</p>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
        </div>
        <form enctype="multipart/form-data" @submit.prevent="submitData">
            <button class="btn btn-sm btn-primary rounded-pill px-3 mb-4 mx-2" type="button" @click="toggleText">
                {{ isCash ? "Cash" : "Credit" }}
                <span><i class="fa-solid fa-angle-right"></i></span>
            </button>

            <div class="row mb-5">
                <div class="col-md-3">
                    <label for="inputName">Cash/Business/Customer Name</label>
                    <div class="d-flex justify-content-start position-relative mb-3 mb-md-0 align-items-center">
                        <div class="for_input position-relative">
                            <input class="form-control pe-5" id="inputName" type="text" v-model="searchQuery"
                                @input="filterCustomers" @focus="filterCustomers" @blur="hideSuggestions"
                                autocomplete="off" />
                            <span class="angle-bracket">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </div>
                        <div class="for_edit_icon">
                            <span class="mt-5 mx-1 text-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                        </div>
                        <div v-if="showSuggestions" class="position-absolute bg-white border rounded"
                            style="top: 100%; z-index: 1000; width: 250px;">
                            <ul class="list-unstyled mb-0">
                                <li v-for="(customer, index) in filteredCustomers" :key="index"
                                    class="p-2 border-bottom customer-item" @click="selectCustomer(customer)"
                                    style="cursor: pointer;">
                                    {{ customer.customer_name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-3">
                    <label for="inputName">Item Name</label>
                    <div class="d-flex justify-content-start position-relative mb-3 mb-md-0 align-items-center">
                        <div class="for_input position-relative">
                            <input class="form-control pe-5" id="inputName" type="text" v-model="searchQueryProduct"
                                @input="filterProducts" @focus="filterProducts" @blur="hideSuggestionsProduct"
                                autocomplete="off" />
                            <span class="angle-bracket">
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </div>
                        <div class="for_edit_icon">
                            <span class="mt-5 mx-1 text-primary">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                        </div>
                        <div v-if="showSuggestionsProduct" class="position-absolute bg-white border rounded"
                            style="top: 100%; z-index: 1000; width: 250px;">
                            <ul class="list-unstyled mb-0">
                                <li v-for="(product, index) in filteredProducts" :key="index"
                                    class="p-2 border-bottom customer-item" @click="selectProduct(product)"
                                    style="cursor: pointer;">
                                    {{ product.product_name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table_part d-flex justify-between">
                <table class="table table-bordered border-dark">
                    <thead>
                        <tr class="bg-info">
                            <th scope="col">Item Name</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(row, index) in rows" :key="index" @click.stop="toggleInput(index)">
                            <td>
                                <span v-if="!row.showInputs">{{ row.itemName }}</span>
                                <input v-else v-model="row.itemName" type="text" class="form-control"
                                    placeholder="Enter Item Name" />
                            </td>
                            <td>
                                <span v-if="!row.showInputs">{{ row.qty }}</span>
                                <input v-else v-model.number="row.qty" type="number" class="form-control"
                                    placeholder="Enter Qty" @input="updateTotal(row)" />
                            </td>
                            <td>
                                <span v-if="!row.showInputs">{{ row.unit }}</span>
                                <input v-else v-model="row.unit" type="text" class="form-control"
                                    placeholder="Enter Unit" />
                            </td>
                            <td>
                                <span v-if="!row.showInputs">{{ row.price }}</span>
                                <input v-else v-model.number="row.price" type="number" class="form-control"
                                    placeholder="Enter Price" @input="updateTotal(row)" />
                            </td>
                            <td>{{ row.total }}</td>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-end">Total</th>
                            <td>{{ grandTotal }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="plus_minus mx-2 mt-3">
                    <span @click.stop="addRow">
                        <i class="fa-solid fa-plus border rounded-circle bg-info p-1 text-white"></i>
                    </span>
                    <br />
                    <span @click.stop="removeRow">
                        <i class="fa-solid fa-minus border rounded-circle bg-info p-1 text-white"></i>
                    </span>
                </div>
            </div>
            <button class="btn btn-success">Submit</button>
        </form>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "Purches",
    data() {
        return {
            customers: [],
            searchQuery: '',
            filteredCustomers: [],
            showSuggestions: false,
            selectedCustomer: null,
            customer_id: null,

            company_id: null,
            user_id: null,
            isCash: true,

            products: [],
            searchQueryProduct: '',
            filteredProducts: [],
            showSuggestionsProduct: false,

            rows: [
                { itemName: '', product_id: '', qty: 0, unit: '', price: 0, total: 0, showInputs: false },
            ],
        }
    },
    computed: {
        grandTotal() {
            return this.rows.reduce((sum, row) => sum + row.total, 0);
        },
    },
    methods: {
        filterCustomers() {
            const query = this.searchQuery.toLowerCase();
            if (query) {
                this.filteredCustomers = this.customers.filter(customer =>
                    customer.customer_name.toLowerCase().includes(query)
                ).slice(0, 5);
            } else {
                this.filteredCustomers = this.customers.slice(0, 5);
            }
            this.showSuggestions = this.filteredCustomers.length > 0;
        },
        selectCustomer(customer) {
            this.selectedCustomer = customer;
            this.customer_id = customer.id;
            this.searchQuery = customer.customer_name;
            this.showSuggestions = false;
        },
        hideSuggestions() {
            setTimeout(() => {
                this.showSuggestions = false;
            }, 200);
        },

        filterProducts() {
            const query = this.searchQueryProduct.toLowerCase();
            if (query) {
                this.filteredProducts = this.products.filter(product =>
                    product.product_name.toLowerCase().includes(query)
                ).slice(0, 5);
            } else {
                this.filteredProducts = this.products.slice(0, 5);
            }
            this.showSuggestionsProduct = this.filteredProducts.length > 0; // Fixed here
        },
        selectProduct(product) {
            const lastRow = this.rows[this.rows.length - 1];
            lastRow.itemName = product.product_name;
            lastRow.product_id = product.id;
            lastRow.unit = product.unit;
            this.searchQueryProduct = product.product_name;
            this.showSuggestionsProduct = false;
            this.updateTotal(lastRow);
        },
        hideSuggestionsProduct() {
            setTimeout(() => {
                this.showSuggestionsProduct = false;
            }, 200);
        },

        toggleText() {
            this.isCash = !this.isCash;
        },
        async fetchUsers() {
            const token = localStorage.getItem('token');
            await axios.get("/api/auth/me", {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then((res) => {
                    this.userName = res.data.user_name;
                    this.profile_img = res.data.profile_img;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        async fetchCompanyWiseCustomer() {
            await axios.get(`/api/company_customer/${this.company_id}`)
                .then((res) => {
                    this.customers = res.data
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        async fetchCompanyWiseProducts() {
            await axios.get(`/api/company_products/${this.company_id}`)
                .then((res) => {
                    this.products = res.data;
                })
                .catch((error) => {
                    console.log(error)
                })
        },

        addRow() {
            this.rows.push({
                itemName: '',
                product_id: '',
                qty: 0,
                unit: '',
                price: 0,
                total: 0,
                showInputs: false,
            });
            this.searchQueryProduct = ''
        },
        removeRow() {
            if (this.rows.length > 1) {
                this.rows.pop();
            }
        },
        toggleInput(index) {
            this.rows.forEach((row, i) => {
                row.showInputs = i === index;
            });
        },
        updateTotal(row) {
            row.total = row.qty * row.price;
        },
        hideInputs() {
            this.rows.forEach(row => (row.showInputs = false));
        },
        async submitData() {
            const paymentType = this.isCash ? "Cash" : "Credit";
            const customerName = this.selectedCustomer ? this.selectedCustomer.customer_name : this.searchQuery;
            const payload = {
                user_id: this.user_id,
                company_id: this.company_id,
                payment_type: paymentType,
                customer_name: customerName,
                items: this.rows.map(row => ({
                    itemName: row.itemName,
                    product_id: row.product_id,
                    qty: row.qty,
                    unit: row.unit,
                    price: row.price,
                    total: row.total,
                })),
                customer_id: this.customer_id,
                grandTotal: this.grandTotal,
            };
            axios.post('/api/purchase/store', payload)
                .then((res) => {
                    if (res) {
                        this.rows.forEach((row, index) => {
                            this.rows[index] = {
                                itemName: null,
                                product_id: null,
                                qty: null,
                                unit: null,
                                price: null,
                                total: null,
                                showInputs: false,
                            };
                            this.removeRow();
                        });
                        this.searchQueryProduct = null;
                        this.customer_id = null;
                        this.isCash = true;
                        this.selectedCustomer = null;
                        this.searchQuery = null;
                        Toast.fire({
                            icon: "success",
                            title: res.data.message
                        });
                    }
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.company_id = localStorage.getItem("company_id")
        this.user_id = localStorage.getItem('user');
        document.addEventListener('click', this.hideInputs);
        if (this.company_id && this.user_id) {
            this.fetchUsers();
            this.fetchCompanyWiseCustomer();
            this.fetchCompanyWiseProducts();
        }
        else {
            this.$router.push({ name: "AllCompany" })
        }
    },
    beforeUnmount() {
        document.removeEventListener('click', this.hideInputs);
    },
}
</script>

<style scoped>
.plus_minus {
    cursor: pointer;
}

.customer-item:hover {
    background-color: #f0f0f0;
}

.for_input {
    position: relative;
}

.angle-bracket {
    position: absolute;
    right: 15px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
    font-size: 16px;
    color: #007bff;
    pointer-events: auto;
    user-select: none;
}
</style>