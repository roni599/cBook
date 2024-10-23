<template>
    <div class="main">
        <nav class="sb-topnav navbar navbar-expand navbar-info bg-info"
            v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/company_create' || $route.path === '/all_company' || $route.path === '/admin_login' || $route.path === '/forget' ? false : true">
            <router-link class="navbar-brand ps-3" to="/home">
                <p class="text-white align-items-center mt-3">{{ company_Name }}</p>
            </router-link>
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
                <i class="fas fa-bars text-white fs-4"></i>
            </button>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <div class="form-group mb-0 d-flex align-items-center">
                        <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
                        <button class="btn btn-light-secondary btn-search"><i
                                class="fas fa-search text-white"></i></button>
                    </div>
                </div>
            </form>
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4" id="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../../../public/backend/images/users/436_ekRoni.png" class="images" alt="">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Activity Log</a></li> -->
                        <li><router-link class="dropdown-item" to="/general_info">General Info</router-link></li>
                        <li><router-link class="dropdown-item" to="/business_info">Business Info</router-link></li>
                        <li><router-link class="dropdown-item" to="/bank_info">Bank Info</router-link></li>
                        <li><router-link class="dropdown-item" to="/business_address">Business Address</router-link>
                        </li>
                        <li><router-link class="dropdown-item" to="/logo_signature">Logo & Signature</router-link></li>
                        <li><router-link class="dropdown-item" to="/admin_password">Admin & Password</router-link></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <router-link class="dropdown-item" to="/all_company">Switch Acoount</router-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav"
                v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/company_create' || $route.path === '/admin_login' || $route.path === '/all_company' || $route.path === '/forget' ? false : true">
                <nav class="sb-sidenav accordion sb-sidenav-light shadow" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav sb-sidenav-menu-heading">
                            <div class="sb-sidenav-menu-heading">
                                <p>Navigation</p>
                            </div>
                            <router-link class="nav-link rounded-end mb-3 bg-secondary text-white" to="/home">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-home text-white"></i>
                                </div>
                                Dashboard
                            </router-link>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                All Accounts
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Parties
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Item
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Sales
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                POS
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Service Sales
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Warranty Service
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Purchase
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Project Management
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Manufacturing
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Lone/Credit
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Receipt
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Payment
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Contra
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Journal
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Expense
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Income
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Report
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Online Store
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                E-Commerce
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Utility
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                HR/payroll
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                Lead Manager
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-users mt-1"></i>
                                </div>
                                User/Sales Team
                                <!-- <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div> -->
                            </a>
                            <!-- <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/role' }"
                                        to="/role">Role</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/user_create' }"
                                        to="/user_create">User Create</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/all_user' }"
                                        to="/all_user">User List</router-link>
                                </nav>
                            </div>
                            <router-link class="nav-link collapsed" :class="{ 'active': $route.path === '/category' }"
                                to="/category">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-th-large mt-1" style="color: grey !important;"></i>
                                </div>
                                <span :class="{ 'text-primary': $route.path === '/category' }">Category</span>
                            </router-link>


                            <router-link :class="{ 'active': $route.path === '/brand' }" to="/brand"
                                class="nav-link collapsed">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tags mt-1" style="color: grey !important;"></i>
                                </div>
                                Brands
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </router-link>

                            <router-link :class="{ 'active': $route.path === '/supplier' }" to="/supplier"
                                class="nav-link collapsed">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-truck" style="color: grey !important;"></i>
                                </div>
                                Suppliers
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </router-link>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapsePayment" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                Payment
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapsePayment" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/payment_type' }"
                                        to="/payment_type">Payment Create</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/investment' }"
                                        to="/investment">Investment</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/reserve_table' }"
                                        to="/reserve_table">Reserve Table</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/bills_table' }"
                                        to="/bills_table">Bills Table</router-link>
                                </nav>
                            </div>


                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseproducts" aria-expanded="false"
                                aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-box-open mt-1"></i>
                                </div>
                                Products
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseproducts" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/product_create' }"
                                        to="/product_create">Products Purchase</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/all_product' }"
                                        to="/all_product">Purchase History</router-link>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseStocks" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-chart-line mt-1"></i>
                                </div>
                                Stocks
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseStocks" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/stocks_create' }"
                                        to="/stocks_create">Stocks Create</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/all_stocks' }"
                                        to="/all_stocks">Stocks List</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/all_serials' }"
                                        to="/all_serials">Serials List</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/return_repair' }"
                                        to="/return_repair">Return && Repair</router-link>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                data-bs-target="#collapseExpense" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                Expence
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="collapseExpense" aria-labelledby="headingOne"
                                data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/expence_category' }"
                                        to="/expence_category">Expense Category</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/expence_create' }"
                                        to="/expence_create">Expense Create</router-link>
                                    <router-link class="nav-link"
                                        :class="{ 'active text-primary': $route.path === '/all_expense' }"
                                        to="/all_expense">Expense List</router-link>
                                </nav>
                            </div>
                            <router-link class="nav-link collapsed"
                                :class="{ 'active': $route.path === '/bill_generate' }" to="/bill_generate">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-receipt mt-1" style="color: grey !important;"></i>
                                </div>
                                <span :class="{ 'text-primary': $route.path === '/bill_generate' }"> Bill
                                    Generate</span>
                            </router-link> -->
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content"
                :class="{ 'pc-container': true, 'custom-style': $route.path !== '/' && $route.path !== '/register' && $route.path !== '/company_create' && $route.path !== '/forget' && $route.path !== '/all_company' && $route.path !== '/admin_login' }">
                <main>
                    <div class="container-fluid px-2"
                        :class="{ 'pc-content': true, 'no-padding': $route.path === '/' || $route.path === '/company_create' || $route.path === '/all_company' || $route.path === '/register' || $route.path === '/forget' || $route.path === '/admin_login' }">
                        <router-view></router-view>
                    </div>
                </main>
                <footer class="py-3 w-100">
                    <div class="container-fluid"
                        v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/company_create' || $route.path === '/all_company' || $route.path === '/admin_login' || $route.path === '/forget' ? false : true">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; DreamTech BD 2024</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, provide } from 'vue';
