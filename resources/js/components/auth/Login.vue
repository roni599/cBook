<template>
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">

              <div class="small">
                <div class="beforeLogin" v-if="beforeLogin">
                  <h1 class="text-center mb-3">cBook</h1>
                  <router-link class="btn btn-sm btn-primary px-5 py-2 w-100 mb-4" to="/register">Create New
                    Company</router-link>
                  <p class="fs-5">Already Have Your Company?</p>
                  <hr class="fw-bold" />
                  <form @submit.prevent="login">
                    <div class="form-floating mb-3" v-if="!showPassword">
                      <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com"
                        v-model="form.email" />
                      <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                      <label for="inputEmail">Email address</label>
                    </div>
                    <div class="form-floating mb-3" v-if="showPassword">
                      <input class="form-control" id="inputPassword" type="password" placeholder="Password"
                        v-model="form.password" />
                      <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
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
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script>
import AllCompany from '../Profile/AllCompany.vue';
export default {
  name: "Login-From",
  components: {
    AllCompany
  },
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
    async login() {
      this.loading = true;
      try {
        const res = await axios.post("/api/auth/login", this.form);
        if (res) {
          User.responseAfterLogin(res);
          this.beforeLogin = false;
          this.$router.push({ name: "AllCompany" })
          Toast.fire({
            icon: "success",
            title: "Signed in successfully"
          });
        }
      } catch (error) {
        console.log(error)
        if (error.response && error.response.data.errors) {
          this.errors = error.response.data.errors;
          Toast.fire({
            icon: "warning",
            title: "Invalid email or password"
          });
        } else {
          Toast.fire({
            icon: "error",
            title: "An error occurred. Please try again later."
          });
        }
      } finally {
        this.loading = false;
      }
    },
  },
  mounted() {
    if (User.loggedIn()) {
      this.$router.push({ name: "AllCompany" });
    }
  },
};
</script>

<style scoped>
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
}
</style>