<template>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="small">
                                <div class="softNameCreateCompany">
                                    <h1 class="text-center mb-2">cBook</h1>
                                </div>
                                <div class="switchAccount d-flex justify-around w-100 mb-3 gap-1">
                                    <div class="button1 w-50">
                                        <router-link class="btn btn-sm btn-primary w-100" to="/all_company">Switch
                                            Account</router-link>
                                    </div>
                                    <div class="button2 w-50">
                                        <router-link class="btn btn-sm btn-primary w-100" to="/register">Create New
                                            Company</router-link>
                                    </div>
                                </div>
                                <div class="beforeLogin">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center">
                                                <img src="../../../../public/backend/images/users/436_ekRoni.png"
                                                    width="55" height="55" class="rounded-circle me-2" />
                                                <div class="adminName mt-3">
                                                    <p class="mb-0">Md. Ebrahim Khalil</p>
                                                    <p>Admin</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form @submit.prevent="goHome">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password"
                                                placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-1">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Login
                                            </button>
                                        </div>
                                        <div class="forgetremember d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Remember Password
                                                </label>
                                            </div>
                                            <div class="forgate">
                                                <router-link class="d-block" to="/forget">Forgot Password?</router-link>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminLogin",
    data() {
        return {

        }
    },
    methods: {
        goHome() {
            this.$router.push({ name: "Home" })
        }
    }
}
</script>

<style scoped></style>