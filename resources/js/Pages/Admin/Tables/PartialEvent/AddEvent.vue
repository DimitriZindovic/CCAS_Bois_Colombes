<script>
import { useForm } from "@inertiajs/inertia-vue3";
import NavbarAdmin from "../../../../Components/NavbarAdmin.vue";

export default {
    data() {
        return {
            form: useForm({
                name: "",
                description: "",
                date: "",
                location: "",
                address: "",
                image: "",
            }),
            formRoom: {
                name: "",
                image: "",
                date: "",
            },
        };
    },
    methods: {
        submitForm() {
            this.form.post(route("events.store"), {
                onSuccess: () => {
                    console.log("Event created successfully!");
                },
            });
        },
        changePage() {
            this.$inertia.visit("/admin/dashboard/events");
        },
    },
    components: {
        NavbarAdmin,
    },
};
</script>
<template>
    <h2>Ajouter un événement</h2>
    <div class="container">
        <div class="content">
            <NavbarAdmin />
            <form @submit.prevent="submitForm" enctype="multipart/form-data">
                <label for="name">Nom</label>
                <input
                    id="name"
                    type="text"
                    v-model="form.name"
                    required
                    autofocus
                />

                <label for="description">Description</label>
                <input
                    id="description"
                    type="text"
                    v-model="form.description"
                    required
                />

                <label for="date">Date</label>
                <input id="date" type="date" v-model="form.date" required />

                <label for="location">Ville</label>
                <input
                    id="location"
                    type="text"
                    v-model="form.location"
                    required
                />

                <label for="address">Adresse</label>
                <input
                    id="address"
                    type="text"
                    v-model="form.address"
                    required
                />
                <label for="image">Image</label>
                <input
                    id="image"
                    type="file"
                    ref="image"
                    @change="form.image = $refs.image.files[0]"
                />
                <div>
                    <button type="submit" @click="changePage()">Créer</button>
                </div>
            </form>
        </div>
    </div>
</template>
<style scoped lang="scss">
h2 {
    font-size: 2em;
    color: #333;
    padding: 1rem;
    border-bottom: 1px solid rgb(182, 182, 182);
}

.container {
    display: flex;
    flex-direction: column;
    .content {
        display: flex;
    }
    form {
        margin-top: 2rem;
        margin-inline: 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
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
    button[type="submit"] {
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
