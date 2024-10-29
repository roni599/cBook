<template>
    <div class="container-fluid px-4">
        <div class="card mt-4 mb-3">
            <div class="card-header border-bottom-0 p-4">
                <router-link class="text-decoration-none h5" to="/home">Dashboard</router-link>
                <span class="text-muted h5"> / Items</span>
            </div>
        </div>
        <div class="card mb-4 mt-3 tt">
            <div class="card-header d-flex justify-content-between">
                <div class="employee_table">
                    <i class="fas fa-table me-1"></i>
                    Items List
                </div>
                <div class="link_button">
                    <button class="btn btn-sm btn-primary" @click="openProductNameModal">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table_size">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in company_products" :key="product.id" @click="editProduct(product.id)"
                                :style="{ cursor: 'pointer' }">
                                <td>{{ product.product_name }}</td>
                                <td>{{ product.unit }}</td>
                                <td>{{ product.quantity }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal Structure -->
        <div class="modal fade" id="Product_name" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-half-screen">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" @click="componetClose"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body d-flex">
                        <!-- Left Column for Static Navigation Links -->
                        <div class="options-list p-3" style="width: 20%; border-right: 1px solid #ddd;">
                            <ul class="">
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('ProductName')"
                                        class="text-decoration-none">
                                        Product Name
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('ItemDetails')"
                                        class="text-decoration-none">
                                        Item Details
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('BrandCattagor')"
                                        class="text-decoration-none">
                                        Brand/Cattagor
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('SizeCooWeHi')"
                                        class="text-decoration-none">
                                        Size/Coo/We/Hi
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('DefaultPrice')"
                                        class="text-decoration-none">
                                        Default Price
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('MultiPrice')"
                                        class="text-decoration-none">
                                        Multi Price
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('Cataloge')" class="text-decoration-none">
                                        Cataloge
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('WarrantyGuaranty')"
                                        class="text-decoration-none">
                                        Warranty/Guaranty
                                    </a>
                                </li>
                                <li class="mb-5">
                                    <a href="#" @click.prevent="loadComponent('CreditItem')"
                                        class="text-decoration-none">
                                        Credit Item
                                    </a>
                                </li>

                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('Customizing')"
                                        class="text-decoration-none">
                                        Customizing
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('Unit')" class="text-decoration-none">
                                        Unit
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('BrandCategory')"
                                        class="text-decoration-none">
                                        Brand/Category
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#" @click.prevent="loadComponent('Setting')" class="text-decoration-none">
                                        Setting
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="content-display p-3" style="width: 80%;">
                            <component :is="currentComponent" :productId="currentProductId" ref="productNameComponent">
                            </component>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { markRaw } from 'vue';
import ProductName from './ProductName.vue';
import ItemDetails from './ItemDetails.vue';
import BrandCategory from './BrandCategory.vue';
import BrandCattagor from './BrandCattagor.vue';
import Cataloge from './Cataloge.vue';
import CreditItem from './CreditItem.vue';
import Customizing from './Customizing.vue';
import DefaultPrice from './DefaultPrice.vue';
import MultiPrice from './MultiPrice.vue';
import Service from './Service.vue';
import Setting from './Setting.vue';
import SizeCooWeHi from './SizeCooWeHi.vue';
import WarrantyGuaranty from './WarrantyGuaranty.vue';
import Unit from './Unit.vue';
import axios from 'axios';
export default {
    name: "Item-vue",
    data() {
        return {
            currentComponent: markRaw(ProductName),
            company_id: null,
            company_products: [],
            currentProductId: null,
            form_product: {
                product_name: null,
                product_unit: null,
            }
        }
    },
    methods: {
        openProductNameModal() {
            this.currentProductId = null;
            const modal = new bootstrap.Modal(document.getElementById('Product_name'));
            modal.show();
        },
        editProduct(id) {
            this.currentProductId = id;
            const modal = new bootstrap.Modal(document.getElementById('Product_name'));
            modal.show();
        },
        loadComponent(componentName) {
            const components = {
                ProductName: markRaw(ProductName),
                ItemDetails: markRaw(ItemDetails),
                BrandCategory: markRaw(BrandCategory),
                BrandCattagor: markRaw(BrandCattagor),
                Cataloge: markRaw(Cataloge),
                CreditItem: markRaw(CreditItem),
                Customizing: markRaw(Customizing),
                DefaultPrice: markRaw(DefaultPrice),
                MultiPrice: markRaw(MultiPrice),
                Service: markRaw(Service),
                Setting: markRaw(Setting),
                SizeCooWeHi: markRaw(SizeCooWeHi),
                WarrantyGuaranty: markRaw(WarrantyGuaranty),
                Unit: markRaw(Unit),
            };
            this.currentComponent = components[componentName] || null;
        },
        componetClose() {
            this.currentProductId = null;
            if (this.currentComponent === markRaw(ProductName)) {
                this.$refs.productNameComponent.resetForm(); // Ensure to add a ref in the template for ProductName
            }
            this.currentComponent = markRaw(ProductName)
            this.fetchCompanyWiseProducts();
        },
        async fetchCompanyWiseProducts() {
            await axios.get(`/api/company_products/${this.company_id}`)
                .then((res) => {
                    this.company_products = res.data;
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mounted() {
        this.company_id = localStorage.getItem("company_id");
        this.fetchCompanyWiseProducts();
    }
}
</script>

<style scoped>
.modal-half-screen {
    max-width: 90vw;
    height: 100vh;
}

.modal-content {
    height: 95%;
}
</style>