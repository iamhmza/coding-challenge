<template>
  <div>
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

      <div class="form-group">
        <label for="productCategoryControlSelect1">Categories</label>
        <select
          class="form-control"
          id="productCategoryControlSelect1"
          v-model="selected"
        >
          <option v-if="categories.length < 1">no categories</option>
          <option
            v-else
            v-for="category in categories"
            v-bind:value="category.id"
            v-bind:key="category.id"
          >
            {{ category.name }}
          </option>
        </select>

        <button
          type="button"
          class="btn btn-link"
          data-toggle="modal"
          data-target="#addCategoryModal"
        >
          Add new category
        </button>
      </div>

      <button
        type="submit"
        class="btn btn-primary"
        v-on:click.prevent="submitForm()"
      >
        Create new product
      </button>
    </form>
    <add-category-modal :getCategories="getCategories" />
  </div>
</template>

<script>
import AddCategoryModal from "../components/AddCategoryModal.vue";
export default {
  components: {
    AddCategoryModal,
  },
  data() {
    return {
      selected: "",
      categories: [],
      name: "",
      description: "",
      price: 0,
      image: "",
    };
  },

  mounted() {
    this.getCategories();
  },

  methods: {
    getCategories() {
      axios
        .get("/categories")
        .then(({ data }) => (this.categories = [...data]))
        .catch((err) => console.log("failure:categories"));
    },
    submitForm() {
      let formData = new FormData();
      formData.append("name", this.name);
      formData.append("description", this.description);
      formData.append("price", this.price);
      formData.append("image", this.image);
      formData.append("category_id", this.selected);

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
