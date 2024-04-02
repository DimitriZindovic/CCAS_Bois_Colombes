<script>
export default {
    props: {
        room: Object,
        chats: Array,
    },
    methods: {
        goBack() {
            this.$inertia.visit("/events");
        },
        submitMessage() {
            this.$inertia.post(route("chats.store", { room: this.room.id }), {
                message: this.newMessage,
                // room_id: this.room.id,
            });
        },
    },
    data() {
        return {
            newMessage: "",
        };
    },
};
</script>
<template>
    <div>
        <button @click="goBack">Retour</button>
        <h1>Événement associé :</h1>
        <p v-if="room.event">Nom : {{ room.event.name }}</p>
        <p v-if="room.event">Description : {{ room.event.description }}</p>
        <p v-if="room.event">Date : {{ room.event.date }}</p>
        <!-- autres détails de l'événement ici -->
    </div>
    <form @submit.prevent="submitMessage">
        <input v-model="newMessage" type="text" placeholder="Message..." />
        <button type="submit">Envoyer</button>
    </form>
    <div>
        <h2>Messages :</h2>
        <div v-for="chat in chats" :key="chat.id">
            <p>{{ chat.user.name }}: {{ chat.message }}</p>
            <p>{{ chat.created_at }}</p>
        </div>
    </div>
</template>
