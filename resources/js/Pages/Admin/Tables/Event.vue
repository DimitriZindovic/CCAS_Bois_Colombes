<script>
import axios from "axios";
import NavbarAdmin from "../../../Components/NavbarAdmin.vue";

export default {
    props: ["events"],
    components: {
        NavbarAdmin,
    },
    data() {
        return {
            currentURL: "",
        };
    },
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
        addEvent() {
            this.$inertia.visit("/admin/dashboard/events/add");
        },
    },
    mounted() {
        this.currentURL = new URL(window.location.href).origin;
    },
};
</script>
<template>
    <h2>Évènements</h2>
    <div class="container">
        <NavbarAdmin />
        <div class="listEvent">
            <button class="btn-add" @click="addEvent()">Ajouter</button>
            <div class="events" v-for="event in events" :key="event.id">
                <p class="event-item">{{ event.name }}</p>
                <p class="event-item">{{ event.description }}</p>
                <p class="event-item">{{ formatDate(event.date) }}</p>
                <p class="event-item">{{ event.location }}</p>
                <p class="event-item">{{ event.address }}</p>
                <img
                    :src="currentURL + '/storage/' + event.image"
                    alt="event image"
                />
                <button class="btn-event" @click="visitRoom(event.room?.id)">
                    Rejoindre l'évènement
                </button>
                <button class="btn-edit" @click="updateEvent(event.id)">
                    Éditer
                </button>
                <button class="btn-delete" @click="deleteEvent(event.id)">
                    Supprimer
                </button>
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

button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 4px;

    &:hover {
        background-color: #c82333;
    }
}

img {
    max-width: 100%;
    height: 50px;
}

div {
    & > p {
        margin-bottom: 5px;
        font-size: 1.2em;
        color: #333;
    }

    .listEvent {
        width: 100%;
    }

    .events {
        display: flex;
        align-items: center;
        background-color: #fff;
        justify-content: space-around;
        padding: 20px;
        border-radius: 5px;
        gap: 10px;
        max-width: 100%;
        overflow: auto;

        .event-item {
            max-width: calc(100% / 9 - 10px);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        & > * {
            max-width: 100%;
            overflow: auto;
        }
    }

    .btn-add,
    .btn-event,
    .btn-edit,
    .btn-delete {
        color: white;
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
    }

    .btn-add {
        background-color: #007bff;
        margin-top: 2rem;
        margin-left: 2rem;

        &:hover {
            background-color: #0056b3;
        }
    }

    .btn-event {
        background-color: #28a745;

        &:hover {
            background-color: #218838;
        }
    }

    .btn-edit {
        background-color: #ffc107;

        &:hover {
            background-color: #e0a800;
        }
    }

    .btn-delete {
        background-color: #dc3545;

        &:hover {
            background-color: #c82333;
        }
    }
}
</style>
