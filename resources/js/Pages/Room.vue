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
            const dateTime = new Date(date);
            return `${dateTime.toLocaleDateString()} ${dateTime.toLocaleTimeString(
                [],
                { hour: "2-digit", minute: "2-digit" }
            )}`;
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
    <div class="header">
        <button @click="goBack">Retour</button>
        <h1>Sortie : {{ room.name }}</h1>
    </div>
    <div class="chat-container">
        <div class="chat-messages">
            <div class="message" v-for="chat in chats" :key="chat.id">
                <p class="user-name">{{ chat.user.name }}</p>
                <p class="user-date">{{ formatDate(chat.created_at) }}</p>
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
                placeholder="Entrer votre message ici..."
            />
            <input
                id="image"
                type="file"
                ref="image"
                @change="form.image = $refs.image.files[0]"
            />
            <label for="image">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="icon icon-plus"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                    />
                </svg>
            </label>
            <button type="submit">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    class="icon"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                    />
                </svg>
            </button>
        </form>
    </div>
</template>
<style scoped lang="scss">
.header {
    display: flex;
    align-items: center;
    padding: 1em;
    background-color: #1f266b;
    color: white;

    h1 {
        padding-block: 1rem;
        margin-left: 5%;
    }

    button {
        padding: 0.5em 1em;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1em;

        &:hover {
            background-color: #0056b3;
        }
    }
}

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
        margin-bottom: 60px;

        .message {
            display: flex;
            flex-direction: column;
            gap: 0.5em;
            margin-inline: 9.47%;
            background-color: #dceae6;
            font-size: 1.2em;
            padding: 1em;
            border-radius: 4px;

            .user-name {
                font-weight: bold;
                font-size: 1.5em;
            }

            .user-date {
                font-size: 0.8em;
            }

            .message-text {
                line-height: 1.5;
            }

            img {
                max-width: 300px;
                max-height: 300px;
            }
        }
    }

    form {
        position: fixed;
        bottom: 0;
        width: 100%;
        display: flex;
        height: 70px;
        gap: 1em;
        padding: 1em 15em;
        background-color: #1f266b;

        button,
        label {
            display: flex;
            align-items: center;
            justify-content: center;

            .icon {
                height: 1.7em;
                width: 1.7em;

                &.icon-plus {
                    padding-bottom: 5px;
                }
            }
        }

        label {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            line-height: 0;
        }

        input[type="text"] {
            flex: 1;
            padding: 1em;
            border: 1px solid #ddd;
            border-radius: 4px;

            &::placeholder {
                font-size: 1.2em;
            }
        }

        input[type="file"] {
            display: none;
        }

        label {
            display: inline-block;
            padding: 0.5em 1em;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;

            &:hover {
                background-color: #0056b3;
            }
        }

        button {
            padding: 0em 1em;
            border: none;
            font-size: 1.1em;
            border-radius: 4px;
            background-color: #fbba00;
            color: white;
            cursor: pointer;

            &:hover {
                background-color: #f9a602;
            }
        }
    }
}

@media (max-width: 1000px) {
    .chat-container {
        .chat-messages {
            margin-bottom: 30px;
        }

        form {
            padding: 1em;
        }
    }
}
</style>
