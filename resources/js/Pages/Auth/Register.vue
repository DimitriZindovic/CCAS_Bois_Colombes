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
            },
        };
    },
    methods: {
        submitForm() {
            this.register();
        },
        saveSignature() {
            const signatureData = this.$refs.signature.saveSignature();
            if (signatureData.isEmpty) {
                alert("Veuillez fournir une signature.");
            } else {
                this.signature = signatureData.data;
            }

            axios
                .post("/path/to/api", {
                    signature: this.signature,
                })
                .then((response) => {
                    console.log(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        register() {
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

            axios
                .post("/register", formData)
                .then((response) => {
                    console.log("Inscription réussie !");
                    this.$inertia.visit("/login");
                })
                .catch((error) => {
                    if (error.response) {
                        console.error("Validation échouée !");
                        console.log(error.response.data.errors);
                    }
                });
        },
    },
};
</script>

<template>
    <hr class="hrHead" />
    <section class="imgActus">
        <img
            src="../../../assets/actus_bois_colombes.png"
            alt="Actualités de Bois-Colombes"
        />
    </section>

    <section class="seSignaler">
        <div class="ActusTitle">
            <img src="../../../assets/trait_texte.png" alt="" />
            <h1>Se signaler au CCAS</h1>
        </div>

        <hr class="hrActus" />

        <div class="inscription">
            <h2>Pourquoi s'inscrire au centre communal d'action social</h2>
            <div class="inscriTxt">
                <ul>
                    <li>
                        <a
                            >Pour participer à des activités socio-culturelles
                            et des sorties,</a
                        >
                    </li>
                    <li>
                        <a>pour bénéficier des festivités de fin d'année,</a>
                    </li>
                    <li><a>pour être contacté en cas de canicule,</a></li>
                    <li>
                        <a
                            >pour être accompagné en cas de difficultés
                            ponctuelles,</a
                        >
                    </li>
                    <li>
                        <a
                            >pour bénéficier de services d'aide au maintien à
                            domicile,</a
                        >
                    </li>
                    <li>
                        <a>pour exposer des difficlutés particulières ...</a>
                    </li>
                </ul>
                <img
                    src="../../../assets/signaler_img.png"
                    alt="Image centre"
                />
            </div>

            <div class="inscriTxt2">
                <h2>Comment s'inscrire au CCAS</h2>
                <div>
                    <p>
                        Toute personne de plus de 55 ans peut s'inscrire au
                        CCAS, en présentant :
                    </p>
                    <ul>
                        <li>le contrat d'accompagnement rempli et signé</li>
                        <li>une pière d'identité</li>
                        <li>un justificatif de domicile.</li>
                    </ul>
                </div>
            </div>
        </div>

        <section class="contrat">
            <div class="contratTitle">
                <h3>
                    Prenez connaissance des termes du contrat d'accompagnement
                </h3>
                <p>Contrat individuel d'accompagnement</p>
                <div class="download">
                    <hr class="hrDownload1" />
                    <button>Télécharger</button>
                    <hr class="hrDownload2" />
                </div>
            </div>

            <div class="method1">
                <h2>
                    Choisissez votre méthode préférée pour remplir le contrat :
                </h2>
                <div class="enLigne">
                    <h4>Inscription tout en ligne</h4>
                    <p>
                        En remplissant le formulaire ci-dessous. <br />
                        N'oubliez pas de joindre les pièces demandées et signez
                        le contrat.
                        <br /><br />
                        En cliquant sur "Envoyer", votre demande nous parvient
                        directement par mail, et vous est addressée en copie
                        (PDF en piède jointe).<br />
                        Le CCAS vous confirmera par retour de votre inscription.
                    </p>
                </div>
            </div>

            <div class="method2">
                <div class="mail">
                    <h4>Incription par mail</h4>
                    <p>
                        Vous avez téléchargé le contrat individuel
                        d'accompagnement pour le lire ? <br />
                        Et bien, remplissez-le maintenant !
                        <br /><br />
                        Envoyez-le par mail, accompagné des scans des pièces
                        demandées :
                        <br /><br />
                        • une pièce d'identité
                        <br />
                        • un justificatif de domicile.
                        <br /><br />
                    </p>

                    <div class="email">
                        <img src="../../../assets/mail.png" alt="" />
                        <p>ccas@bois-colombes.com</p>
                    </div>

                    <br /><br />
                    <p>
                        Le CCAS vous confirmera par retour de mail votre
                        inscription.
                    </p>
                </div>

                <div class="accueil">
                    <h4>En vous déplançant au CCAS</h4>
                    <h5>Espace Duflos - 79, rue Charles-Duflos</h5>
                    <p>
                        Présentez-vous à l'accueil du CCAS muni de votre pièce
                        d'identité et d'un justificatif de domicile.
                        <br /><br />
                        Un agent vous aidera à remplir le contrat.
                    </p>
                </div>
            </div>
        </section>

        <section class="form">
            <h2>Formulaire de demande d'inscription en ligne</h2>

            <div class="donnees">
                <h3>Informatisation de vos données personnelles</h3>
                <p>
                    Les informations receuillies sur ce formulaire sont
                    collectées par le CCAS (unique destinataire) pour la gestion
                    des inscriptions aux sorties et activités de loisir et/ou
                    contrat individuel d'accompagnement. La base légale du
                    traitement est l'intérêt public du Service Solidarité et
                    Autonomie. Les données sont conservées pendant la durée
                    d'inscription. Vous pouvez accéder aux données vous
                    concernant, les rectifier ou retirer votre consentement en
                    envoyant une demande au service (ccas@bois-colombes.com).
                </p>

                <form
                    @submit.prevent="submitForm"
                    enctype="multipart/form-data"
                >
                    <section class="section">
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
                            <input
                                id="surname"
                                type="text"
                                v-model="form.surname"
                                required
                            />
                        </div>

                        <div>
                            <label for="birth">Date de naissance</label>
                            <input
                                id="birth"
                                type="date"
                                v-model="form.birth"
                                required
                            />
                        </div>
                    </section>

                    <section class="section">
                        <div>
                            <label for="address">Adresse</label>
                            <input
                                id="address"
                                type="text"
                                v-model="form.address"
                                required
                            />
                        </div>

                        <div>
                            <label for="city">Ville</label>
                            <input
                                id="city"
                                type="text"
                                v-model="form.city"
                                required
                            />
                        </div>

                        <div>
                            <label for="phone">Téléphone</label>
                            <input
                                id="phone"
                                type="tel"
                                v-model="form.phone"
                                required
                            />
                        </div>
                    </section>

                    <section class="section">
                        <div>
                            <label for="email">Adresse Email</label>
                            <input
                                id="email"
                                type="email"
                                v-model="form.email"
                                required
                            />
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
                            <label for="password_confirmation"
                                >Confirmer le mot de passe</label
                            >
                            <input
                                id="password_confirmation"
                                type="password"
                                v-model="form.password_confirmation"
                                required
                            />
                        </div>
                    </section>

                    <section class="files">
                        <div>
                            <label for="card_identity">Carte d'identité</label>
                            <input
                                type="file"
                                id="card_identity"
                                name="card_identity"
                                accept=".pdf"
                                ref="card_identity"
                            />
                        </div>

                        <div>
                            <label for="domicile_certificate"
                                >Justificatif de domicile :</label
                            >
                            <input
                                type="file"
                                id="domicile_certificate"
                                ref="domicile_certificate"
                                required
                            />
                        </div>
                    </section>

                    <div class="sign">
                        <label for="signature">Signature :</label>
                        <vue-signature-pad
                            id="signature"
                            ref="signature"
                            required
                        ></vue-signature-pad>
                    </div>

                    <div>
                        <button type="submit">S'inscrire</button>
                    </div>
                </form>
            </div>
        </section>
    </section>

    <footer>
        <div class="footer">
            <section class="footer1">
                <div class="coordonnees">
                    <h2>Coordonnées</h2>
                    <ul>
                        <li>
                            <a>Direction de l'Action Sociale</a><br />Espace
                            Duflos
                        </li>
                        <li>
                            79, rue Charles-Duflos <br />
                            92270 Bois-Colombes
                        </li>
                        <li>01 41 19 83 05</li>
                        <li>ccas@bois-colombes.com</li>
                    </ul>
                </div>

                <div class="autre">
                    <h2>Les autres sites de la ville</h2>
                    <ul>
                        <li>Le mémorial numérique</li>
                        <li>L'espace famille (bois-co déclic)</li>
                        <li>Boiscoboutique.fr</li>
                        <li>Le portail médiatique</li>
                        <li>Entre Bois-colombiens</li>
                    </ul>
                </div>

                <div class="suivre">
                    <h2>Suivez-nous autrement</h2>
                    <ul>
                        <li>
                            Sur bois-co mobile <br />
                            La ville dans votre poche
                        </li>
                        <li>
                            Newsletter <br />
                            Recevez les informations par mail
                        </li>
                        <li>
                            Service SMS <br />
                            Recevez les alertes sur votre smartphone
                        </li>
                        <li>Sur les réseaux</li>
                    </ul>
                </div>
            </section>

            <section class="footer2">
                <div>
                    <ul>
                        <li><a>Politique de confidentialité de la ville</a></li>
                        <li><a>Informations légales et éditoriales</a></li>
                        <li><a>Accès webmail</a></li>
                    </ul>
                </div>
            </section>

            <section class="scroll"></section>
        </div>

        <ScrollToTop />
    </footer>
</template>

<style scoped lang="scss">
@import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap");

.hrHead {
    border-bottom: 3px solid #89baad;
}

/* BODY */

.imgActus {
    img {
        width: 100%;
    }
}

.seSignaler {
    display: flex;
    flex-direction: column;

    .ActusTitle {
        display: flex;
        justify-content: center;
        margin-top: 50px;
        margin-bottom: 25px;

        img {
            width: 18px;
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-family: "Raleway";
            font-size: 2rem;
            font-weight: bold;
            text-transform: uppercase;
        }
    }

    .hrActus {
        border: 2px solid #070707;
        margin-left: auto;
        margin-right: auto;
        width: 84%;
    }

    .inscription {
        display: flex;
        flex-direction: column;
        justify-content: center;
        height: 100vh;

        h2 {
            display: flex;
            font-family: "Raleway";
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            align-items: center;
            letter-spacing: 0.4px;
            margin-left: 210px;
        }

        .inscriTxt {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            width: 100%;
            gap: 16vw;
            height: 400px;

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Rubik", sans-serif;
                text-align: start;
                margin-top: 50px;
                font-size: 1.2rem;
                width: 340px;
                gap: 2px;

                li {
                    gap: 20px;
                    width: 330px;
                    line-height: 1.2;
                }

                li::marker {
                    color: rgb(2, 2, 2);
                }
            }

            img {
                height: 350px;
                float: right;
                margin-top: 5%;
            }
        }

        .inscriTxt2 {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            width: 100%;
            font-family: "Rubik", sans-serif;
            font-weight: 400;

            p {
                font-size: 1.2rem;
                text-align: start;
                margin-left: 210px;
                margin-top: 20px;
                font-family: "Rubik", sans-serif;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Rubik", sans-serif;
                text-align: start;
                font-size: 1.2rem;
                margin-left: 210px;
                margin-top: 20px;

                li {
                    gap: 20px;
                    line-height: 1.2;
                }

                li::marker {
                    color: rgb(2, 2, 2);
                }
            }
        }
    }

    .contrat {
        display: flex;
        flex-direction: column;
        height: 140vh;

        .contratTitle {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #1f266b;
            height: 30vh;
            gap: 20px;

            h3 {
                font-family: "Raleway";
                font-size: 1.3rem;
                font-weight: 700;
                text-transform: uppercase;
                align-items: center;
                color: white;
            }

            p {
                font-family: "Rubik", sans-serif;
                font-size: 1.2rem;
                color: white;
            }

            .download {
                display: flex;
                gap: 20px;

                .hrDownload1 {
                    border: 2px solid #fbba00;
                    rotate: 90deg;
                    margin-right: 20px;
                }

                button {
                    background-color: #fbba00;
                    color: black;
                    font-family: "Rubik", sans-serif;
                    font-size: 1.2rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 30px;
                    cursor: pointer;
                }

                .hrDownload2 {
                    border: 2px solid #fbba00;
                    rotate: 90deg;
                    margin-left: 20px;
                }
            }
        }

        .method1 {
            display: flex;
            flex-direction: column;
            margin-top: 20px;
            margin-bottom: 20px;

            h2 {
                display: flex;
                font-family: "Raleway";
                font-size: 1.5rem;
                font-weight: 700;
                text-transform: uppercase;
                letter-spacing: 0.4px;
                margin-bottom: 40px;
                justify-content: center;
            }

            .enLigne {
                display: flex;
                flex-direction: column;
                justify-content: center;
                margin-top: 20px;
                margin-bottom: 20px;
                margin-left: auto;
                margin-right: auto;
                background-color: rgb(225, 225, 225);
                border-radius: 10px;
                height: 30vh;
                width: 70%;

                h4 {
                    display: flex;
                    font-family: "Raleway";
                    margin-left: 60px;
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    margin-bottom: 20px;
                }

                p {
                    font-size: 1.2rem;
                    text-align: start;
                    margin-left: 60px;
                    font-family: "Rubik", sans-serif;
                }
            }
        }

        .method2 {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 15px;
            text-align: start;
            height: 60vh;
            margin-left: 15%;
            margin-right: 15%;

            .mail {
                display: flex;
                flex-direction: column;
                justify-content: center;
                background-color: #89baad;
                border-radius: 10px;
                width: 100%;
                height: 60vh;

                h4 {
                    font-family: "Raleway";
                    color: #1f266b;
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    margin-left: 1.3rem;
                    margin-bottom: 20px;
                }

                p {
                    font-size: 1.2rem;
                    text-align: start;
                    margin-left: 20px;
                    font-family: "Rubik", sans-serif;
                }

                .mail {
                    display: flex;
                    flex-direction: row;
                    align-items: center;
                    justify-content: flex-start;
                    width: 80%;
                    margin-left: 1vw;
                    height: 30px;

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 20px;
                        font-family: "Rubik", sans-serif;
                    }

                    img {
                        width: 4%;
                    }
                }
            }

            .accueil {
                display: flex;
                flex-direction: column;
                background-color: #89baad;
                border-radius: 10px;
                width: 100%;
                height: 60vh;

                h4 {
                    font-family: "Raleway";
                    color: #1f266b;
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    margin-left: 10px;
                    margin-top: 26px;
                    margin-bottom: 20px;
                }

                h5 {
                    font-family: "Raleway";
                    color: #1f266b;
                    font-size: 1.3rem;
                    font-weight: 700;
                    margin-left: 10px;
                    margin-bottom: 20px;
                }

                p {
                    font-size: 1.2rem;
                    text-align: start;
                    margin-left: 10px;
                    font-family: "Rubik", sans-serif;
                }
            }
        }
    }

    .form {
        /* SECTION FORMULAIRE */
        display: flex;
        flex-direction: column;
        margin-top: 40px;
        height: 140vh;

        h2 {
            /* FORMULAIRE DE DEMANDE D'INSCRIPTION EN LIGNE */
            font-family: "Raleway";
            font-size: 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            align-items: center;
            margin-left: 210px;
            margin-bottom: 30px;
        }

        .donnees {
            /* FORMULAIRE */
            display: flex;
            flex-direction: column;
            width: 80%;
            background-color: #ced6d4;
            margin-left: auto;
            margin-right: auto;
            border-radius: 30px;
            height: 128vh;

            h3 {
                /* INFORMATION DE VOS DONNÉES PERSONNELLES */
                font-family: "Raleway";
                font-size: 1.3rem;
                font-weight: 700;
                text-transform: uppercase;
                margin-left: 120px;
                margin-top: 20px;
            }

            p {
                font-size: 1.2rem;
                font-family: "Rubik", sans-serif;
                margin-top: 2%;
                margin-bottom: 2%;
                margin-left: 120px;
                width: 82%;
            }

            form {
                display: flex;
                flex-direction: column;
                margin-left: 120px;
                margin-right: 120px;
                gap: 20px;

                div {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;

                    label {
                        font-family: "Raleway";
                        font-size: 1.2rem;
                        font-weight: 700;
                    }

                    input {
                        font-family: "Rubik", sans-serif;
                        font-size: 1.2rem;
                        padding: 10px;
                        border-radius: 10px;
                        border: 1px solid #1f266b;
                    }

                    input[type="file"] {
                        padding: 10px;
                        border-radius: 10px;
                        border: 1px solid #1f266b;
                    }

                    button {
                        display: flex;
                        justify-content: center;
                        margin-left: auto;
                        margin-right: auto;
                        background-color: #fbba00;
                        color: black;
                        font-family: "Rubik", sans-serif;
                        font-size: 1.2rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        padding: 10px;
                        border: none;
                        width: 30%;
                        border-radius: 30px;
                        cursor: pointer;
                    }
                }

                .sign {
                    display: flex;
                    flex-direction: column;
                    gap: 10px;
                    background-color: white;
                    border-radius: 20px;

                    label {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-family: "Raleway";
                        font-size: 1.2rem;
                        font-weight: 700;
                        height: 50px;
                        background-color: #c2c2c5;
                        border-top-left-radius: 20px;
                        border-top-right-radius: 20px;
                    }
                }

                section {
                    display: grid;
                    grid-template-columns: 1fr 1fr 1fr;
                    gap: 20px;
                }
            }
        }
    }
}

/* FOOTER */

.footer {
    display: flex;
    flex-direction: column;

    .footer1 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        height: 45vh;
        background-color: #1f266b;
        color: #ffffff;
        font-size: 15px;

        .coordonnees {
            grid-column: 1 / 2;
            align-self: flex-start;
            justify-self: center;
            margin-top: 20px;

            h2 {
                font-size: 1.5rem;
                font-family: "Raleway";
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 15px;
                text-decoration: underline;
                text-decoration-color: #fbba00;
                text-decoration-thickness: 2px;
                text-underline-offset: 5px;
                margin-bottom: 20px;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Rubik", sans-serif;
                font-size: 1.2rem;
                gap: 30px;
                align-items: start;

                li {
                    gap: 20px;
                }

                li::marker {
                    color: rgb(251, 251, 251);
                }
            }
        }

        .autre {
            grid-column: 2 / 3;
            align-self: flex-start;
            justify-self: center;
            margin-top: 20px;

            h2 {
                font-size: 1.5rem;
                font-family: "Raleway";
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 15px;
                text-decoration: underline;
                text-decoration-color: #fbba00;
                text-decoration-thickness: 2px;
                text-underline-offset: 5px;
                margin-bottom: 20px;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Rubik", sans-serif;
                font-size: 1.2rem;
                gap: 30px;
                align-items: start;

                li::marker {
                    color: rgb(251, 251, 251);
                }
            }
        }

        .suivre {
            grid-column: 3 / 4;
            align-self: flex-start;
            justify-self: center;
            margin-top: 20px;

            h2 {
                font-size: 20px;
                font-family: "Raleway";
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 1.5rem;
                text-decoration: underline;
                text-decoration-color: #fbba00;
                text-decoration-thickness: 2px;
                text-underline-offset: 5px;
                margin-bottom: 20px;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Rubik", sans-serif;
                font-size: 1.2rem;
                gap: 30px;
                align-items: start;
                justify-content: center;

                li::marker {
                    color: rgb(251, 251, 251);
                }
            }
        }
    }

    .footer2 {
        height: 10vh;
        width: 100%;
        background-color: #89baad;
        font-size: 1.2rem;
        font-family: "Rubik", sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        color: #1f266b;

        div {
            display: flex;
            justify-content: center;
            align-items: center;
            justify-content: space-around;
            height: 100%;

            ul {
                display: flex;
                margin-left: 100px;
                margin-right: 100px;
                gap: 160px;

                li {
                    display: flex;
                    list-style: none;
                }
            }
        }
    }

    .scroll {
        height: 7.2vh;
    }
}

