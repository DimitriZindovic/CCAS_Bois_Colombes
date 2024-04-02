<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import DeleteUserForm from "./Partials/DeleteUserForm.vue";
import UpdatePasswordForm from "./Partials/UpdatePasswordForm.vue";
import UpdateProfileInformationForm from "./Partials/UpdateProfileInformationForm.vue";
import { Head } from "@inertiajs/vue3";

defineProps({
    mustVerifyEmail: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});
</script>

<template>
    <Head title="Profile" />

    <body>
        <AuthenticatedLayout>
            <template #header>
                <h2>Informations personnelles</h2>
            </template>

            <div>
                <div>
                    <div class="component-container">
                        <UpdateProfileInformationForm
                            :must-verify-email="mustVerifyEmail"
                            :status="status"
                        />
                    </div>

                    <div class="component-container">
                        <UpdatePasswordForm />
                    </div>

                    <div class="component-container">
                        <DeleteUserForm />
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    </body>
</template>

<style scoped lang="scss">
body {
    padding-inline: 9.47%;
}

h2 {
    font-size: 2.5em;
    margin-block: 50px;
}

.component-container {
    margin-bottom: 50px;
}
</style>
