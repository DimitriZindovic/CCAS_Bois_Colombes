<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title="Log in" />

    <div v-if="status">
        {{ status }}
    </div>

    <div class="form">
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError :message="form.errors.email" />
            </div>

            <div>
                <InputLabel for="password" value="Mot de passe" />

                <TextInput
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError :message="form.errors.password" />
            </div>

            <div>
                <label>
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span>Se souvenir de moi</span>
                </label>
            </div>

            <div class="login">
                <Link v-if="canResetPassword" :href="route('password.request')">
                    Mot de passe oublié ?
                </Link>

                <PrimaryButton
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Se connecter
                </PrimaryButton>
            </div>
        </form>
    </div>
</template>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@100&display=swap");

.form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 1rem;
    height: 100vh;

    font-size: 34px;
    font-family: "Open Sans", sans-serif;
    color: #000000;
    padding-bottom: 16px;

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 1rem;
        padding: 32px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.5);
        border-radius: 12px;
        font-size: 1.25rem;
        width: 25%;

        div {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            width: 100%;

            label {
                display: flex;
                gap: 0.5rem;
                align-items: center;
                font-size: 1.25rem;
            }

            input {
                padding: 0.5rem;
                font-size: 1.25rem;
                border: 1px solid #000000;
                border-radius: 4px;
            }
        }

        .login {
            gap: 2rem;
            text-align: center;

            button {
                background-color: #1f266b;
                color: #ffffff;
                border: none;
                border-radius: 4px;
                width: 100%;
                height: 50px;
                font-size: 1.25rem;
            }

            a {
                color: #1f266b;
                font-size: 1.25rem;
                text-decoration: none;
                margin-top: 1rem;
            }
        }

        InputLabel {
            font-size: 1.25rem;
        }
    }
}
</style>
