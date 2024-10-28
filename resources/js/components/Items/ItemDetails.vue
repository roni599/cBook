<template>
  <h1>I am from Item Details</h1>
</template>

<script>
export default {
  name: "ItemDetails",
  data() {
    return {

    }
  },
  props: {
    productId: Number,
  },
  mounted() {
    if (this.productId) {
      console.log("Product ID in ProductName component:", this.productId);
    }
  },
}
</script>

<style></style>