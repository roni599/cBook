<template>
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <h1 class="text-center mb-3">cBook</h1>
              <div class="small">
                <router-link class="btn btn-sm btn-primary px-5 py-2 w-100 mb-4" to="/register">Create New
                  Company</router-link>
                <div class="beforeLogin" v-if="beforeLogin">
                  <p class="fs-5">Already Have Your Company?</p>
                  <hr class="fw-bold" />
                  <form @submit.prevent="goHome">
                    <div class="form-floating mb-3" v-if="!showPassword">
                      <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com"
                        v-model="form.email" />
                      <label for="inputEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3" v-if="showPassword">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Password"
                        v-model="form.password" />
                      <label for="inputPassword">Password</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <button type="button" class="btn btn-primary w-100" @click="nextStep" v-if="!showPassword">
                        Next
                      </button>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-1">
                      <button type="submit" class="btn btn-primary w-100" v-if="showPassword">
                        Login
                      </button>
                    </div>
                    <router-link to="/forget">Forgot Password?</router-link>
                  </form>
                </div>

                <div class="afterLogin" v-if="!beforeLogin">
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
                        <td><a href="#"  @click="goHomePage">Open</a></td>
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
        </div>
      </main>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login-From",
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      errors: {},
      loading: false,
      showPassword: false,
      showdiv: true,
      beforeLogin: true
    };
  },
  methods: {
    nextStep() {
      this.showPassword = true;
    },
    goHome() {
      this.beforeLogin = false;
      // this.$router.push({ name: "Home" })
    },
    goHomePage(){
      this.$router.push({name:"Home"})
    }

  },
};
</script>

<style scoped>
/* Optional: Style for eye icon */
.position-relative {
  position: relative;
}

.end-0 {
  right: 0;
}

.me-3 {
  margin-right: 1rem;
}

.fas.fa-eye,
.fas.fa-eye-slash {
  color: #6c757d;
  /* Set icon color */
}
</style>
