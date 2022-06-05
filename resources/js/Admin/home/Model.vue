<template>
    <div>
        <div
            class="modal fade"
            id="modalEditCat"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">
                            Edit Category
                        </h4>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Category name</label
                            >
                            <input
                                type="text"
                                id="form34"
                                class="form-control validate"
                                v-model="dataArr.name"
                            />
                        </div>

                        <div class="md-form">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form8"
                                >Category Detail</label
                            >
                            <textarea
                                type="text"
                                id="form8"
                                class="md-textarea form-control"
                                rows="4"
                                v-model="dataArr.detail"
                            ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button
                            class="btn btn-unique"
                            data-dismiss="modal"
                            @click="updateCategory(this.index)"
                        >
                            Update <i class="fas fa-paper-plane-o ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- model add -->
        <div
            class="modal fade"
            id="modalAddCat"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">
                            Add Category
                        </h4>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Category name</label
                            >
                            <input
                                type="text"
                                id="form34"
                                class="form-control validate"
                                v-model="dataArr.name"
                            />
                        </div>

                        <div class="md-form">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form8"
                                >Category Detail</label
                            >
                            <textarea
                                type="text"
                                id="form8"
                                class="md-textarea form-control"
                                rows="4"
                                v-model="dataArr.detail"
                            ></textarea>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button
                            class="btn btn-unique"
                            data-dismiss="modal"
                            @click="createCategory"
                        >
                            Add <i class="fas fa-paper-plane-o ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>

<script>
export default {
    props: ["dataArr", "index", "listCategories"],
    methods: {
        async updateCategory(index) {
            try {
                const response = await axios.put(
                    "/categories/" + this.dataArr.id,
                    {
                        name: this.dataArr.name,
                        detail: this.dataArr.detail,
                    }
                );

                this.listCategories[index] = response.data.category;
            } catch (error) {
                this.error = error.response.data;
            }
        },
        async createCategory() {
            try {
                const response = await axios.post("/categories", {
                    name: this.dataArr.name,
                    detail: this.dataArr.detail,
                });
                this.listCategories.unshift(response.data.category);
            } catch (error) {
                this.error = error.response.data;
            }
        },
    },
};
</script>
