<script>
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    props: {
        room: Object,
        chats: Array,
    },
    data() {
        return {
            form: useForm({
                message: "",
                image: null,
            }),
            currentURL: "",
            message: "",
        };
    },
    methods: {
        goBack() {
            this.$inertia.visit("/dashboard");
        },
        formatDate(date) {
            return new Date(date).toLocaleDateString();
        },
        submitForm() {
            console.log("submitForm has been called");
            console.log(this.form);
            this.$inertia.visit(window.location.href);
            this.form.post(route("chats.store", { room: this.room.id }), {
                preserveScroll: true,
                onSuccess: () => {
                    console.log("Message sent successfully!");
                    this.form.reset("message");
                    this.form.reset("image");
                },
            });
        },
    },
    mounted() {
        this.currentURL = new URL(window.location.href).origin;

        setInterval(() => {
            this.$inertia.visit(window.location.href, {
                preserveState: true,
                preserveScroll: true,
            });
        }, 1000);
    },
};
</script>
<template>
    <div>
        <button @click="goBack">Retour</button>
        <h1>Événement associé :</h1>
        <p v-if="room.event">Nom : {{ room.event.name }}</p>
        <p v-if="room.event">Description : {{ room.event.description }}</p>
        <p v-if="room.event">Date : {{ room.event.date }}</p>
    </div>
    <div class="chat-container">
        <div class="chat-messages">
            <div class="message" v-for="chat in chats" :key="chat.id">
                <p class="user-name">{{ chat.user.name }}</p>
                <p>{{ formatDate(chat.created_at) }}</p>
                <p class="message-text">{{ chat.message }}</p>
                <img
                    v-if="chat.image"
                    :src="currentURL + '/storage/' + chat.image"
                    alt="Image"
                />
            </div>
        </div>
        <form @submit.prevent="submitForm">
            <input
                type="text"
                v-model="form.message"
                placeholder="Type a message"
            />
            <input
                id="image"
                type="file"
                ref="image"
                @change="form.image = $refs.image.files[0]"
            />
            <button type="submit">Submit</button>
        </form>
    </div>
</template>
<style scoped lang="scss">
.chat-container {
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: space-between;

    .chat-messages {
        overflow-y: auto;
        flex: 1;
        padding: 1em;
        display: flex;
        flex-direction: column;
        gap: 1em;

        .message {
            display: flex;
            flex-direction: column;
            gap: 0.5em;

            .user-name {
                font-weight: bold;
            }

            .message-text {
                line-height: 1.5;
            }

            img {
                max-width: 200px;
                max-height: 200px;
            }
        }
    }

    form {
        display: flex;
        gap: 1em;
        padding: 1em;
        background-color: #f5f5f5;

        input[type="text"] {
            flex: 1;
            padding: 0.5em;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 0.5em 1em;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            cursor: pointer;

            &:hover {
                background-color: #0056b3;
            }
        }
    }
}
</style>