/* RESPONSIVE */

@media (max-width: 1024px) {
    .imgActus {
        display: flex;

        img {
            height: 407px;
        }
    }

    .seSignaler {
        display: flex;
        flex-direction: column;

        .ActusTitle {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 25px;

            img {
                width: 18px;
                margin-top: 10px;
            }

            h1 {
                /* TITRE se signaler au ccas */
                text-align: center;
                margin-top: 15px;
                font-family: "Raleway";
                font-size: 2rem;
                font-weight: bold;
                text-transform: uppercase;
            }
        }

        .hrActus {
            border: 2px solid #070707;
            margin-left: auto;
            margin-right: auto;
            width: 84%;
        }

        .inscription {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;

            h2 {
                display: flex;
                justify-content: center;
                font-family: "Raleway";
                font-size: 1.5rem;
                font-weight: 700;
                text-transform: uppercase;
                align-items: center;
                letter-spacing: 0.4px;
                margin-left: 0px;
            }

            .inscriTxt {
                display: flex;
                align-items: center;
                justify-content: center;
                width: 100%;
                gap: 5vw;
                height: 400px;
                margin-top: 0px;

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    text-align: start;
                    margin-top: 0px;
                    font-size: 1.2rem;
                    width: 340px;
                    gap: 2px;

                    li {
                        gap: 20px;
                        width: 330px;
                        line-height: 1.2;
                    }

                    li::marker {
                        color: rgb(2, 2, 2);
                    }
                }

                img {
                    height: 250px;
                    float: right;
                    margin-top: 0%;
                }
            }

            .inscriTxt2 {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
                width: 100%;
                font-family: "Rubik", sans-serif;
                font-weight: 400;

                p {
                    font-size: 1.2rem;
                    text-align: start;
                    margin-left: 120px;
                    margin-top: 20px;
                    font-family: "Rubik", sans-serif;
                }

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    text-align: start;
                    font-size: 1.2rem;
                    margin-left: 120px;
                    margin-top: 20px;

                    li {
                        gap: 20px;
                        line-height: 1.2;
                    }

                    li::marker {
                        color: rgb(2, 2, 2);
                    }
                }
            }
        }

        .contrat {
            display: flex;
            flex-direction: column;
            height: 150vh;
            justify-content: center;

            .contratTitle {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #1f266b;
                height: 30vh;
                gap: 20px;

                h3 {
                    font-family: "Raleway";
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    align-items: center;
                    color: white;
                }

                p {
                    font-family: "Rubik", sans-serif;
                    font-size: 1.2rem;
                    color: white;
                }

                .download {
                    display: flex;
                    gap: 20px;

                    .hrDownload1 {
                        border: 2px solid #fbba00;
                        rotate: 90deg;
                        margin-right: 20px;
                    }

                    button {
                        background-color: #fbba00;
                        color: black;
                        font-family: "Rubik", sans-serif;
                        font-size: 1.2rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 30px;
                        cursor: pointer;
                    }

                    .hrDownload2 {
                        border: 2px solid #fbba00;
                        rotate: 90deg;
                        margin-left: 20px;
                    }
                }
            }

            .method1 {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
                margin-bottom: 20px;

                h2 {
                    display: flex;
                    font-family: "Raleway";
                    font-size: 1.5rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.4px;
                    margin-bottom: 40px;
                    justify-content: center;
                }

                .enLigne {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    margin-left: auto;
                    margin-right: auto;
                    background-color: rgb(225, 225, 225);
                    border-radius: 10px;
                    height: 30vh;
                    width: 70%;

                    h4 {
                        display: flex;
                        font-family: "Raleway";
                        margin-left: 30px;
                        font-size: 1.3rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        margin-bottom: 20px;
                    }

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 30px;
                        font-family: "Rubik", sans-serif;
                    }
                }
            }

            .method2 {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 15px;
                text-align: start;
                height: 60vh;
                margin-left: 15%;
                margin-right: 15%;

                .mail {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    background-color: #89baad;
                    border-radius: 10px;
                    width: 100%;
                    height: 60vh;

                    h4 {
                        font-family: "Raleway";
                        color: #1f266b;
                        font-size: 1.3rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        margin-left: 1.3rem;
                        margin-bottom: 20px;
                    }

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 20px;
                        width: 95%;
                        font-family: "Rubik", sans-serif;
                    }

                    .email {
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        justify-content: flex-start;
                        width: 80%;
                        margin-left: 1.4vw;
                        height: 30px;

                        p {
                            font-size: 1.2rem;
                            text-align: start;
                            margin-left: 20px;
                            font-family: "Rubik", sans-serif;
                        }

                        img {
                            width: 8%;
                        }
                    }
                }

                .accueil {
                    display: flex;
                    flex-direction: column;
                    background-color: #89baad;
                    border-radius: 10px;
                    width: 100%;
                    height: 60vh;

                    h4 {
                        font-family: "Raleway";
                        color: #1f266b;
                        font-size: 1.3rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        margin-left: 10px;
                        margin-top: 18px;
                        margin-bottom: 20px;
                    }

                    h5 {
                        font-family: "Raleway";
                        color: #1f266b;
                        font-size: 1.3rem;
                        font-weight: 700;
                        margin-left: 10px;
                        margin-bottom: 20px;
                    }

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 10px;
                        font-family: "Rubik", sans-serif;
                    }
                }
            }
        }

        .form {
            /* SECTION FORMULAIRE */
            display: flex;
            flex-direction: column;
            margin-top: 40px;
            height: 135vh;

            h2 {
                /* FORMULAIRE DE DEMANDE D'INSCRIPTION EN LIGNE */
                display: flex;
                justify-content: center;
                font-family: "Raleway";
                font-size: 1.5rem;
                font-weight: 700;
                text-transform: uppercase;
                align-items: center;
                margin-left: 0px;
                margin-bottom: 30px;
            }

            .donnees {
                /* FORMULAIRE */
                display: flex;
                flex-direction: column;
                width: 85%;
                background-color: #ced6d4;
                margin-left: auto;
                margin-right: auto;
                border-radius: 30px;
                height: 100vh;

                h3 {
                    /* INFORMATION DE VOS DONNÉES PERSONNELLES */
                    display: flex;
                    justify-content: center;
                    font-family: "Raleway";
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    margin-left: 0px;
                    margin-top: 20px;
                }

                p {
                    font-size: 1.2rem;
                    font-family: "Rubik", sans-serif;
                    margin-top: 2%;
                    margin-bottom: 2%;
                    margin-left: 60px;
                    width: 82%;
                }

                form {
                    display: flex;
                    flex-direction: column;
                    margin-left: auto;
                    margin-right: 0px;
                    gap: 20px;

                    div {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;

                        label {
                            font-family: "Raleway";
                            font-size: 1.1rem;
                            font-weight: 700;
                        }

                        input {
                            font-family: "Rubik", sans-serif;
                            font-size: 1.2rem;
                            padding: 10px;
                            border-radius: 10px;
                            border: 1px solid #1f266b;
                            width: 70%;
                        }

                        input[type="file"] {
                            padding: 10px;
                            border-radius: 10px;
                            border: 1px solid #1f266b;
                        }

                        button {
                            display: flex;
                            justify-content: center;
                            margin-left: auto;
                            margin-right: auto;
                            background-color: #fbba00;
                            color: black;
                            font-family: "Rubik", sans-serif;
                            font-size: 1.2rem;
                            font-weight: 700;
                            text-transform: uppercase;
                            padding: 10px;
                            border: none;
                            width: 30%;
                            border-radius: 30px;
                            cursor: pointer;
                        }
                    }

                    .section {
                        display: grid;
                        grid-template-columns: 1fr 1fr 1fr;
                        margin-left: 60px;
                        margin-right: auto;
                        gap: 20px;
                    }

                    .files {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        justify-content: center;
                        margin-right: 0px;
                        gap: 0px;

                        div {
                            display: flex;
                            align-items: center;
                        }
                    }

                    .sign {
                        display: flex;
                        flex-direction: column;
                        gap: 0px;
                        background-color: rgb(245, 241, 241);
                        border-radius: 20px;
                        height: 20vh;

                        label {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            font-family: "Raleway";
                            font-size: 1.2rem;
                            font-weight: 700;
                            height: 50px;
                            background-color: #c2c2c5;
                            border-top-left-radius: 0px;
                            border-top-right-radius: 0px;
                        }
                    }
                }
            }
        }
    }

    .footer {
        display: flex;
        flex-direction: column;

        .footer1 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            height: 53vh;
            background-color: #1f266b;
            color: #ffffff;
            font-size: 15px;

            .coordonnees {
                grid-column: 1 / 2;
                align-self: flex-start;
                justify-self: center;
                margin-top: 20px;

                h2 {
                    font-size: 1.5rem;
                    font-family: "Raleway";
                    text-transform: uppercase;
                    font-weight: bold;
                    margin-bottom: 15px;
                    text-decoration: underline;
                    text-decoration-color: #fbba00;
                    text-decoration-thickness: 2px;
                    text-underline-offset: 5px;
                    margin-bottom: 20px;
                }

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    font-size: 1.2rem;
                    gap: 30px;
                    align-items: start;

                    li {
                        gap: 20px;
                    }

                    li::marker {
                        color: rgb(251, 251, 251);
                    }
                }
            }

            .autre {
                grid-column: 2 / 3;
                align-self: flex-start;
                justify-self: center;
                margin-top: 20px;

                h2 {
                    font-size: 1.5rem;
                    font-family: "Raleway";
                    text-transform: uppercase;
                    font-weight: bold;
                    margin-bottom: 15px;
                    text-decoration: underline;
                    text-decoration-color: #fbba00;
                    text-decoration-thickness: 2px;
                    text-underline-offset: 5px;
                    margin-bottom: 20px;
                }

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    font-size: 1.2rem;
                    gap: 30px;
                    align-items: start;

                    li::marker {
                        color: rgb(251, 251, 251);
                    }
                }
            }

            .suivre {
                grid-column: 3 / 4;
                align-self: flex-start;
                justify-self: center;
                margin-top: 20px;

                h2 {
                    font-size: 20px;
                    font-family: "Raleway";
                    text-transform: uppercase;
                    font-weight: bold;
                    margin-bottom: 1.5rem;
                    text-decoration: underline;
                    text-decoration-color: #fbba00;
                    text-decoration-thickness: 2px;
                    text-underline-offset: 5px;
                    margin-bottom: 20px;
                }

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    font-size: 1.2rem;
                    gap: 30px;
                    align-items: start;
                    justify-content: center;

                    li::marker {
                        color: rgb(251, 251, 251);
                    }
                }
            }
        }

        .footer2 {
            display: flex;
            height: 13vh;
            background-color: #89baad;
            font-size: 1.1rem;
            font-family: "Rubik", sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            color: #1f266b;

            div {
                display: flex;
                justify-content: center;
                align-items: center;
                justify-content: space-around;
                height: 100%;

                ul {
                    display: flex;
                    margin-left: 70px;
                    margin-right: 70px;
                    gap: 70px;

                    li {
                        display: flex;
                        list-style: none;
                    }
                }
            }
        }

        .scroll {
            height: 7.2vh;
        }
    }
}

