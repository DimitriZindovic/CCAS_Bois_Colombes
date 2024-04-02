<script>
import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";

export default {
    props: ["events"],
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
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">You're logged in!</div>
                </div>
            </div>
        </div>

        <h2>Évènements</h2>
        <div class="container">
            <div class="listEvent">
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
                    <button
                        class="btn-event"
                        @click="visitRoom(event.room?.id)"
                    >
                        Rejoindre l'évènement
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
