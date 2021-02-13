<template>
  <div>
    <div class="form-group mb-3">
      <label for="sortBySelect1">Filter by</label>
      <select
        class="form-control"
        id="sortBySelect1"
        v-model="sortedBy"
        v-on:change="onFilterChange"
      >
        <option disabled value="">Please select one</option>
        <option value="name">Name</option>
        <option value="price">Price</option>
      </select>
    </div>

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
      sortedBy: "",
    };
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    getProducts(filter = {}) {
      console.log("call products");
      axios
        .get("/products", {
          params: filter,
        })
        .then(({ data }) => {
          console.log(data);
          this.products = [...data];
        })
        .catch((err) => console.log("failed", err));
    },
    onFilterChange() {
      this.getProducts({ sortedBy: this.sortedBy });
    },
  },
};
</script>