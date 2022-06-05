<template>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Posts</h1>
        <div class="card mb-4">
            <div class="card-header">
                <button
                    type="button"
                    class="btn btn-success"
                    data-toggle="modal"
                    data-target="#modalAddPost"
                    @click="log"
                >
                    Add New
                    <i class="fas fa-plus me-1"></i>
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Post Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Sort Detail</th>
                            <th scope="col">Images</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(post, index) in listPosts" :key="post.id">
                            <th scope="row">{{ post.id }}</th>
                            <td>{{ post.name }}</td>
                            <template
                                v-for="(category, index) in listCategories"
                                :key="index"
                            >
                                <td v-if="category.id == post.category_id">
                                    {{ category.name }}
                                </td>
                            </template>
                            <td class="txt-detail">{{ post.sort_detail }}</td>
                            <td>
                                <img
                                    v-bind:src="'/storage/' + post.images"
                                    alt=""
                                />
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-success"
                                    v-bind:data-id="index"
                                    data-toggle="modal"
                                    data-target="#modalEditPost"
                                    @click="getInfo"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    @click="deletePost(post, index)"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <ModelPost
            v-bind:dataArr="post_edit"
            :listPosts="listPosts"
            :listCategories="listCategories"
            :index="index"
        ></ModelPost>
    </div>
</template>

<style scoped>
.container {
    padding: 2rem 0rem;
}

h4 {
    margin: 2rem 0rem 1rem;
}
img {
    width: 100px;
    height: 50px;
}
</style>

<script>
import ModelPost from "@/Admin/post/ModelPost.vue";

export default {
    components: {
        ModelPost,
    },
    data() {
        return {
            post_edit: [],
            listPosts: [],
            listCategories: [],
            error: null,
            index: 0,
        };
    },
    created() {
        this.getListPosts();
        this.getListCategories();
    },
    methods: {
        getInfo: function (e) {
            this.index = e.target.getAttribute("data-id");
            this.post_edit = this.listPosts[this.index];
        },
        async getListPosts() {
            try {
                const response = await axios.get("/posts");
                this.listPosts = response.data;
            } catch (error) {
                this.error = error.response.data;
            }
        },
        async getListCategories() {
            try {
                const res = await axios.get("/categories");
                this.listCategories = res.data;
            } catch (error) {
                this.error = error.res.data;
            }
        },
        async deletePost(post, index) {
            try {
                await axios.delete("/posts/" + post.id);
                this.listPosts.splice(index, 1);
            } catch (error) {
                this.error = error.response.data;
            }
        },
    },
};
</script>
