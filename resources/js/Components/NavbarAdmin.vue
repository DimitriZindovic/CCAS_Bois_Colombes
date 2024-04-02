<script setup>
import { Link } from "@inertiajs/vue3";
</script>
<template>
    <nav>
        <Link :href="route('user')">Utilisateurs</Link>
        <Link :href="route('event')">Évènements</Link>
        <Link :href="route('chatRooms')">Salles</Link>
    </nav>
</template>
<style scoped lang="scss">
nav {
    display: flex;
    flex-direction: column;
    padding: 1rem;
    background-color: #eeeeee;
    border-radius: 5px;
    width: 300px;
    height: 100vh;

    a {
        text-decoration: none;
        color: #333;
        font-size: 1.2em;
        transition: color 0.3s ease;
        margin-top: 20px;

        &:hover {
            color: #007bff;
        }
    }
}
</style>
