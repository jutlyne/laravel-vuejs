<template>
    <div>
        <div
            class="modal fade"
            id="modalEditPost"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">
                            Edit Post {{ dataArr.id }}
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
                    <form
                        class="modal-body mx-3"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Post name</label
                            >
                            <input
                                type="text"
                                id="form34"
                                v-model="dataArr.name"
                                class="form-control validate"
                            />
                        </div>
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Category name</label
                            >
                            <select
                                name=""
                                id=""
                                class="form-control validate"
                                v-model="dataArr.category_id"
                            >
                                <option
                                    v-for="(category, index) in listCategories"
                                    :key="index"
                                    v-bind:value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Images</label
                            >
                            <input
                                type="file"
                                id="form34"
                                class="form-control validate"
                                v-on:change="uploadImage"
                            />

                            <div class="images">
                                <img
                                    v-bind:src="'/storage/' + dataArr.images"
                                    width="100%"
                                    height="200px"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div class="md-form">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form8"
                                >Sort Detail</label
                            >
                            <textarea
                                type="text"
                                id="form8"
                                class="md-textarea form-control"
                                rows="4"
                                v-model="dataArr.sort_detail"
                            ></textarea>
                        </div>

                        <div class="md-form">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form8"
                                >Post Detail</label
                            >
                            <textarea
                                type="text"
                                id="form8"
                                class="md-textarea form-control"
                                rows="4"
                                v-model="dataArr.detail"
                            ></textarea>
                        </div>
                    </form>
                    <div class="modal-footer d-flex justify-content-center">
                        <button
                            class="btn btn-unique"
                            data-dismiss="modal"
                            @click="editPost(index)"
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
            id="modalAddPost"
            tabindex="-1"
            role="dialog"
            aria-labelledby="myModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">
                            Add Post
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
                    <form
                        class="modal-body mx-3"
                        method="post"
                        enctype="multipart/form-data"
                    >
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Post name</label
                            >
                            <input
                                type="text"
                                id="form34"
                                v-model="dataArr.name"
                                class="form-control validate"
                            />
                        </div>
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Category name</label
                            >
                            <select
                                name=""
                                id=""
                                @change="onChange($event)"
                                class="form-control validate"
                                v-model="key"
                            >
                                <option
                                    v-for="(category, index) in listCategories"
                                    :key="index"
                                    v-bind:value="category.id"
                                >
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                        <div class="md-form mb-5">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form34"
                                >Images</label
                            >
                            <input
                                type="file"
                                id="images"
                                name="img"
                                class="form-control validate"
                                v-on:change="uploadImage"
                            />
                            <!-- <div class="images">
                                <img v-bind:src="'/storage/' + dataArr.images" width="100%" height="200px" alt="">
                            </div> -->
                        </div>

                        <div class="md-form">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form8"
                                >Sort Detail</label
                            >
                            <textarea
                                type="text"
                                id="form8"
                                class="md-textarea form-control"
                                rows="4"
                                v-model="dataArr.sort_detail"
                            ></textarea>
                        </div>

                        <div class="md-form">
                            <label
                                data-error="wrong"
                                data-success="right"
                                for="form8"
                                >Post Detail</label
                            >
                            <textarea
                                type="text"
                                id="form8"
                                class="md-textarea form-control"
                                rows="4"
                                v-model="dataArr.detail"
                            ></textarea>
                        </div>
                    </form>
                    <div class="modal-footer d-flex justify-content-center">
                        <button
                            class="btn btn-unique"
                            data-dismiss="modal"
                            @click="uploadFile"
                        >
                            Update <i class="fas fa-paper-plane-o ml-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.images {
    margin: 20px 0;
}
</style>

<script>
export default {
    data() {
        return {
            images: "",
        };
    },
    props: ["dataArr", "listPosts", "listCategories", "index"],
    methods: {
        uploadImage(e) {
            this.images = e.target.files[0];
        },
        async updatePost(index) {
            try {
                const response = await axios.put("/posts/" + this.dataArr.id, {
                    name: this.dataArr.name,
                    detail: this.dataArr.detail,
                    sort_detail: this.dataArr.sort_detail,
                    images: this.images,
                    category_id: this.dataArr.category_id,
                });
                console.log(this.images);
                this.listPosts[index] = response.data.post;
            } catch (error) {
                this.error = error.response.data;
            }
        },
        editPost: function (index) {
            try {
                var fd = new FormData();
                fd.append("images", this.images);
                fd.append("name", this.dataArr.name);
                fd.append("detail", this.dataArr.detail);
                fd.append("sort_detail", this.dataArr.sort_detail);
                fd.append("category_id", this.dataArr.category_id);
                fd.append("_method", "put");
                axios.post("/posts/" + this.dataArr.id, fd, {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                 .then(response => this.listPosts[index] = response.data.post);
            } catch (error) {
                console.log(error.response.data);
            }
        },
        uploadFile: function (event) {
            var formData = new FormData();
            formData.set("images", this.images),
                formData.set("name", this.dataArr.name),
                formData.set("detail", this.dataArr.detail),
                formData.set("sort_detail", this.dataArr.sort_detail),
                formData.set("category_id", this.key);

            axios
                .post("/posts", formData)
                .then((response) => this.listPosts.unshift(response.data.post));
        },
    },
};
</script>
