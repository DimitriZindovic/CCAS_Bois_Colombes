<script>
import axios from "axios";

export default {
    props: ["rooms"],
    methods: {
        deleteRoom(room) {
            if (
                confirm(
                    `Voulez-vous vraiment supprimer l'évènement ${room.name} ?`
                )
            ) {
                axios
                    .delete(`/admin/dashboard/rooms/${room.id}`)
                    .then((response) => {
                        this.$inertia.visit("/admin/dashboard/rooms");
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>
<template>
    <div class="listRoom">
        <h2>Salles :</h2>
        <div class="allRooms">
            <div v-for="room in rooms" :key="room.id" class="rooms">
                <p>Nom : {{ room.name }}</p>
                <!-- <img :src="room.image" alt="room image" /> -->
                <a :href="route('roomChat', { room: room.id })">Voir chat</a>
            </div>
        </div>
    </div>
</template>
