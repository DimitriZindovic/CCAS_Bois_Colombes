<script>
import axios from "axios";
import NavbarAdmin from "../../../../Components/NavbarAdmin.vue";

export default {
    props: ["user"],
    components: {
        NavbarAdmin,
    },
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
    <div class="container">
        <h1>Modification Utilisateur</h1>
        <div class="content">
            <NavbarAdmin />
            <form @submit.prevent="updateUser" class="user-form">
                <label for="name">Prénom</label>
                <input id="name" v-model="user.name" type="text" />

                <label for="surname">Nom de famille</label>
                <input id="surname" v-model="user.surname" type="text" />

                <label for="email">Email</label>
                <input id="email" v-model="user.email" type="email" />

                <label for="address">Adresse</label>
                <input id="address" v-model="user.address" type="text" />

                <label for="phone">Téléphone</label>
                <input id="phone" v-model="user.phone" type="tel" />

                <label for="city">Ville</label>
                <input id="city" v-model="user.city" type="text" />

                <label for="role">Role</label>
                <select id="role" v-model="user.role">
                    <option value="admin">Admin</option>
                    <option value="invited">Invited</option>
                    <option value="user">User</option>
                </select>

                <button type="submit" class="btn-update">Modifier</button>
            </form>
        </div>
    </div>
</template>
<style scoped lang="scss">
.container {
    display: flex;
    flex-direction: column;
    width: 100vw;
    h1 {
        font-size: 2em;
        color: #333;
        padding: 1rem;
        border-bottom: 1px solid rgb(182, 182, 182);
    }
    .content {
        display: flex;
    }
    .user-form {
        margin-top: 2rem;
        margin-inline: 2rem;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        width: 100%;
        label {
            font-weight: bold;
        }
        input,
        select {
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    }
    .btn-update {
        color: white;
        background-color: #007bff;
        border: none;
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
        &:hover {
            background-color: #0056b3;
        }
    }
}
</style>
