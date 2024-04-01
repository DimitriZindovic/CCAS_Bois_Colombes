<script>
import axios from "axios";

export default {
    props: ["user"],
    methods: {
        updateUser() {
            axios
                .put(`/admin/dashboard/users/update/${this.user.id}`, this.user)
                .then((response) => {
                    this.$inertia.visit("/admin/dashboard/users");
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>
<template>
    <div>
        <h1>Edit User</h1>

        <form @submit.prevent="updateUser">
            <label for="name">Name</label>
            <input id="name" v-model="user.name" type="text" />

            <label for="surname">Surname</label>
            <input id="surname" v-model="user.surname" type="text" />

            <label for="email">Email</label>
            <input id="email" v-model="user.email" type="email" />

            <label for="address">Address</label>
            <input id="address" v-model="user.address" type="text" />

            <label for="phone">Phone</label>
            <input id="phone" v-model="user.phone" type="tel" />

            <label for="city">City</label>
            <input id="city" v-model="user.city" type="text" />

            <label for="role">Role</label>
            <select id="role" v-model="user.role">
                <option value="admin">Admin</option>
                <option value="invited">Invited</option>
                <option value="user">User</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
</template>
