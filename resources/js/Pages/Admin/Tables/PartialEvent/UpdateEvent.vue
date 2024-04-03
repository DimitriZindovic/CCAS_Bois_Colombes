<script>
import axios from "axios";
import NavbarAdmin from "../../../../Components/NavbarAdmin.vue";

export default {
    props: ["event"],
    components: {
        NavbarAdmin,
    },
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
    <div class="container">
        <h1>Modification événement</h1>
        <div class="content">
            <NavbarAdmin />
            <form
                @submit.prevent="updateEvent"
                enctype="multipart/form-data"
                class="user-form"
            >
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
                <input id="image" type="file" ref="image" />
                <div>
                    <button type="submit" class="btn-update">Editer</button>
                </div>
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
