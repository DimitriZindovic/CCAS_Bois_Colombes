<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <h1>Admin</h1>
    <nav>
        <Link :href="route('user')">Utilisateurs</Link>
        <Link :href="route('events')">Évènements</Link>
        <Link :href="route('chatRooms')">Salles</Link>
    </nav>
</template>
