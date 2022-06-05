<template>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Users
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Permission</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(user, index) in listUsers" :key="index">
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td v-if="user.permission == 2">User</td>
                            <td v-else>Admin</td>
                            <td>
                                <button
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#modalEditUser"
                                    class="btn btn-success"
                                    v-bind:data-id="user.id"
                                    v-bind:data-key="index"
                                    @click="getInfoUser"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    type="button"
                                    @click="deleteUser(user, index)"
                                    class="btn btn-danger"
                                >
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <ModelUser
            v-bind:dataArr="user"
            :listUsers="listUsers"
            :index="index"
        ></ModelUser>
    </div>
</template>

<style scoped>
.container {
    padding: 2rem 0rem;
}

h4 {
    margin: 2rem 0rem 1rem;
}
</style>

<script>
import ModelUser from '@/Admin/user/ModelUser.vue'

export default {
    components: {
        ModelUser
    },
    data() {
        return {
            listUsers: [],
            user: [],
            index: 0,
        };
    },
    created() {
        this.getListUsers();
    },
    methods: {
        getInfoUser(e) {
            this.index = e.target.getAttribute("data-key");
            this.user = this.listUsers[this.index];
        },
        async getListUsers() {
            const response = await axios.get("/users");
            this.listUsers = response.data;
            console.log(this.listUsers);
        },
        async deleteUser(user, index) {
            try {
                await axios.delete("/users/" + user.id);
                this.listUsers.splice(index, 1);
            } catch (error) {
                this.error = error.response.data;
            }
        }
    }
};
</script>
