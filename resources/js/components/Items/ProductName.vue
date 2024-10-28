<template>
    <div class="container-fluid px-4">
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card rounded-lg mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="icon_text d-flex gap-2 mt-3">
                                <p> <i class="fa-regular fa-address-card"></i></p>
                                <p class="text-black font-bold">Product Name Create</p>
                            </div>
                            <div class="code"></div>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="createProductName" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-floating mb-3 mb-md-0">
                                            <input class="form-control" id="inputName"
                                                v-model="form_product.product_name" type="text"
                                                placeholder="Enter your name" />
                                            <label for="inputName">Product Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-select py-3" aria-label="Default select example"
                                            v-model="form_product.product_unit">
                                            <option value="Select Unit" disabled>Select Unit</option>
                                            <option value="PC">PC</option>
                                            <option value="KG">KG</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- Create button -->
                                <div class="mt-4 mb-0">
                                    <div class="d-grid">
                                        <button class="btn btn-primary w-100 mb-2">
                                            <span>Create</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
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
    name: "ProductName",
    props: {
        productId: Number,
    },
    data() {
        return {
            form_product: {
                product_name: null,
                product_unit: "Select Unit",
                user_id: null,
                company_id: null,
            }
        }
    },
    methods: {
        async createProductName() {
            await axios.post('/api/product/store', this.form_product)
                .then((res) => {
                    this.resetForm();
                    Toast.fire({
                        icon: "success",
                        title: res.data.message
                    });
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        resetForm() {
            this.form_product.product_name = null;
            this.form_product.product_unit = "Select Unit";
        },
        fetchProductDetails(id) {
            console.log(`Fetching details for product ID: ${id}`);
        },
    },
    watch: {
        productId: {
            immediate: true,
            handler(newId) {
                if (newId) {
                    this.fetchProductDetails(newId);
                }
            },
        },
    },
    mounted() {
        this.company_id = localStorage.getItem("company_id");
        this.userId = localStorage.getItem("user");
        if (this.company_id && this.userId) {
            this.form_product.user_id = this.userId;
            this.form_product.company_id = this.company_id;
        }
        else {
            this.$router.push({ name: "AllCompany" })
        }
        if (this.productId) {
            console.log("Product ID in ProductName component:", this.productId);
        }
    },
}
</script>

<style></style>