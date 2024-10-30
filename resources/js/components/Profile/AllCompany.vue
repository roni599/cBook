<template>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <h1 class="text-center mb-3">cBook</h1>
                            <router-link class="btn btn-sm btn-primary px-5 py-2 w-100 mb-4" to="/company_create">Create
                                Another
                                Company</router-link>
                            <div class="afterLogin">
                                <p>
                                    <span class="text-primary">{{ user_email }}</span><br />
                                    <span>Under your mail companies</span>
                                </p>
                                <table class="table table-bordered mb-5">
                                    <thead>
                                        <tr>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="company in companies" :key="company.id">
                                            <td>{{ company.company_name }}</td>
                                            <td>Supper Admin</td>
                                            <td><a href="#" @click="goHomePage(company.id)">Open</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <router-link class="btn btn-sm btn-primary px-5 py-2 w-100 mb-4"
                                    to="/logout">Logout</router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import User from '../../Helpers/User';
import { inject } from 'vue';
export default {
    name: "AllCompany",
    data() {
        const company_Name = inject('company_Name');
        return {
            user_id: null,
            companies: [],
            mainCompany: '',
            user_email: '',
            company_Name,
        }
    },
    methods: {
        goHomePage(id) {
            localStorage.setItem('company_id', id);
            this.$router.push({ name: "Home" })
        },
        fetchLoginUser() {
            const token = localStorage.getItem('token');
            axios.get("/api/auth/me", {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then((res) => {
                    this.user_id = res.data.id;
                    this.user_email = res.data.email
                    this.fetchLoggedInUserCompany();
                })
                .catch((error) => {
                    if (error.response && error.response.status === 401) {
                    } else {
                        console.log(error);
                    }
                });
        },
        fetchLoggedInUserCompany() {
            axios.get(`/api/user_allcompany/${this.user_id}`)
                .then((res) => {
                    if (res) {
                        this.companies = res.data.companies
                        this.mainCompany = res.data.companyName
                    }
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        async companyfind() {
            console.log(this.company_id)
            axios.get(`/api/user_company_find/${this.company_id}`)
                .then((res) => {
                    console.log(res)
                    if (res.data.companyName) {
                        this.companyName = res.data.companyName
                        this.company_Name = res.data.companyName
                    }
                    else {
                        this.companyName = res.data.company_name
                        this.company_Name = res.data.company_name
                    }
                })
                .catch((error) => {
                    console.log(error)
                })
        }
    },
    mounted() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "LoginForm" });
        }
        this.user_id = localStorage.getItem('user');
        this.company_id = localStorage.getItem('company_id')
        this.companyfind()
    },
    created() {
        this.fetchLoginUser();
    }
}
</script>

<style scoped></style>