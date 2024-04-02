<script>
import axios from "axios";
import NavbarAdmin from "../../../Components/NavbarAdmin.vue";

export default {
    components: {
        NavbarAdmin,
    },
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
<<<<<<< HEAD
    <div>
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
=======
    <h1>Utilisateurs</h1>
    <div class="container">
        <NavbarAdmin />
        <div>
            <button class="btn-add" @click="addUser">Ajouter</button>
            <div class="user" v-for="user in users" :key="user.id">
                <p class="user-item">{{ user.name }}</p>
                <p class="user-item">{{ user.surname }}</p>
                <p class="user-item">{{ user.email }}</p>
                <p class="user-item">{{ user.address }}</p>
                <p class="user-item">{{ user.birth }}</p>
                <p class="user-item">{{ user.phone }}</p>
                <p class="user-item">{{ user.city }}</p>
                <a :href="getDownloadUrl" class="btn-download" download
                    >Télécharger</a
                >
                <a
                    :href="route('updateUser', { user: user.id })"
                    class="btn-edit"
                    >Editer</a
                >
                <button class="btn-delete" @click="deleteUser(user)">
                    Supprimer
                </button>
            </div>
>>>>>>> 19dc051ecccaef94bcc2c500ca5549c6faee46ef
        </div>
    </div>
</template>
<style scoped lang="scss">
.container {
    display: flex;
    width: 100vw;
}

h1 {
    font-size: 2em;
    color: #333;
    padding: 1rem;
    border-bottom: 1px solid rgb(182, 182, 182);
}

button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;

    &:hover {
        background-color: #c82333;
    }
}

div {
    & > p {
        margin-bottom: 5px;
        font-size: 1.2em;
        color: #333;
    }

    .user {
        display: flex;
        align-items: center;
        background-color: #fff;
        justify-content: space-around;
        padding: 20px;
        border-radius: 5px;
        gap: 10px;
        max-width: 100%;
        overflow: auto;

        .user-item {
            max-width: calc(100% / 7 - 10px);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        & > * {
            max-width: 100%;
            overflow: auto;
        }
    }

    .btn-add,
    .btn-download,
    .btn-edit,
    .btn-delete {
        color: white;
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
    }

    .btn-add {
        background-color: #007bff;
        margin-top: 2rem;
        margin-left: 2rem;

        &:hover {
            background-color: #0056b3;
        }
    }

    .btn-download {
        background-color: #28a745;

        &:hover {
            background-color: #218838;
        }
    }

    .btn-edit {
        background-color: #ffc107;

        &:hover {
            background-color: #e0a800;
        }
    }

    .btn-delete {
        background-color: #dc3545;

        &:hover {
            background-color: #c82333;
        }
    }
}
</style>
