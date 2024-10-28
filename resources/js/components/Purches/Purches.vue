<template>
    <div class="container-fluid px-4">

        <div class="row">
            <div class="col-md-12">
                <div class="d-flex align-items-center">
                    <img src="../../../../public/backend/images/users/436_ekRoni.png" width="55" height="55"
                        class="rounded-circle me-2" />
                    <div class="adminName mt-3">
                        <span class="text-warning fw-bold">Login User</span>
                        <p class="mb-0">Md. Ebrahim Khalil</p>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary rounded-pill px-3 mb-4 mx-2">Cush <span><i
                    class="fa-solid fa-angle-right"></i></span></button>
        <div class="row mb-5">
            <div class="col-md-3">
                <label for="inputName">Cash/Business/Customer Name</label>
                <div class="d-flex justify-content-end mb-3 mb-md-0">
                    <input class="form-control" id="inputName" type="text" />
                    <span class="mt-2 mx-1 text-primary"><i class="fa-solid fa-pen-to-square"></i></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <label for="inputName">Item Name</label>
                <select class="form-select form-select mb-3" aria-label=".form-select-lg example">
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
        </div>
        <table class="table table-bordered  border-dark">
            <thead>
                <tr class="bg-info">
                    <th scope="col">Item Name</th>
                    <!-- <th scope="col">Code</th> -->
                    <th scope="col">Qty</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Price</th>
                    <!-- <th scope="col">MRP</th> -->
                    <!-- <th scope="col">Dis(%)</th> -->
                    <!-- <th scope="col">Dis(Amo)</th> -->
                    <th scope="col">Total</th>
                    <!-- <th scope="col">Item Details</th> -->
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="2" class="text-end">Total</th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <!-- <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td> -->
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Purches",
    data() {
        return {

        }
    },
    methods: {
        async fetchUsers() {
            const token = localStorage.getItem('token');
            await axios.get("/api/auth/me", {
                headers: {
                    'Authorization': `Bearer ${token}`
                }
            })
                .then((res) => {
                    this.userName = res.data.user_name;
                    this.profile_img = res.data.profile_img;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

    },
    mounted() {
        this.fetchUsers();
    }
}
</script>

<style></style>