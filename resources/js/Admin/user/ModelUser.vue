<template>
    <div
        class="modal fade"
        id="modalEditUser"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
    >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">
                        Edit User
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
                            >Fullname</label
                        >
                        <input
                            type="text"
                            id="form34"
                            v-model="dataArr.name"
                            class="form-control validate"
                        />
                    </div>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label
                            data-error="wrong"
                            data-success="right"
                            for="form34"
                            >Email</label
                        >
                        <input
                            type="text"
                            id="form34"
                            v-model="dataArr.email"
                            class="form-control validate"
                        />
                    </div>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label
                            data-error="wrong"
                            data-success="right"
                            for="form34"
                            >Permission</label
                        >
                        <select
                            name=""
                            id=""
                            @change="onChange"
                            class="form-control validate"
                        >
                            <option
                                value="1"
                                :selected="1 == dataArr.permission"
                            >
                                Admin
                            </option>
                            <option
                                value="2"
                                :selected="2 == dataArr.permission"
                            >
                                User
                            </option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button
                        class="btn btn-unique"
                        data-dismiss="modal"
                        @click="updateUser(index)"
                    >
                        Update <i class="fas fa-paper-plane-o ml-1"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>

<script>
export default {
    data() {
        return {
            selected: true,
            key: "",
        };
    },
    props: ["dataArr", "index", "listUsers"],
    methods: {
        onChange(e) {
            this.key = e.target.value;
            console.log(this.key);
        },
        async updateUser(index) {
            try {
                const response = await axios.put("/users/" + this.dataArr.id, {
                    name: this.dataArr.name,
                    email: this.dataArr.email,
                    permission: this.key,
                });

                this.listUsers[index].name = response.data.user;
            } catch (error) {
                this.error = error.response.data;
            }
        },
    },
};
</script>
