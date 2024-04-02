<script>
import axios from "axios";
import { useForm } from "@inertiajs/inertia-vue3";
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
    },
};
</script>
<template>
    <form @submit.prevent="submitForm" enctype="multipart/form-data">
        <div>
            <label for="name">Nom</label>
            <input
                id="name"
                type="text"
                v-model="form.name"
                required
                autofocus
            />
        </div>
        <div>
            <label for="description">Description</label>
            <input
                id="description"
                type="text"
                v-model="form.description"
                required
            />
        </div>
        <div>
            <label for="date">Date</label>
            <input id="date" type="date" v-model="form.date" required />
        </div>
        <div>
            <label for="location">Ville</label>
            <input id="location" type="text" v-model="form.location" required />
        </div>
        <div>
            <label for="address">Adresse</label>
            <input id="address" type="text" v-model="form.address" required />
        </div>
        <div>
            <label for="image">Image</label>
            <input
                id="image"
                type="file"
                ref="image"
                @change="form.image = $refs.image.files[0]"
            />
        </div>
        <div>
            <button type="submit">Créer</button>
        </div>
    </form>
</template>
