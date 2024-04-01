<script>
import axios from "axios";
import { VueSignaturePad } from "vue-signature-pad";

export default {
    components: {
        VueSignaturePad,
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
    <form @submit.prevent="submitFormAdd" enctype="multipart/form-data">
        <div>
            <label for="name">Nom</label>
            <input
                id="name"
                type="text"
                v-model="form.name"
                required
                autofocus
            />
        </div>
        <div>
            <label for="surname">Prénom</label>
            <input id="surname" type="text" v-model="form.surname" required />
        </div>
        <div>
            <label for="birth">Date de naissance</label>
            <input id="birth" type="date" v-model="form.birth" required />
        </div>
        <div>
            <label for="address">Adresse</label>
            <input id="address" type="text" v-model="form.address" required />
        </div>
        <div>
            <label for="city">Ville</label>
            <input id="city" type="text" v-model="form.city" required />
        </div>
        <div>
            <label for="phone">Téléphone</label>
            <input id="phone" type="tel" v-model="form.phone" required />
        </div>
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
        <div>
            <label for="email">Adresse Email</label>
            <input id="email" type="email" v-model="form.email" required />
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input
                id="password"
                type="password"
                v-model="form.password"
                required
            />
        </div>
        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input
                id="password_confirmation"
                type="password"
                v-model="form.password_confirmation"
                required
            />
        </div>
        <div>
            <label for="domicile_certificate">Certificat de domicile :</label>
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
        <label for="role">Role</label>
        <select id="role" v-model="form.role" required>
            <option value="invited">invited</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
        <div>
            <button type="submit">S'inscrire</button>
        </div>
    </form>
</template>
