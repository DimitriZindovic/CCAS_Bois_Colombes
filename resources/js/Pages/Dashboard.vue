<script>
import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

export default {
    props: ["events", "user"],
    components: {
        AuthenticatedLayout,
        Head,
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
            this.$inertia.visit(`/rooms/${roomId}`);
        },
    },
    mounted() {
        this.currentURL = new URL(window.location.href).origin;
    },
};
</script>
<template>
    <body>
        <AuthenticatedLayout>
            <h2>Bienvenue, {{ user.name }}</h2>
            <h3>Vos sorties</h3>
            <div class="container">
                <div class="listEvent">
                    <div class="events" v-for="event in events" :key="event.id">
                        <img
                            :src="currentURL + '/storage/' + event.image"
                            alt="event image"
                        />
                        <div class="content">
                            <h3 class="event-item">{{ event.name }}</h3>
                            <p class="event-item">
                                {{ formatDate(event.date) }}
                            </p>
                            <p class="event-item">{{ event.description }}</p>
                            <p class="event-item">{{ event.location }}</p>
                            <p class="event-item">{{ event.address }}</p>
                            <button
                                class="btn-event"
                                @click="visitRoom(event.room?.id)"
                            >
                                Rejoindre l'évènement
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </body>
</template>
<style scoped lang="scss">
body {
    padding-inline: 9.47%;

    h2 {
        margin: 20px 0;
        font-size: 2em;
    }

    h3 {
        margin: 20px 0;
        font-size: 1.5em;
    }
}

.listEvent {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));

    .events {
        flex-direction: column;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        margin: 10px;

        img {
            width: 100%;
            object-fit: cover;
        }

        .content {
            padding: 10px;
        }

        .event-item {
            margin: 5px 0;
        }

        .btn-event {
            background-color: #1f266b;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;

            &:hover {
                background-color: #2d3899;
            }
        }
    }
}
</style>
