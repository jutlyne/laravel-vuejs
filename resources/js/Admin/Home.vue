<template>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Posts</div>
                    <div
                        class="
                            card-footer
                            d-flex
                            align-items-center
                            justify-content-between
                        "
                    >
                        <a
                            class="small text-white stretched-link"
                            href="/admin/post"
                            >View Details</a
                        >
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Users</div>
                    <div
                        class="
                            card-footer
                            d-flex
                            align-items-center
                            justify-content-between
                        "
                    >
                        <a
                            class="small text-white stretched-link"
                            href="/admin/user"
                            >View Details</a
                        >
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                Categories
                <button
                    type="button"
                    class="btn btn-success"
                    data-toggle="modal"
                    data-target="#modalAddCat"
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
                            <th scope="col">Category Name</th>
                            <th scope="col">Category Detail</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                            v-for="(category, index) in listCategories"
                            :key="category.id"
                        >
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ category.name }}</td>
                            <td class="txt-detail">{{ category.detail }}</td>
                            <td>
                                <button
                                    type="button"
                                    class="btn btn-success"
                                    v-bind:data-id="category.id"
                                    v-bind:data-key="index"
                                    data-toggle="modal"
                                    data-target="#modalEditCat"
                                    @click="getInfo"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-danger"
                                    @click="deleteCategory(category, index)"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <Model
            v-bind:dataArr="dataArr"
            :index="index"
            :listCategories="listCategories"
        ></Model>
    </div>
</template>

<style scoped>
.container {
    padding: 2rem 0rem;
}

h4 {
    margin: 2rem 0rem 1rem;
}

.txt-detail {
    width: 65% !important;
}
</style>

<script>
import Model from "@/Admin/home/Model.vue";

export default {
    components: {
        Model,
    },
    data() {
        return {
            dataArr: [],
            index: 0,
            listCategories: [],
            error: null,
        };
    },
    created() {
        this.getCategories();
    },
    methods: {
        getInfo: function (e) {
            this.index = e.target.getAttribute('data-key');
            this.dataArr = this.listCategories[this.index];
        },
        async getCategories() {
            try {
                const response = await axios.get("/categories");
                this.listCategories = response.data;
            } catch (error) {
                this.error = error.response.data;
            }
        },
        async deleteCategory(category, index) {
            try {
                await axios.delete("/categories/" + category.id);
                this.listCategories.splice(index, 1);
            } catch (error) {
                this.error = error.response.data;
            }
        },
    },
};
</script>
