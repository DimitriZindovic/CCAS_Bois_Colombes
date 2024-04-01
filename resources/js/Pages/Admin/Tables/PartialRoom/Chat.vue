<template>
    <div>
        <h2>Messages :</h2>
        <div v-for="chat in chats" :key="chat.id">
            <p>{{ chat.user.name }}: {{ chat.message }}</p>
            <p>{{ chat.created_at }}</p>
            <button @click="deleteMessage(chat)">Supprimer</button>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    props: {
        room: Object,
        chats: Array,
    },
    methods: {
        deleteMessage(chat) {
            axios
                .delete(
                    `/admin/dashboard/rooms/${this.room.id}/chats/${chat.id}`
                )
                .then(() => {
                    this.$inertia.visit(
                        `/admin/dashboard/rooms/${this.room.id}`
                    );
                    this.chats = this.chats.filter((c) => c.id !== chat.id);
                });
        },
    },
};
</script>