export default {
    name: "App",
    data() {
        const company_Name = ref('');
        provide('company_Name', company_Name);
        return {
            company_Name,
            loading: true,
            inactivityTimer: null,
            form: {
                user_id: null,
            }
        };
    },
    methods: {

    },
    mounted() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "LoginForm" });
        } else {
            const lastRoute = localStorage.getItem('lastRoute');
            if (lastRoute && this.$route.path !== lastRoute) {
                this.$router.push(lastRoute);
            }
        }
    },
    watch: {
        $route(to) {
            localStorage.setItem('lastRoute', to.fullPath);
        }
    },
    created() { }
};
</script>

<style>
.input-group {
    position: relative;
}

.input-group .input-group-text {
    position: absolute;
    left: 10px;
    /* Adjust position */
    top: 50%;
    transform: translateY(-50%);
    pointer-events: none;
}

.input-group .form-control {
    padding-left: 35px;
    /* Adjust padding to make room for the icon */
}

.pc-container {
    position: relative;
}

.pc-container .pc-content {
    padding-left: 35px;
    /* padding-right: 35px; */
    /* padding-top: 35px; */
}

.custom-style {
    padding-left: 227px;
    top: 56px;
    padding-top: 5px;
    min-height: calc(100vh - 130px);
}

.no-padding {
    padding-left: 0px;
    padding-right: 0px;
    padding-top: 0px;
}

@media (max-width: 1200px) {
    .custom-style {
        margin-left: 200px;
        padding-left: 245px;
        top: 50px;
    }
}

@media (max-width: 992px) {
    .custom-style {
        margin-left: 150px;
        top: 40px;
        min-height: calc(100vh - 100px);
    }

    .no-padding {
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 20px;
    }
}

.images {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    border: 2px solid #708090;
}

@media (max-width: 768px) {
    .custom-style {
        margin-left: 0;
        top: 40px;
        min-height: calc(100vh - 80px);
    }

    .no-padding {
        padding-left: 5px;
        padding-right: 5px;
    }
}

@media (max-width: 576px) {
    .custom-style {
        margin-left: 0;
        top: 40px;
        min-height: calc(100vh - 60px);
    }

    .no-padding {
        padding-left: 0;
        padding-right: 0;
    }
}

@media print {

    #navbar,
    #navbar-nav,
    #layoutSidenav_nav,
    #footer {
        display: none;
    }

    #layoutSidenav_content {
        margin: 0;
        padding: 0;
    }

    /* Ensure the content you want to print is visible */
    #print-area {
        display: block;
    }

    .logo-lg {
        display: none;
    }

    footer {
        display: none;
    }
}
</style>
