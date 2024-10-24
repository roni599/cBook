<template>
  <div class="container-fluid px-4">
  </div>
</template>

<script>
import axios from 'axios';
import { inject } from 'vue';
export default {
  name: "Home-vue",
  data() {
    const company_Name = inject('company_Name');
    return {
      company_id: null,
      companyName: null,
      company_Name,
    };
  },
  methods: {

    async companyfind() {
      axios.get(`/api/user_company_find/${this.company_id}`)
        .then((res) => {
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
    else{
      this.$router.push({name:"Home"})
      this.company_id = localStorage.getItem('company_id')
      this.companyfind()
    }
  }
}
</script>

<style>
#searchInput {
  background-image: url("/backend/assets/img/searchicon.png");
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

.table_size {
  width: 100%;
  overflow: auto;
}
</style>