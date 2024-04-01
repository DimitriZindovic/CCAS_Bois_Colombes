<script>
import axios from "axios";

export default {
    props: ["events"],
    methods: {
        formatDate(date) {
            return new Date(date).toLocaleDateString();
        },
        visitRoom(roomId) {
            this.$inertia.visit(`/admin/dashboard/rooms/${roomId}`);
        },
        deleteEvent(eventId) {
            axios
                .delete(`/admin/dashboard/events/${eventId}`)
                .then(() => {
                    this.$inertia.visit("/admin/dashboard/events");
                    this.events = this.events.filter(
                        (event) => event.id !== eventId
                    );
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        updateEvent(eventId) {
            this.$inertia.visit(`/admin/dashboard/events/update/${eventId}`);
        },
    },
};
</script>
<template>
    <div class="listEvent">
        <h2>Évènements :</h2>
        <a :href="route('addEvent')">Ajouter</a>
        <div class="allEvents">
            <div v-for="event in events" :key="event.id" class="events">
                <p>Nom : {{ event.name }}</p>
                <p>Description : {{ event.description }}</p>
                <p>Date : {{ formatDate(event.date) }}</p>
                <p>Ville : {{ event.location }}</p>
                <p>Adresse : {{ event.address }}</p>
                <!-- <img :src="event.image" alt="event image" /> -->
                <button @click="visitRoom(event.room.id)">
                    Rejoindre l'évènement <strong>{{ event.room.name }}</strong>
                </button>
                <button @click="deleteEvent(event.id)">
                    Supprimer l'évènement
                </button>
                <button @click="updateEvent(event.id)">
                    Mettre à jour l'événement
                </button>
            </div>
        </div>
    </div>
</template>
