<template>
  <div class="container-fluid px-4">
    <div class="card mt-4 mb-3">
      <div class="card-header border-bottom-0 p-4">
        <router-link class="text-decoration-none h5" to="/home">Dashboard</router-link>
        <span class="text-muted h5"> / {{ activeTab }}</span>
      </div>
    </div>

    <!-- for all type header -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link" :class="{ active: activeTab === 'All Accounts' }" @click="changeTab('All Accounts')"
          id="all-accounts-tab" data-bs-toggle="tab" data-bs-target="#all-accounts" type="button" role="tab"
          aria-controls="all-accounts" aria-selected="true">
          All Accounts
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" :class="{ active: activeTab === 'Create Account' }"
          @click="changeTab('Create Account')" id="create-account-tab" data-bs-toggle="tab"
          data-bs-target="#create-account" type="button" role="tab" aria-controls="create-account"
          aria-selected="false">
          Create Account
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" :class="{ active: activeTab === 'Customer' }" @click="changeTab('Customer')"
          id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer" type="button" role="tab"
          aria-controls="customer" aria-selected="false">
          Customer
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" :class="{ active: activeTab === 'Supplier' }" @click="changeTab('Supplier')"
          id="supplier-tab" data-bs-toggle="tab" data-bs-target="#supplier" type="button" role="tab"
          aria-controls="supplier" aria-selected="false">
          Supplier
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" :class="{ active: activeTab === 'Ad/Redact' }" @click="changeTab('Ad/Redact')"
          id="ad-redact-tab" data-bs-toggle="tab" data-bs-target="#ad-redact" type="button" role="tab"
          aria-controls="ad-redact" aria-selected="false">
          Ad/Redact
        </button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" :class="{ active: activeTab === 'Loan/Credit' }" @click="changeTab('Loan/Credit')"
          id="loan-credit-tab" data-bs-toggle="tab" data-bs-target="#loan-credit" type="button" role="tab"
          aria-controls="loan-credit" aria-selected="false">
          Loan/Credit
        </button>
      </li>
    </ul>

    <div class="tab-content" id="myTabContent">
      <!-- for all_types_accounts -->
      <div class="tab-pane fade show active" id="all-accounts" role="tabpanel" aria-labelledby="all-accounts-tab">
        <!-- Table part -->
        <div class="card mb-4 mt-3 tt">
          <div class="card-header d-flex justify-content-between">
            <div class="employee_table">
              <i class="fas fa-table me-1"></i>
              Create Account Customer Supplier Ad/Redact
            </div>
          </div>
          <div class="card-body">
            <div class="table_size">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Account Type & Name</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="fw-bold">
                    <td>Cash In Hand</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Cash</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Bank</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Bank</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Payment Gateway</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>SSL Commerze</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Customer</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Customer</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Supplier</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Supplier</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Sales</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Sales</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Sales Return</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Sales Return</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Service Sales</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Service Sales</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Service Sales Return</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Service Sales Return</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Purchase</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Purchase</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Purchase Return</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Purchase Return</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Direct Expense</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Discount Of Sales</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Discount Given</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Indirect Expense</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Additional Cost</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Direct Income</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Discount Of Purchase</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Discount Received</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Indirect Income</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Additional Cost</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Loan Liability</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Lone</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Loan & Advance</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Advance Salary</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Current Liability</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Investment</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Invest</td>
                    <td></td>
                  </tr>
                  <tr class="fw-bold">
                    <td>Fixed Asset</td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Furniture</td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- for create Account -->
      <div class="tab-pane fade" id="create-account" role="tabpanel" aria-labelledby="create-account-tab">
        <div class="row">
          <div class="col-lg-12">
            <div class="card rounded-lg mt-3">
              <div class="card-header d-flex justify-content-between align-items-center">
                <div class="icon_text d-flex gap-2 mt-3">
                  <p><i class="fa-regular fa-address-card"></i></p>
                  <p class="text-black font-bold">Create Account</p>
                </div>
                <div class="code"></div>
              </div>
              <div class="card-body">
                <form enctype="multipart/form-data">
                  <div class="row mb-3">
                    <div class="col-md-12">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputName" type="text" placeholder="Enter your name" />
                        <label for="inputName">Account Name</label>
                      </div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <select class="form-select py-3" aria-label="Default select example" @change="handleAccountType">
                        <option selected>Account Type</option>
                        <option value="Cash In Hand">Cash In Hand</option>
                        <option value="Bank">Bank</option>
                        <option value="Indirect Expanse">
                          Indirect Expanse
                        </option>
                        <option value="Estimate Expanse">
                          Estimate Expanse
                        </option>
                        <option value="Indirect Income">Indirect Income</option>
                        <option value="Loan & Advance">Loan & Advance</option>
                        <option value="Current Liability">
                          Current Liability
                        </option>
                        <option value="Investment">Investment</option>
                        <option value="Deposit(Bank/Others)">
                          Deposit(Bank/Others)
                        </option>
                        <option value="Savings(Bank/Others)">
                          Savings(Bank/Others)
                        </option>
                        <option value="Fixt Asset">Fixt Asset</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="inputName" type="text" placeholder="Enter your name" />
                          <label for="inputName">Account Group</label>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputSalary" type="text" placeholder="Salary" />
                        <label for="inputSalary"> Opening Balance</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-floating mb-3 mb-md-0">
                        <input class="form-control" id="inputPasswordConfirm" type="date"
                          placeholder="Confirm password" />
                        <label for="inputPasswordConfirm">Date</label>
                      </div>
                    </div>
                  </div>

                  <!-- Bank option -->
                  <div v-if="bank" class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                      v-model="showDetails" />
                    <label class="form-check-label" for="flexCheckDefault">
                      Bank Details
                    </label>
                  </div>

                  <!-- Bank Details -->
                  <div class="bank_details_show" v-if="showDetails">
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="inputName" type="text" placeholder="Enter your name" />
                          <label for="inputName">Account Holder Name</label>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="inputName" type="text" placeholder="Enter your name" />
                          <label for="inputName">Account NO</label>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                          <input class="form-control" id="inputName" type="text" placeholder="Enter your name" />
                          <label for="inputName">Routing/IFSC Number</label>
                        </div>
                      </div>
                    </div>
                    <div class="row mb-3">
                      <div class="col-md-12">
                        <div class="form-floating mb-3 mb-md-0">
                          <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            style="height: 90px"></textarea>
                          <label for="floatingTextarea">Bank Location</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Create button -->
                  <div class="mt-4 mb-0">
                    <div class="d-grid">
                      <button class="btn btn-primary w-100 mb-2">
                        <span>Create</span>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- for customer part -->
      <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">
        <div class="mt-5">
          <ul class="">
            <!-- list-unstyled to remove bullet points -->
            <li class="mb-2">
              <a href="#" class="text-center" @click="OpenModal">Customer Name</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">General Info</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Business Info</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Bank Info</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Address</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Business Address</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Shipping Address</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Others Info</a>
            </li>
          </ul>
        </div>
      </div>

      <!-- for supplier part -->
      <div class="tab-pane fade" id="supplier" role="tabpanel" aria-labelledby="supplier-tab">
        <div class="mt-5">
          <ul class="">
            <li class="mb-2">
              <a href="#" class="text-center" @click="OpenSupplierModal">Supplier Name</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">General Info</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Business Info</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Bank Info</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Address</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Business Address</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Shipping Address</a>
            </li>
            <li class="mb-2">
              <a href="#" class="text-center" data-bs-toggle="modal" data-bs-target="#modal">Others Info</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-pane fade" id="ad-redact" role="tabpanel" aria-labelledby="ad-redact-tab">
        <!-- Content for Ad/Redact -->
      </div>
      <div class="tab-pane fade" id="loan-credit" role="tabpanel" aria-labelledby="loan-credit-tab">
        <!-- Content for Loan/Credit -->
      </div>
    </div>

    <!-- for customer modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-half-screen">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="card rounded-lg mt-3">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="icon_text d-flex gap-2 mt-3">
                      <p> <i class="fa-regular fa-address-card"></i></p>
                      <p class="text-black font-bold">Customer Create</p>
                    </div>
                    <div class="code"></div>
                  </div>
                  <div class="card-body">
                    <form @submit.prevent="createCustomer" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputName" v-model="form_customer.customer_name" type="text"
                              placeholder="Enter your name" />
                            <label for="inputName">Customer Name</label>
                          </div>
                        </div>
                      </div>
                      <!-- Create button -->
                      <div class="mt-4 mb-0">
                        <div class="d-grid">
                          <button class="btn btn-primary w-100 mb-2">
                            <span>Save</span>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- for supplier modal -->
    <div class="modal fade" id="createSupplier" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-half-screen">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="card rounded-lg mt-3">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="icon_text d-flex gap-2 mt-3">
                      <p> <i class="fa-regular fa-address-card"></i></p>
                      <p class="text-black font-bold">Supplier Create</p>
                    </div>
                    <div class="code"></div>
                  </div>
                  <div class="card-body">
                    <form @submit.prevent="CreateSupplier" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <div class="col-md-12">
                          <div class="form-floating mb-3 mb-md-0">
                            <input class="form-control" id="inputName" v-model="form_supplier.supplier_name" type="text"
                              placeholder="Enter your name" />
                            <label for="inputName">Supplier Name</label>
                          </div>
                        </div>
                      </div>
                      <!-- Create button -->
                      <div class="mt-4 mb-0">
                        <div class="d-grid">
                          <button class="btn btn-primary w-100 mb-2">
                            <span>Save</span>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { inject } from "vue";
