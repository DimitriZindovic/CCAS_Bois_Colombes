<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const nameInput = ref(null);
const emailInput = ref(null);

const user = usePage().props.auth.user;

const form = useForm({
    name: user.name,
    email: user.email,
});

const updateProfile = () => {
    form.patch(route("profile.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.name) {
                form.reset("name");
                nameInput.value.focus();
            }
            if (form.errors.email) {
                form.reset("email");
                emailInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2>Informations du profil</h2>

            <p>
                Mettez à jour les informations de profil et l'adresse e-mail de
                votre compte.
            </p>
        </header>

        <form @submit.prevent="updateProfile">
            <div>
                <label for="name">Nom</label>

                <input
                    id="name"
                    ref="nameInput"
                    v-model="form.name"
                    type="text"
                    required
                    autofocus
                    autocomplete="name"
                    class="text-input"
                />

                <p v-if="form.errors.name" class="input-error">
                    {{ form.errors.name }}
                </p>
            </div>

            <div>
                <label for="email">Email</label>

                <input
                    id="email"
                    ref="emailInput"
                    v-model="form.email"
                    type="email"
                    required
                    autocomplete="username"
                    class="text-input"
                />

                <p v-if="form.errors.email" class="input-error">
                    {{ form.errors.email }}
                </p>
            </div>

            <div>
                <button :disabled="form.processing" class="primary-button">
                    Enregistrer
                </button>

                <transition>
                    <p v-if="form.recentlySuccessful">Enregistré.</p>
                </transition>
            </div>
        </form>
    </section>
</template>

<style scoped lang="scss">
section {
    header {
        h2 {
            font-size: 2em;
            color: #333;
        }

        p {
            margin-top: 1.5em;
            color: #666;
        }
    }

    form {
        div {
            margin-top: 1.5em;

            .text-input {
                display: block;
                width: 100%;
                padding: 1em;
                border: 2px solid #ccc;
                border-radius: 6px;
            }

            .input-error {
                color: #f00;
                font-size: 1.2em;
            }
        }

        .primary-button {
            padding: 0.5em 1em;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;

            &:disabled {
                opacity: 0.5;
                cursor: not-allowed;
            }
        }
    }
}
</style>
