<template>
  <div
    class="modal fade"
    id="addCategoryModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="addCategoryModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">
            Create new category
          </h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="categoryInput1">Category</label>
              <input
                type="text"
                class="form-control"
                id="categoryInput1"
                aria-describedby="category"
                placeholder="Enter category"
                v-model="name"
              />
            </div>

            <button
              type="submit"
              class="btn btn-primary"
              v-on:click.prevent="submitForm()"
            >
              Add
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Close
          </button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
    };
  },
  props: ["getCategories"],
  methods: {
    submitForm() {
      let formData = new FormData();
      formData.append("name", this.name);

      axios
        .post("/category/store", formData, {
          headers: {
            "Content-Type": "multipart/form-data",
          },
        })
        .then((res) => {
          $("#addCategoryModal").modal("hide");
          this.getCategories();
        })
        .catch((err) => console.log("failed", err));
    },
  },
};
</script>

<style>
</style>