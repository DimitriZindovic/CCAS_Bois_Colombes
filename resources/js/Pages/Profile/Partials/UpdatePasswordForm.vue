<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: "",
    password: "",
    password_confirmation: "",
});

const updatePassword = () => {
    form.put(route("password.update"), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset("password", "password_confirmation");
                passwordInput.value.focus();
            }
            if (form.errors.current_password) {
                form.reset("current_password");
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>

<template>
    <section>
        <header>
            <h2>Mettre à jour le mot de passe</h2>

            <p>
                Assurez-vous que votre compte utilise un mot de passe long et
                aléatoire pour rester sécurisé.
            </p>
        </header>

        <form @submit.prevent="updatePassword">
            <div>
                <label for="current_password">Mot de passe actuel</label>

                <input
                    id="current_password"
                    ref="currentPasswordInput"
                    v-model="form.current_password"
                    type="password"
                    autocomplete="current-password"
                    class="text-input"
                />

                <p v-if="form.errors.current_password" class="input-error">
                    {{ form.errors.current_password }}
                </p>
            </div>

            <div>
                <label for="password">Nouveau mot de passe</label>

                <input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    autocomplete="new-password"
                    class="text-input"
                />

                <p v-if="form.errors.password" class="input-error">
                    {{ form.errors.password }}
                </p>
            </div>

            <div>
                <label for="password_confirmation"
                    >Confirmer le mot de passe</label
                >

                <input
                    id="password_confirmation"
                    v-model="form.password_confirmation"
                    type="password"
                    autocomplete="new-password"
                    class="text-input"
                />

                <p v-if="form.errors.password_confirmation" class="input-error">
                    {{ form.errors.password_confirmation }}
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
