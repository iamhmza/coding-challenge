<template>
  <div>
    <div v-if="products.length > 1">
      <div class="row">
        <div class="col-sm" v-for="product in products" :key="product.id">
          <div class="card mb-3" style="width: 18rem">
            <img :src="'/storage/' + product.image" :alt="product.name" />
            <div class="card-body">
              <h5 class="card-title">{{ product.name }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ product.price }}</h6>
              <p class="card-text">
                {{ product.description }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-else>no products yet!</div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    axios
      .get("/products")
      .then(({ data }) => {
        this.products = [...data];
      })
      .catch((err) => console.log("failed", err));
  },
};
</script>