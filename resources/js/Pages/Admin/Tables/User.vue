<script>
import axios from "axios";

export default {
    props: ["users"],
    methods: {
        deleteUser(user) {
            if (
                confirm(
                    `Voulez-vous vraiment supprimer l'utilisateur ${user.name} ?`
                )
            ) {
                axios
                    .delete(`/admin/dashboard/users/${user.id}`)
                    .then((response) => {
                        this.$inertia.visit("/admin/dashboard/users");
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
        getDownloadUrl(filename) {
            return `/download/file/${filename}`;
        },
    },
};
</script>
<template>
    <div>
        <h1>Hello</h1>
        <a :href="route('addUser')">Ajouter</a>
        <div v-for="user in users" :key="user.id">
            <p>{{ user.name }}</p>
            <p>{{ user.surname }}</p>
            <p>{{ user.email }}</p>
            <p>{{ user.address }}</p>
            <p>{{ user.birth }}</p>
            <p>{{ user.phone }}</p>
            <p>{{ user.city }}</p>
            <a :href="getDownloadUrl" download>Download File</a>
            <a :href="route('updateUser', { user: user.id })">Editer</a>
            <button @click="deleteUser(user)">Supprimer</button>
        </div>
    </div>
</template>
