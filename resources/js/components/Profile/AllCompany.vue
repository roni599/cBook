<template>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <h1 class="text-center mb-3">cBook</h1>
                            <router-link class="btn btn-sm btn-primary px-5 py-2 w-100 mb-4" to="/register">Create New
                                Company</router-link>
                            <div class="afterLogin">
                                <p>
                                    <span class="text-primary">ekroni99@gmail.com</span><br />
                                    <span>Under your mail companies</span>
                                </p>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">Company Name</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Dream International Ltd</td>
                                            <td>Super Admin</td>
                                            <td><a href="#" @click="goHomePage">Open</a></td>
                                        </tr>
                                        <tr>
                                            <td>Nuzaima Enterprise</td>
                                            <td>Accounts</td>
                                            <td><a href="#" @click="goHomePage">Open</a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
    name: "AllCompany",
    data() {
        return {

        }
    },
    methods: {
        goHomePage() {
            this.$router.push({ name: "Home" })
        }
    }
}
</script>

<style></style>