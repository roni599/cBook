import { createRouter, createWebHistory } from 'vue-router';

import Login from '../components/auth/Login.vue';
import Register from '../components/auth/Register.vue';
import Forget from '../components/auth/Forget.vue';
import Home from '../components/Home.vue';
import Logout from '../components/auth/Logout.vue';
import Edit_profile from '../components/auth/Edit_profile.vue';
import Home2 from '../components/auth/Home2.vue';

import GeneralInfo from '../components/Profile/GeneralInfo.vue';
import BusinessInfo from '../components/Profile/BusinessInfo.vue';
import BankInfo from '../components/Profile/BankInfo.vue';
import BusinessAddress from '../components/Profile/BusinessAddress.vue';
import LogoSignature from '../components/Profile/LogoSignature.vue';
import AdminPassword from '../components/Profile/AdminPassword.vue';
import AdminLogin from '../components/Profile/AdminLogin.vue';
import AllCompany from '../components/Profile/AllCompany.vue';
import CompanyCreate from '../components/Profile/CompanyCreate.vue';
import AllAccount from '../components/Allaccounts/AllAccount.vue';
import Setting from '../components/SettingsSalesForm/Setting.vue';
import CustomerList from '../components/Parties/CustomerList.vue';
import SupplierList from '../components/Parties/SupplierList.vue';
import Item from '../components/Items/Item.vue';
import Service from '../components/Items/Service.vue';
import PurchaseList from '../components/Purches/PurchaseList.vue';
import SalesList from '../components/Sales/SalesList.vue';

const routes = [
    { name: 'LoginForm', component: Login, path: '/' },
    { name: 'RegisterForm', component: Register, path: '/register' },
    { name: 'Forget', component: Forget, path: '/forget' },
    { name: 'Home', component: Home, path: '/home' },
    { name: 'Logout', component: Logout, path: '/logout' },
    { name: "Edit_profile", component: Edit_profile, path: '/edit_profile' },
    { name: "Home2", component: Home2, path: '/home2' },

    { name: "GeneralInfo", component: GeneralInfo, path: '/general_info' },
    { name: "BusinessInfo", component: BusinessInfo, path: '/business_info' },
    { name: "BankInfo", component: BankInfo, path: '/bank_info' },
    { name: "BusinessAddress", component: BusinessAddress, path: '/business_address' },
    { name: "LogoSignature", component: LogoSignature, path: '/logo_signature' },
    { name: "AdminPassword", component: AdminPassword, path: '/admin_password' },
    { name: "AdminLogin", component: AdminLogin, path: '/admin_login' },
    { name: "AllCompany", component: AllCompany, path: '/all_company' },
    { name: "CompanyCreate", component: CompanyCreate, path: '/company_create' },

    { name: "AllAccount", component: AllAccount, path: '/all_account' },
    { name: "Setting", component: Setting, path: '/setting' },

    { name: "CustomerList", component: CustomerList, path: '/customer_list' },
    { name: "SupplierList", component: SupplierList, path: '/supplier_list' },

    { name: "Item", component: Item, path: '/item' },
    { name: "Service", component: Service, path: '/service' },

    { name: "PurchaseList", component: PurchaseList, path: '/purchase_list' },

    { name: "SalesList", component: SalesList, path: '/sales_list' },
];
const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;