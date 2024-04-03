<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div class="body">
        <div class="title">
            <div class="yellow-bar"></div>
            <h1>Le CCAS</h1>
        </div>
        <video controls>
            <source src="../../assets/CCAS-video.webm" type="video/webm" />
        </video>

        <h2>Voir les autres pages :</h2>
        <div class="pages">
            <div class="page">
                <h2>Page Se signaler</h2>
                <button>
                    <inertia-link href="/signaler">Voir plus</inertia-link>
                </button>
            </div>
            <div class="page">
                <h2>Page Sorties</h2>
                <button>
                    <inertia-link href="/sorties-du-ccas"
                        >Voir plus</inertia-link
                    >
                </button>
            </div>
            <div class="page">
                <h2>Page Résidence</h2>
                <button>
                    <inertia-link href="/residences-et-etablissements"
                        >Voir plus</inertia-link
                    >
                </button>
            </div>
            <div class="page">
                <h2>Page Se faire aider</h2>
                <button>
                    <inertia-link href="/se-faire-aider"
                        >Voir plus</inertia-link
                    >
                </button>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer">
            <img src="../../assets/balancoire.png" alt="" class="balancoire" />
            <section class="footer1">
                <div class="coordonnees">
                    <h2>Coordonnées</h2>
                    <ul>
                        <li>
                            <a>Direction de l'Action Sociale</a><br />
                            Espace Duflos
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
@import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@100&display=swap");

/* --------------- HEADER --------------- */

.hrHead {
    border-bottom: 3px solid #89baad;
}

/* --------------- BODY --------------- */

.body {
    display: flex;
    flex-direction: column;
    gap: 60px;
    background-image: url("../../assets/background-sorties.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: bottom;
    background-color: #89baad;
    padding-inline: 160px;
    overflow-x: hidden;
}

.title {
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 50px;

    .yellow-bar {
        width: 10px;
        height: 40px;
        background-color: #fbba00;
        transform: rotate(10deg);
        margin-right: 10px;
        margin-bottom: 4px;
    }

    h1 {
        font-size: 40px;
        font-family: "Open Sans", sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        color: #000000;
    }
}

video {
    width: 100%;
    margin-top: 20px;
}

.pages {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    padding-top: 20px;
    padding-bottom: 60px;

    .page {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);

        h2 {
            font-size: 20px;
            font-family: "Open Sans", sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            color: #000000;
            margin-bottom: 20px;
        }

        button {
            background-color: #fbba00;
            color: #ffffff;
            font-size: 16px;
            font-family: "Open Sans", sans-serif;
            text-transform: uppercase;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;

            a {
                text-decoration: none;
                color: #ffffff;
            }
        }
    }
}

/* --------------- FOOTER --------------- */

.footer {
    display: flex;
    flex-direction: column;

    .balancoire {
        width: 10%;
        position: absolute;
    }

    .footer1 {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        background-color: #1f266b;
        color: #ffffff;
        font-size: 15px;
        padding-inline: 80px;
        padding-bottom: 40px;

        .coordonnees {
            grid-column: 1 / 2;
            align-self: flex-start;
            justify-self: center;
            margin-top: 20px;

            h2 {
                font-size: 22px;
                font-family: "Open Sans", sans-serif;
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 15px;
                text-decoration: underline;
                text-decoration-color: #fbba00;
                text-decoration-thickness: 2px;
                text-underline-offset: 5px;
                margin-top: 20px;
                margin-bottom: 60px;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Open Sans", sans-serif;
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
                font-size: 22px;
                font-family: "Open Sans", sans-serif;
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 15px;
                text-decoration: underline;
                text-decoration-color: #fbba00;
                text-decoration-thickness: 2px;
                text-underline-offset: 5px;
                margin-top: 20px;
                margin-bottom: 60px;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Open Sans", sans-serif;
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
                font-size: 22px;
                font-family: "Open Sans", sans-serif;
                text-transform: uppercase;
                font-weight: bold;
                margin-bottom: 15px;
                text-decoration: underline;
                text-decoration-color: #fbba00;
                text-decoration-thickness: 2px;
                text-underline-offset: 5px;
                margin-top: 20px;
                margin-bottom: 60px;
            }

            ul {
                display: flex;
                flex-direction: column;
                list-style: inside;
                font-family: "Open Sans", sans-serif;
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
        font-family: "Open Sans", sans-serif;
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
}

/* --------------- MEDIA QUERIES --------------- */

@media (max-width: 1440px) and (min-width: 1024px) {
    .body {
        padding-inline: 100px;
    }

    .title {
        padding-top: 50px;
        padding-inline: 100px;
    }

    .footer {
        .footer1 {
            padding-inline: 100px;
        }

        .footer2 {
            padding-inline: 100px;
        }
    }
}

@media (max-width: 1024px) {
    .body {
        padding-inline: 20px;

        img {
            width: 50%;
        }
    }

    .title {
        padding-top: 20px;
        padding-inline: 20px;
    }

    .footer {
        .balancoire {
            display: none;
        }

        .footer1 {
            padding-inline: 20px;

            .coordonnees {
                h2 {
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
            }

            .autre {
                h2 {
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
            }

            .suivre {
                h2 {
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
            }

            ul {
                gap: 10px;
            }

            li {
                gap: 10px;
            }
        }

        .footer2 {
            padding-inline: 20px;
        }
    }
}

@media (max-width: 768px) {
    .body {
        padding-inline: 20px;

        img {
            width: 80%;
        }
    }

    .title {
        h1 {
            font-size: 24px;
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
            height: auto;
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

@media (max-width: 430px) {
    .body {
        padding-inline: 20px;

        img {
            width: 100%;
        }
    }

    .title {
        h1 {
            font-size: 24px;
        }
    }

    .pages {
        grid-template-columns: 1fr;
        gap: 20px;

        .page {
            h2 {
                font-size: 18px;
            }

            button {
                font-size: 14px;
            }
        }
    }

    .footer {
        .footer1 {
            padding-inline: 20px;

            .coordonnees {
                h2 {
                    font-size: 20px;
                }
            }

            .autre {
                h2 {
                    font-size: 20px;
                }
            }

            .suivre {
                h2 {
                    font-size: 20px;
                }
            }
        }

        .footer2 {
            padding-inline: 20px;
        }
    }
}
</style>
