<template>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <h1 class="text-center">cBook</h1>
                            <h3 class="text-center font-weight-light mb-4">Create Company</h3>
                            <div class="beforeOTP">
                                <form @submit.prevent="create_company">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputCompanyName" type="text"
                                                    placeholder="Enter company name" v-model="form.companyName" />
                                                <small class="text-danger" v-if="errors.companyName">{{
                                                    errors.companyName[0] }}</small>
                                                <label for="inputCompanyName">Business/Company Name</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" id="inputMobile" type="text"
                                                    placeholder="Enter mobile number" v-model="form.mobile" />
                                                <small class="text-danger" v-if="errors.mobile">{{ errors.mobile[0]
                                                    }}</small>
                                                <label for="inputMobile">Mobile</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email"
                                                    placeholder="name@example.com" v-model="form.email" />
                                                <small class="text-danger" v-if="errors.email">{{ errors.email[0]
                                                    }}</small>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary w-100">Create Account</button>
                                        </div>
                                    </div>
                                </form>
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

export default {
    name: "Register-Form",
    data() {
        return {
            form: {
                companyName: '',
                mobile: '',
                email: '',
                user_id: '',
            },
            errors: {},
        };
    },
    methods: {
        async create_company() {
            await axios.post("/api/company_store", this.form)
                .then((res) => {
                    this.resetForm();
                    if (res) {
                        Toast.fire({
                            icon: "success",
                            title: res.data.message
                        });
                        this.$router.push({ name: "AllCompany" })
                    }
                })
                .catch((error) => {
                    console.log(error)
                })
        },
        async fetchUsers() {
            const token = localStorage.getItem('token');
            await axios.get("/api/auth/me", {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then((res) => {
                    this.form.user_id = res.data.id;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        resetForm() {
            this.form = {
                companyName: '',
                mobile: '',
                email: '',
                user_id: '',
            }
        },
    },
    mounted() {
        this.fetchUsers();
    }
};
</script>


<style></style>