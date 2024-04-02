<script setup>
import { ref } from "vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <div>
            <nav>
                <!-- Responsive Navigation Menu -->
                <div>
                    <div>
                        <ResponsiveNavLink
                            :href="route('dashboard')"
                            :active="route().current('dashboard')"
                        >
                            Compte
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div>
                        <div>
                            <ResponsiveNavLink :href="route('profile.edit')">
                                Profile
                            </ResponsiveNavLink>
                            <ResponsiveNavLink
                                :href="route('logout')"
                                method="post"
                                as="button"
                            >
                                Déconnexion
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header">
                <div>
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
<style scoped lang="scss">
nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background-color: #89baad;
    border-bottom: 1px solid #e2e8f0;
    margin-block: 2.5%;

    div {
        display: flex;
        align-items: center;
    }

    a {
        color: white;
        padding: 0.5rem 1rem;
        font-weight: 700;
        text-decoration: none;
        border-radius: 0.375rem;
    }

    button {
        color: white;
        padding: 0.5rem 1rem;
        font-weight: 700;
        text-decoration: none;
        border-radius: 0.375rem;
        background-color: #fbba00;
        border: 1px solid #fbba00;

        &:hover {
            background-color: #f6ad55;
            border-color: #f6ad55;
        }
    }
}
</style>
