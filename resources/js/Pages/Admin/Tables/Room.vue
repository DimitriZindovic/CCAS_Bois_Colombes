<script>
import axios from "axios";
import NavbarAdmin from "../../../Components/NavbarAdmin.vue";

export default {
    props: ["rooms"],
    components: {
        NavbarAdmin,
    },
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
    <h2>Salles</h2>
    <div class="container">
        <NavbarAdmin />
        <div class="listRoom">
            <div class="allRooms">
                <div v-for="room in rooms" :key="room.id" class="rooms">
                    <p>{{ room.name }}</p>
                    <a :href="route('roomChat', { room: room.id })"
                        >Voir chat</a
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
.container {
    display: flex;
    width: 100vw;
}

h2 {
    font-size: 2em;
    color: #333;
    padding: 1rem;
    border-bottom: 1px solid rgb(182, 182, 182);
}

a {
    color: white;
    text-decoration: none;
    font-size: 1.2em;
    padding: 10px;
    border-radius: 5px;
    background-color: #ff801f;
    transition: 0.3s;
    &:hover {
        background-color: #ff801f;
    }
}

div {
    & > p {
        margin-bottom: 5px;
        font-size: 1.2em;
        color: #333;
    }

    .listRoom {
        display: flex;
        flex-direction: column;
        margin-top: 2rem;
        gap: 1rem;
        margin-inline: 2rem;
        width: 100%;
    }

    .allRooms {
        width: 100%;

        .rooms {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        & > * {
            max-width: 100%;
            overflow: auto;
        }
    }
}
</style>