@media (max-width: 768px) {
    .imgActus {
        display: flex;

        img {
            height: 303px;
        }
    }

    .seSignaler {
        display: flex;
        flex-direction: column;

        .ActusTitle {
            /* TITLE H1 */
            display: flex;
            justify-content: center;
            margin-top: 40px;
            margin-bottom: 25px;

            img {
                width: 18px;
                margin-top: 10px;
            }

            h1 {
                /* TITRE se signaler au ccas */
                text-align: center;
                margin-top: 15px;
                font-family: "Raleway";
                font-size: 2rem;
                font-weight: bold;
                text-transform: uppercase;
            }
        }

        .hrActus {
            border: 2px solid #070707;
            margin-left: auto;
            margin-right: auto;
            width: 84%;
        }

        .inscription {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 140vh;

            h2 {
                display: flex;
                justify-content: center;
                font-family: "Raleway";
                font-size: 1.4rem;
                font-weight: 700;
                text-transform: uppercase;
                align-items: center;
                letter-spacing: 0.4px;
                margin-left: 0px;
            }

            .inscriTxt {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 100%;
                gap: 5vw;
                height: 90vh;
                margin-top: 0px;

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    text-align: start;
                    margin-top: 0px;
                    font-size: 1.2rem;
                    width: 340px;
                    gap: 2px;

                    li {
                        gap: 20px;
                        width: 330px;
                        line-height: 1.2;
                    }

                    li::marker {
                        color: rgb(2, 2, 2);
                    }
                }

                img {
                    height: 250px;
                    float: right;
                    margin-top: 0%;
                }
            }

            .inscriTxt2 {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
                width: 100%;
                font-family: "Rubik", sans-serif;
                font-weight: 400;

                p {
                    font-size: 1.2rem;
                    text-align: start;
                    margin-left: 120px;
                    margin-top: 20px;
                    font-family: "Rubik", sans-serif;
                }

                ul {
                    display: flex;
                    flex-direction: column;
                    list-style: inside;
                    font-family: "Rubik", sans-serif;
                    text-align: start;
                    font-size: 1.2rem;
                    margin-left: 120px;
                    margin-top: 20px;

                    li {
                        gap: 20px;
                        line-height: 1.2;
                    }

                    li::marker {
                        color: rgb(2, 2, 2);
                    }
                }
            }
        }

        .contrat {
            display: flex;
            flex-direction: column;
            height: 150vh;
            justify-content: center;

            .contratTitle {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #1f266b;
                height: 30vh;
                gap: 20px;

                h3 {
                    /* TITRE Termes du contrat */
                    display: flex;
                    font-family: "Raleway";
                    font-size: 1.2rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    align-self: center;
                    align-items: center;
                    color: white;
                }

                p {
                    font-family: "Rubik", sans-serif;
                    font-size: 1.2rem;
                    color: white;
                }

                .download {
                    display: flex;
                    gap: 20px;

                    .hrDownload1 {
                        border: 2px solid #fbba00;
                        rotate: 90deg;
                        margin-right: 20px;
                    }

                    button {
                        background-color: #fbba00;
                        color: black;
                        font-family: "Rubik", sans-serif;
                        font-size: 1.2rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        padding: 10px 20px;
                        border: none;
                        border-radius: 30px;
                        cursor: pointer;
                    }

                    .hrDownload2 {
                        border: 2px solid #fbba00;
                        rotate: 90deg;
                        margin-left: 20px;
                    }
                }
            }

            .method1 {
                display: flex;
                flex-direction: column;
                margin-top: 20px;
                margin-bottom: 20px;

                h2 {
                    display: flex;
                    font-family: "Raleway";
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    letter-spacing: 0.4px;
                    margin-bottom: 40px;
                    justify-content: center;
                }

                .enLigne {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    margin-top: 20px;
                    margin-bottom: 20px;
                    margin-left: auto;
                    margin-right: auto;
                    background-color: rgb(225, 225, 225);
                    border-radius: 10px;
                    height: 40vh;
                    width: 70%;

                    h4 {
                        display: flex;
                        font-family: "Raleway";
                        margin-left: 30px;
                        font-size: 1.3rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        margin-bottom: 20px;
                    }

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 30px;
                        font-family: "Rubik", sans-serif;
                    }
                }
            }

            .method2 {
                display: grid;
                grid-template-columns: 2fr 1fr;
                gap: 15px;
                text-align: start;
                height: 70vh;
                margin-left: 15%;
                margin-right: 15%;

                .mail {
                    /* INSCRIPTION PAR MAIL */
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    background-color: #89baad;
                    border-radius: 10px;
                    width: 100%;
                    height: 70vh;

                    h4 {
                        font-family: "Raleway";
                        color: #1f266b;
                        font-size: 1.3rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        margin-left: 1.3rem;
                        margin-bottom: 20px;
                    }

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 20px;
                        width: 95%;
                        font-family: "Rubik", sans-serif;
                    }

                    .email {
                        display: flex;
                        flex-direction: row;
                        align-items: center;
                        justify-content: flex-start;
                        width: 80%;
                        margin-left: 1.4vw;
                        height: 30px;

                        p {
                            font-size: 1.2rem;
                            text-align: start;
                            margin-left: 20px;
                            font-family: "Rubik", sans-serif;
                        }

                        img {
                            width: 8%;
                        }
                    }
                }

                .accueil {
                    /* EN VOUS DEPLACANT */
                    display: flex;
                    flex-direction: column;
                    background-color: #89baad;
                    border-radius: 10px;
                    width: 100%;
                    height: 70vh;

                    h4 {
                        font-family: "Raleway";
                        color: #1f266b;
                        font-size: 1.3rem;
                        font-weight: 700;
                        text-transform: uppercase;
                        margin-left: 10px;
                        margin-top: 18px;
                        margin-bottom: 20px;
                    }

                    h5 {
                        font-family: "Raleway";
                        color: #1f266b;
                        font-size: 1.3rem;
                        font-weight: 700;
                        margin-left: 10px;
                        margin-bottom: 20px;
                    }

                    p {
                        font-size: 1.2rem;
                        text-align: start;
                        margin-left: 10px;
                        font-family: "Rubik", sans-serif;
                    }
                }
            }
        }

        .form {
            /* SECTION FORMULAIRE */
            display: flex;
            flex-direction: column;
            margin-top: 40px;
            height: 145vh;

            h2 {
                /* FORMULAIRE DE DEMANDE D'INSCRIPTION EN LIGNE */
                display: flex;
                justify-content: center;
                font-family: "Raleway";
                font-size: 1.5rem;
                font-weight: 700;
                text-transform: uppercase;
                align-items: center;
                margin-left: 0px;
                margin-bottom: 30px;
            }

            .donnees {
                /* FORMULAIRE */
                display: flex;
                flex-direction: column;
                width: 85%;
                background-color: #ced6d4;
                margin-left: auto;
                margin-right: auto;
                border-radius: 30px;
                height: 120vh;

                h3 {
                    /* INFORMATION DE VOS DONNÉES PERSONNELLES */
                    display: flex;
                    justify-content: center;
                    font-family: "Raleway";
                    font-size: 1.3rem;
                    font-weight: 700;
                    text-transform: uppercase;
                    margin-left: 0px;
                    margin-top: 20px;
                }

                p {
                    font-size: 1.2rem;
                    font-family: "Rubik", sans-serif;
                    margin-top: 2%;
                    margin-bottom: 2%;
                    margin-left: 60px;
                    width: 82%;
                }

                form {
                    display: flex;
                    flex-direction: column;
                    margin-left: auto;
                    margin-right: 0px;
                    gap: 20px;

                    div {
                        display: flex;
                        flex-direction: column;
                        gap: 10px;

                        label {
                            font-family: "Raleway";
                            font-size: 1.1rem;
                            font-weight: 700;
                        }

                        input {
                            font-family: "Rubik", sans-serif;
                            font-size: 1.2rem;
                            padding: 10px;
                            border-radius: 10px;
                            border: 1px solid #1f266b;
                            width: 70%;
                        }

                        input[type="file"] {
                            padding: 10px;
                            border-radius: 10px;
                            border: 1px solid #1f266b;
                        }

                        button {
                            display: flex;
                            justify-content: center;
                            margin-left: auto;
                            margin-right: auto;
                            background-color: #fbba00;
                            color: black;
                            font-family: "Rubik", sans-serif;
                            font-size: 1.2rem;
                            font-weight: 700;
                            text-transform: uppercase;
                            padding: 10px;
                            border: none;
                            width: 30%;
                            border-radius: 30px;
                            cursor: pointer;
                        }
                    }

                    .section {
                        display: grid;
                        grid-template-columns: 1fr 1fr 1fr;
                        margin-left: 60px;
                        margin-right: auto;
                        gap: 20px;
                    }

                    .files {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        justify-content: center;
                        margin-right: 0px;
                        gap: 0px;

                        div {
                            display: flex;
                            align-items: center;
                        }
                    }

                    .sign {
                        display: flex;
                        flex-direction: column;
                        gap: 0px;
                        background-color: rgb(245, 241, 241);
                        border-radius: 20px;
                        height: 20vh;

                        label {
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            font-family: "Raleway";
                            font-size: 1.2rem;
                            font-weight: 700;
                            height: 50px;
                            background-color: #c2c2c5;
                            border-top-left-radius: 0px;
                            border-top-right-radius: 0px;
                        }
                    }
                }
            }
        }
    }

    .footer {
        .footer1 {
            display: flex;
            flex-direction: column;
            height: auto;
            width: 100%;
            padding-bottom: 40px;
            padding-left: 40px;

            .coordonnees {
                ul {
                    gap: 10px;
                }
            }

            .autre {
                ul {
                    gap: 10px;
                }
            }

            .suivre {
                ul {
                    gap: 10px;
                }
            }
        }

        .footer2 {
            display: flex;
            height: auto;
            justify-content: center;
            background-color: #89baad;
            font-size: 1.1rem;
            font-family: "Rubik", sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            color: #1f266b;

            div {
                justify-content: none;
                height: auto;
                width: auto;

                ul {
                    display: flex;
                    flex-direction: column;
                    gap: 30px;
                    padding-block: 20px;
                }
            }
        }
    }
}

@media (max-width: 768px) {
    .imgActus {
        display: flex;

        img {
            height: 270px;
        }
    }
}
</style>
