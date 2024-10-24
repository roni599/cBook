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
import Customer from '../components/Customer/customer.vue';

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

    {name:"Customer",component:Customer,path:'/customer'}

];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;