<script>
import axios from "axios";

export default {
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
            formRoom: {
                name: "",
                image: "",
                date: "",
            },
        };
    },
    methods: {
        submitForm() {
            let formData = new FormData();
            formData.append("name", this.form.name);
            formData.append("description", this.form.description);
            formData.append("date", this.form.date);
            formData.append("location", this.form.location);
            formData.append("address", this.form.address);
            formData.append("image", this.$refs.image.files[0]);

            axios
                .post("/admin/dashboard/events/add", formData)
                .then((response) => {
                    console.log("Event created successfully!");
                    this.$inertia.visit("/admin/dashboard/events");
                    this.createRoom(response.data.event.id);
                })
                .catch((error) => {
                    if (error.response) {
                        console.error("Validation failed!");
                        console.log(error.response.data.errors);
                    }
                });
        },
        createRoom(eventId) {
            let formDataRoom = new FormData();
            formDataRoom.append("name", this.form.name);
            formDataRoom.append("image", this.$refs.image.files[0]);
            formDataRoom.append("date", this.form.date);

            axios
                .post(`/admin/dashboard/rooms/add`, formDataRoom)
                .then((response) => {
                    console.log("Room created successfully!");
                })
                .catch((error) => {
                    if (error.response) {
                        console.error("Validation failed!");
                        console.log(error.response.data.errors);
                    }
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
            <input id="image" type="file" ref="image" />
        </div>
        <div>
            <button type="submit">Créer</button>
        </div>
    </form>
</template>
