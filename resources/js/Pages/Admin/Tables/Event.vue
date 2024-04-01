<script>
import axios from "axios";

export default {
    props: ["events"],
    methods: {
        formatDate(date) {
            return new Date(date).toLocaleDateString();
        },
        visitRoom(roomId) {
            this.$inertia.visit(`/rooms/${roomId}`);
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
            </div>
        </div>
    </div>
</template>