export default {
  name: "AllAccount",
  data() {
    const company_Name = inject("company_Name");
    return {
      company_Name,
      activeTab: "All Accounts",
      bank: false,
      showDetails: false,
      form_customer: {
        customer_name: null,
        company_id: null,
        user_id: null,
      },
      form_supplier: {
        supplier_name: null,
        company_id: null,
        user_id: null,
      },
      errors: {}
    };
  },
  methods: {
    OpenModal() {
      let myModal = new bootstrap.Modal(
        document.getElementById("editUserModal"),
        {}
      );
      myModal.show();
      this.activeTab = "Customer";
    },
    OpenSupplierModal() {
      let myModal = new bootstrap.Modal(
        document.getElementById("createSupplier"),
        {}
      );
      myModal.show();
      this.activeTab = "Supplier";
    },
    async CreateSupplier() {
      axios.post('/api/supplier/store', this.form_supplier)
        .then((res) => {
          const modalElement = document.getElementById("createSupplier");
          const myModal = bootstrap.Modal.getInstance(modalElement);
          if (myModal) {
            myModal.hide();
          }
          const customerTab = new bootstrap.Tab(document.getElementById('supplier-tab'));
          customerTab.show();
          Toast.fire({
            icon: "success",
            title: res.data.message
          });
        })
        .catch((error) => {
          console.log(error)
        })
    },
    async createCustomer() {
      axios.post('/api/customer/store', this.form_customer)
        .then((res) => {
          const modalElement = document.getElementById("editUserModal");
          const myModal = bootstrap.Modal.getInstance(modalElement);
          if (myModal) {
            myModal.hide();
          }
          const customerTab = new bootstrap.Tab(document.getElementById('customer-tab'));
          customerTab.show();
          Toast.fire({
            icon: "success",
            title: res.data.message
          });
        })
        .catch((error) => {
          console.log(error)
        })
    },
    handleAccountType(event) {
      const selectedValue = event.target.value;
      if (selectedValue === "Bank") {
        this.bank = true;
      } else {
        this.bank = false;
        this.showDetails = false;
      }
    },
    changeTab(tabName) {
      this.activeTab = tabName;
    },
    async companyfind() {
      axios
        .get(`/api/user_company_find/${this.company_id}`)
        .then((res) => {
          this.company_Name = res.data.company_name;
          this.form_customer.company_id = res.data.id
          this.form_customer.user_id = res.data.user_id

          this.form_supplier.company_id = res.data.id
          this.form_supplier.user_id = res.data.user_id
          this.fetchUsers()
        })
        .catch((error) => { });
    },
  },
  mounted() {
    this.company_id = localStorage.getItem("company_id");
    if (this.company_id) {
      this.companyfind();
    }
    else {
      this.$router.push({ name: "AllCompany" })
    }
  },
};
</script>

<style scoped>
ul.btn-list {
  list-style-type: none;
  padding: 0;
  display: flex;
  gap: 10px;
}

ul.btn-list li {
  display: inline-block;
}

ul.btn-list li a {
  text-decoration: none;
  padding: 10px 20px;
  border: 2px solid #007bff;
  border-radius: 5px;
  color: #007bff;
  transition: background-color 0.3s, color 0.3s;
}

ul.btn-list li a:hover {
  background-color: #007bff;
  color: white;
}

.modal-half-screen {
  max-width: 50vw;
  height: 50vh;
}

.modal-content {
  height: 75%;
}
</style>