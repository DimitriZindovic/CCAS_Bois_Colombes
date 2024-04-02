<script setup>
import { useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const passwordInput = ref(null);

const form = useForm({
    password: "",
});

const deleteUser = () => {
    form.delete(route("profile.destroy"), {
        preserveScroll: true,
        onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <section>
        <header>
            <h2>Supprimer le compte</h2>

            <p>
                Une fois votre compte supprimé, toutes ses ressources et données
                seront définitivement supprimées. Avant de supprimer votre
                compte, veuillez télécharger toutes les données ou informations
                que vous souhaitez conserver.
            </p>
        </header>

        <div>
            <h2>Êtes-vous sûr de vouloir supprimer votre compte ?</h2>

            <p>
                Une fois votre compte supprimé, toutes ses ressources et données
                seront définitivement supprimées. Veuillez entrer votre mot de
                passe pour confirmer que vous souhaitez supprimer définitivement
                votre compte.
            </p>

            <div>
                <label for="password">Mot de passe</label>

                <input
                    id="password"
                    ref="passwordInput"
                    v-model="form.password"
                    type="password"
                    placeholder="Mot de passe"
                    @keyup.enter="deleteUser"
                    class="text-input"
                />

                <p v-if="form.errors.password" class="input-error">
                    Veuillez entrer votre mot de passe.
                </p>
            </div>

            <div>
                <button
                    class="danger-button"
                    :disabled="form.processing"
                    @click="deleteUser"
                >
                    Supprimer le compte
                </button>
            </div>
        </div>
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

    .danger-button {
        padding: 0.5em 1em;
        background-color: #f00;
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

    div {
        margin-top: 3em;

        h2 {
            font-size: 1.6em;
            color: #333;
        }

        p {
            margin-top: 1.5em;
            color: #666;
        }

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
    }
}
</style>
