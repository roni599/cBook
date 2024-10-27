<template>
    <div class="container-fluid px-4">
        <div class="card mt-4 mb-3">
            <div class="card-header border-bottom-0 p-4">
                <router-link class="text-decoration-none h5" to="/home">Dashboard</router-link>
                <span class="text-muted h5"> / {{ settingTitle }}</span>
            </div>
        </div>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                    type="button" role="tab" aria-controls="nav-home" aria-selected="true"
                    @click="updateTitle('General Setting')">
                    General Setting
                </button>
                <button class="nav-link" id="nav-sales-tab" data-bs-toggle="tab" data-bs-target="#nav-sales"
                    type="button" role="tab" aria-controls="nav-sales" aria-selected="false"
                    @click="updateTitle('Sales')">
                    Sales
                </button>
                <button class="nav-link" id="nav-purchase-tab" data-bs-toggle="tab" data-bs-target="#nav-purchase"
                    type="button" role="tab" aria-controls="nav-purchase" aria-selected="false"
                    @click="updateTitle('Purchase')">
                    Purchase
                </button>
                <button class="nav-link" id="nav-pos-tab" data-bs-toggle="tab" data-bs-target="#nav-pos" type="button"
                    role="tab" aria-controls="nav-pos" aria-selected="false" @click="updateTitle('POS')">
                    POS
                </button>
                <button class="nav-link" id="nav-service-sales-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-service-sales" type="button" role="tab" aria-controls="nav-service-sales"
                    aria-selected="false" @click="updateTitle('Service Sales')">
                    Service Sales
                </button>
                <button class="nav-link" id="nav-warranty-tab" data-bs-toggle="tab" data-bs-target="#nav-warranty"
                    type="button" role="tab" aria-controls="nav-warranty" aria-selected="false"
                    @click="updateTitle('Warranty Service')">
                    Warranty Service
                </button>
                <button class="nav-link" id="nav-project-tab" data-bs-toggle="tab" data-bs-target="#nav-project"
                    type="button" role="tab" aria-controls="nav-project" aria-selected="false"
                    @click="updateTitle('Project')">
                    Project
                </button>
                <button class="nav-link" id="nav-manufacture-tab" data-bs-toggle="tab" data-bs-target="#nav-manufacture"
                    type="button" role="tab" aria-controls="nav-manufacture" aria-selected="false"
                    @click="updateTitle('Manufacture')">
                    Manufacture
                </button>
                <button class="nav-link" id="nav-hr-tab" data-bs-toggle="tab" data-bs-target="#nav-hr" type="button"
                    role="tab" aria-controls="nav-hr" aria-selected="false" @click="updateTitle('HR/Payroll')">
                    HR/Payroll
                </button>
                <button class="nav-link" id="nav-sms-tab" data-bs-toggle="tab" data-bs-target="#nav-sms" type="button"
                    role="tab" aria-controls="nav-sms" aria-selected="false" @click="updateTitle('SMS')">
                    SMS
                </button>
                <button class="nav-link" id="nav-email-tab" data-bs-toggle="tab" data-bs-target="#nav-email"
                    type="button" role="tab" aria-controls="nav-email" aria-selected="false"
                    @click="updateTitle('E-Mail')">
                    E-Mail
                </button>
                <button class="nav-link" id="nav-whatsapp-tab" data-bs-toggle="tab" data-bs-target="#nav-whatsapp"
                    type="button" role="tab" aria-controls="nav-whatsapp" aria-selected="false"
                    @click="updateTitle('WhatsApp')">
                    WhatsApp
                </button>
                <button class="nav-link" id="nav-barcode-tab" data-bs-toggle="tab" data-bs-target="#nav-barcode"
                    type="button" role="tab" aria-controls="nav-barcode" aria-selected="false"
                    @click="updateTitle('Barcode')">
                    Barcode
                </button>
                <button class="nav-link" id="nav-sticker-print-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-sticker-print" type="button" role="tab" aria-controls="nav-sticker-print"
                    aria-selected="false" @click="updateTitle('Sticker Print')">
                    Sticker Print
                </button>
                <button class="nav-link" id="nav-payment-gateway-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-payment-gateway" type="button" role="tab" aria-controls="nav-payment-gateway"
                    aria-selected="false" @click="updateTitle('Payment Gateway')">
                    Payment Gateway
                </button>
                <button class="nav-link" id="nav-multicurrency-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-multicurrency" type="button" role="tab" aria-controls="nav-multicurrency"
                    aria-selected="false" @click="updateTitle('Multicurrency')">
                    Multicurrency
                </button>
                <button class="nav-link" id="nav-online-store-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-online-store" type="button" role="tab" aria-controls="nav-online-store"
                    aria-selected="false" @click="updateTitle('Online Store')">
                    Online Store
                </button>
                <button class="nav-link" id="nav-ecommerce-store-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-ecommerce-store" type="button" role="tab" aria-controls="nav-ecommerce-store"
                    aria-selected="false" @click="updateTitle('E-Commerce Store')">
                    E-Commerce Store
                </button>
                <button class="nav-link" id="nav-loan-credit-tab" data-bs-toggle="tab" data-bs-target="#nav-loan-credit"
                    type="button" role="tab" aria-controls="nav-loan-credit" aria-selected="false"
                    @click="updateTitle('Loan/Credit')">
                    Loan/Credit
                </button>
                <button class="nav-link" id="nav-company-website-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-company-website" type="button" role="tab" aria-controls="nav-company-website"
                    aria-selected="false" @click="updateTitle('Company Website')">
                    Company Website
                </button>
                <button class="nav-link" id="nav-marketplace-tab" data-bs-toggle="tab" data-bs-target="#nav-marketplace"
                    type="button" role="tab" aria-controls="nav-marketplace" aria-selected="false"
                    @click="updateTitle('Marketplace')">
                    Marketplace
                </button>
                <button class="nav-link" id="nav-user-management-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-user-management" type="button" role="tab" aria-controls="nav-user-management"
                    aria-selected="false" @click="updateTitle('User Management')">
                    User Management
                </button>
                <button class="nav-link" id="nav-marketing-team-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-marketing-team" type="button" role="tab" aria-controls="nav-marketing-team"
                    aria-selected="false" @click="updateTitle('Marketing Team')">
                    Marketing Team
                </button>
                <button class="nav-link" id="nav-customer-level-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-customer-level" type="button" role="tab" aria-controls="nav-customer-level"
                    aria-selected="false" @click="updateTitle('Customer Level')">
                    Customer Level
                </button>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <h1>General Settings</h1>
            </div>
            <div class="tab-pane fade" id="nav-sales" role="tabpanel" aria-labelledby="nav-sales-tab">
                <h1>Sales</h1>
            </div>
            <div class="tab-pane fade" id="nav-purchase" role="tabpanel" aria-labelledby="nav-purchase-tab">
                <h1>Purchase</h1>
            </div>
            <div class="tab-pane fade" id="nav-pos" role="tabpanel" aria-labelledby="nav-pos-tab">
                <h1>POS</h1>
            </div>
            <div class="tab-pane fade" id="nav-service-sales" role="tabpanel" aria-labelledby="nav-service-sales-tab">
                <h1>Service Sales</h1>
            </div>
            <div class="tab-pane fade" id="nav-warranty" role="tabpanel" aria-labelledby="nav-warranty-tab">
                <h1>Warranty Service</h1>
            </div>
            <div class="tab-pane fade" id="nav-project" role="tabpanel" aria-labelledby="nav-project-tab">
                <h1>Project</h1>
            </div>
            <div class="tab-pane fade" id="nav-manufacture" role="tabpanel" aria-labelledby="nav-manufacture-tab">
                <h1>Manufacture</h1>
            </div>
            <div class="tab-pane fade" id="nav-hr" role="tabpanel" aria-labelledby="nav-hr-tab">
                <h1>HR/Payroll</h1>
            </div>
            <div class="tab-pane fade" id="nav-sms" role="tabpanel" aria-labelledby="nav-sms-tab">
                <h1>SMS</h1>
            </div>
            <div class="tab-pane fade" id="nav-email" role="tabpanel" aria-labelledby="nav-email-tab">
                <h1>E-Mail</h1>
            </div>
            <div class="tab-pane fade" id="nav-whatsapp" role="tabpanel" aria-labelledby="nav-whatsapp-tab">
                <h1>WhatsApp</h1>
            </div>
            <div class="tab-pane fade" id="nav-barcode" role="tabpanel" aria-labelledby="nav-barcode-tab">
                <h1>Barcoad</h1>
            </div>
            <div class="tab-pane fade" id="nav-sticker-print" role="tabpanel" aria-labelledby="nav-sticker-print-tab">
                <h1>Sticer Print</h1>
            </div>
            <div class="tab-pane fade" id="nav-payment-gateway" role="tabpanel"
                aria-labelledby="nav-payment-gateway-tab">
                <h1>Payment Gateway</h1>
            </div>
            <div class="tab-pane fade" id="nav-multicurrency" role="tabpanel" aria-labelledby="nav-multicurrency-tab">
                <h1>Mulicurrency</h1>
            </div>
            <div class="tab-pane fade" id="nav-online-store" role="tabpanel" aria-labelledby="nav-online-store-tab">
                <h1>Online Store</h1>
            </div>
            <div class="tab-pane fade" id="nav-ecommerce-store" role="tabpanel"
                aria-labelledby="nav-ecommerce-store-tab">
                <h1>E-Commerce Store</h1>
            </div>
            <div class="tab-pane fade" id="nav-loan-credit" role="tabpanel" aria-labelledby="nav-loan-credit-tab">
                <h1>Loan/Credit</h1>
            </div>
            <div class="tab-pane fade" id="nav-company-website" role="tabpanel"
                aria-labelledby="nav-company-website-tab">
                <h1>Company Website</h1>
            </div>
            <div class="tab-pane fade" id="nav-marketplace" role="tabpanel" aria-labelledby="nav-marketplace-tab">
                <h1>Marketplace</h1>
            </div>
            <div class="tab-pane fade" id="nav-user-management" role="tabpanel"
                aria-labelledby="nav-user-management-tab">
                <h1>User Magment</h1>
            </div>
            <div class="tab-pane fade" id="nav-marketing-team" role="tabpanel" aria-labelledby="nav-marketing-team-tab">
                <h1>Marketting Team</h1>
            </div>
            <div class="tab-pane fade" id="nav-customer-level" role="tabpanel" aria-labelledby="nav-customer-level-tab">
                <h1>Customer Lavel</h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Setting",
    data() {
        return {
            settingTitle: "General Setting",
        };
    },
    methods: {
        updateTitle(tabName) {
            this.settingTitle = tabName;
        },
    },
};
</script>

<style scoped></style>