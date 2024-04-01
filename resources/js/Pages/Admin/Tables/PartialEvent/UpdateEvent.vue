<script>
import axios from "axios";

export default {
    props: ["event"],
    data() {
        return {
            form: {
                name: "",
                description: "",
                date: "",
                location: "",
                address: "",
                image: "",
            },
        };
    },
    mounted() {
        this.form = { ...this.event };
        this.form.date = new Date(this.event.date).toISOString().split("T")[0];
    },
    methods: {
        updateEvent() {
            axios
                .put(
                    `/admin/dashboard/events/update/${this.event.id}`,
                    this.form
                )
                .then((response) => {
                    this.$inertia.visit("/admin/dashboard/events");
                });
        },
    },
};
</script>
<template>
    <div>
        <h1>Edit Event</h1>
        <form @submit.prevent="updateEvent" enctype="multipart/form-data">
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
                <input
                    id="location"
                    type="text"
                    v-model="form.location"
                    required
                />
            </div>
            <div>
                <label for="address">Adresse</label>
                <input
                    id="address"
                    type="text"
                    v-model="form.address"
                    required
                />
            </div>
            <div>
                <label for="image">Image</label>
                <input id="image" type="file" ref="image" />
            </div>
            <div>
                <button type="submit">Editer</button>
            </div>
        </form>
    </div>
</template>
