<template>
  <form>
    <div class="form-group">
      <label for="productName">Product Name</label>
      <input
        type="text"
        class="form-control"
        id="productName"
        aria-describedby="Product name"
        placeholder="Enter name"
        v-model="name"
      />
    </div>
    <div class="form-group">
      <label for="ProductPrice">Price</label>
      <input
        type="number"
        class="form-control"
        id="ProductPrice"
        placeholder="Price"
        min="1"
        v-model="price"
      />
    </div>
    <div class="form-group">
      <label for="productDescription">Description</label>
      <textarea
        class="form-control"
        id="productDescription"
        rows="3"
        v-model="description"
      ></textarea>
    </div>
    <div class="form-group">
      <label for="productImage">Prodcut image</label>
      <input
        type="file"
        class="form-control-file"
        id="productImage"
        ref="image"
        v-on:change="onChangeFileUpload()"
      />
    </div>

    <button
      type="submit"
      class="btn btn-primary"
      v-on:click.prevent="submitForm()"
    >
      Create new product
    </button>
  </form>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      description: "",
      price: 0,
      image: "",
    };
  },

  methods: {
    submitForm() {
      let formData = new FormData();
      formData.append("name", this.name);
      formData.append("description", this.description);
      formData.append("price", this.price);
      formData.append("image", this.image);

      axios
        .post("/product/store", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((data) => {
          console.log(data.data);
          this.$router.push({ name: "home" });
        })
        .catch(function (err) {
          console.log("FAILURE!!", err);
        });
    },

    onChangeFileUpload() {
      this.image = this.$refs.image.files[0];
    },
  },
};
</script>
