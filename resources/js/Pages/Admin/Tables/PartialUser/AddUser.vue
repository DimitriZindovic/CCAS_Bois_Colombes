<script>
import axios from "axios";
import { VueSignaturePad } from "vue-signature-pad";
import NavbarAdmin from "../../../../Components/NavbarAdmin.vue";

export default {
    components: {
        VueSignaturePad,
        NavbarAdmin,
    },
    data() {
        return {
            form: {
                name: "",
                surname: "",
                birth: "",
                address: "",
                city: "",
                phone: "",
                card_identity: "",
                domicile_certificate: "",
                signature: "",
                email: "",
                password: "",
                password_confirmation: "",
                role: "",
            },
        };
    },
    methods: {
        submitFormAdd() {
            let formData = new FormData();
            formData.append("name", this.form.name);
            formData.append("surname", this.form.surname);
            formData.append("birth", this.form.birth);
            formData.append("address", this.form.address);
            formData.append("city", this.form.city);
            formData.append("phone", this.form.phone);
            formData.append("card_identity", this.$refs.card_identity.files[0]);
            formData.append("email", this.form.email);
            formData.append("password", this.form.password);
            formData.append(
                "password_confirmation",
                this.form.password_confirmation
            );
            formData.append(
                "domicile_certificate",
                this.$refs.domicile_certificate.files[0]
            );
            formData.append("signature", this.$refs.signature.saveSignature());
            formData.append("role", this.form.role);

            axios
                .post("/admin/dashboard/users/add", formData)
                .then((response) => {
                    console.log("User added successfully!");
                    this.$inertia.visit("/admin/dashboard/users");
                })
                .catch((error) => {
                    if (error.response) {
                        console.error("Validation failed!");
                        console.log(error.response.data.errors);
                    }
                });
        },
    },
};
</script>
<template>
    <div class="container">
        <h1>Ajouter un utilisateur</h1>
        <div class="content">
            <NavbarAdmin />
            <form
                @submit.prevent="submitFormAdd"
                enctype="multipart/form-data"
                class="user-form"
            >
                <label for="name">Nom</label>
                <input
                    id="name"
                    type="text"
                    v-model="form.name"
                    required
                    autofocus
                />
                <label for="surname">Prénom</label>
                <input
                    id="surname"
                    type="text"
                    v-model="form.surname"
                    required
                />
                <label for="birth">Date de naissance</label>
                <input id="birth" type="date" v-model="form.birth" required />
                <label for="address">Adresse</label>
                <input
                    id="address"
                    type="text"
                    v-model="form.address"
                    required
                />
                <label for="city">Ville</label>
                <input id="city" type="text" v-model="form.city" required />
                <label for="phone">Téléphone</label>
                <input id="phone" type="tel" v-model="form.phone" required />
                <div>
                    <label for="card_identity">Identité de carte</label>
                    <input
                        type="file"
                        id="card_identity"
                        name="card_identity"
                        accept=".pdf"
                        ref="card_identity"
                    />
                </div>
                <label for="email">Adresse Email</label>
                <input id="email" type="email" v-model="form.email" required />
                <label for="password">Mot de passe</label>
                <input
                    id="password"
                    type="password"
                    v-model="form.password"
                    required
                />
                <label for="password_confirmation"
                    >Confirmer le mot de passe</label
                >
                <input
                    id="password_confirmation"
                    type="password"
                    v-model="form.password_confirmation"
                    required
                />
                <div>
                    <label for="domicile_certificate"
                        >Certificat de domicile :</label
                    >
                    <input
                        type="file"
                        id="domicile_certificate"
                        ref="domicile_certificate"
                        required
                    />
                </div>
                <div>
                    <label for="signature">Signature :</label>
                    <vue-signature-pad
                        id="signature"
                        ref="signature"
                        required
                    ></vue-signature-pad>
                </div>
                <div>
                    <label for="role">Role</label>
                    <select id="role" v-model="form.role" required>
                        <option value="invited">invited</option>
                        <option value="admin">admin</option>
                        <option value="user">user</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn-update">S'inscrire</button>
                </div>
            </form>
        </div>
    </div>
</template>
<style scoped lang="scss">
.container {
    display: flex;
    flex-direction: column;
    h1 {
        font-size: 2em;
        color: #333;
        padding: 1rem;
        border-bottom: 1px solid rgb(182, 182, 182);
    }
    .content {
        display: flex;
    }
    .user-form {
        margin-top: 2rem;
        margin-inline: 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
        width: 100%;
        label {
            font-weight: bold;
        }
        input,
        select {
            padding: 0.5rem;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
    }
    .btn-update {
        color: white;
        background-color: #007bff;
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
            background-color: #0056b3;
        }
    }
}
</style>
