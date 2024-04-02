<script>
import axios from "axios";
import NavbarAdmin from "../../../../Components/NavbarAdmin.vue";

export default {
    props: {
        room: Object,
        chats: Array,
    },
    components: {
        NavbarAdmin,
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
<template>
    <h2>Messages</h2>
    <div class="container">
        <nav>
            <NavbarAdmin />
        </nav>
        <div>
            <div class="chat" v-for="chat in chats" :key="chat.id">
                <p class="chat-item">
                    {{ chat.user.name }}: {{ chat.message }}
                </p>
                <p class="chat-item">{{ chat.created_at }}</p>
                <button class="btn-delete" @click="deleteMessage(chat)">
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

div {
    width: 100%;

    & > p {
        margin-bottom: 5px;
        font-size: 1.2em;
        color: #333;
    }

    .chat {
        display: flex;
        align-items: center;
        background-color: #fff;
        justify-content: space-around;
        padding: 20px;
        border-radius: 5px;
        gap: 10px;
        max-width: 100%;
        overflow: auto;

        .chat-item {
            max-width: calc(100% / 3 - 10px);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        & > * {
            max-width: 100%;
            overflow: auto;
        }
    }

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

        &:hover {
            background-color: #c82333;
        }
    }
}
</style>
