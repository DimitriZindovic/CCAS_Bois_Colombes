<script>
export default {
    name: "SortiesView",
};
</script>

<template>
    <hr class="hrHead" />

    <div class="body">
        <div class="yellow-bar"></div>
        <div class="title">
            <h1>Les sorties du CCAS</h1>
        </div>

        <span class="blue-line"></span>

        <div class="catalogue">
            <div class="text-yellow-bar">
                <div class="yellow-bar"></div>
                <h2>Le catalogue semestriel</h2>
            </div>
            <div class="paragraphs-img">
                <div class="paragraphs">
                    <p>
                        Tout au long de l’année, des activités socio-culturelles
                        et des sorties en demi-journées ou journées complètes
                        sont proposées. Elles sont répertoriées dans un livret
                        semestriel, adressé par courrier aux personnes
                        inscrites, téléchargeable ci-dessous ou disponible à
                        l’accueil du CCAS.
                    </p>
                    <p>
                        Les sorties payantes sont en partie subventionnées par
                        le CCAS ; Les bénéficiaires du Minimum de Ressources
                        Communales sont invités une fois par an à profiter
                        gratuitement d’une sortie estivale.
                    </p>
                    <p>
                        Les inscriptions aux sorties se font précisément aux
                        dates indiquées dans le catalogue, sur le site de la
                        ville (suivez l’info sur l’agenda et sur les actualités)
                        et dans le dépliant «Sortir» mensuel. Les conditions de
                        réservations, de participation, de remboursement… y sont
                        également précisées.
                    </p>
                </div>
                <span class="first-circle"></span>
                <span class="second-circle"></span>
                <img
                    src="../../assets/personnes_sorties.png"
                    alt="Personnes âgées"
                />
            </div>
        </div>

        <div class="sorties">
            <div class="text-yellow-bar">
                <div class="yellow-bar"></div>
                <h2>
                    Les sorties accessibles aux personnes<br />à mobilité
                    réduite
                </h2>
            </div>
            <p>
                Elles sont signalées par le pictogramme ci-contre.<br />
                Attention cependant les personnes en fauteuil devront<br />
                impérativement être accompagnées et le signaler lors de
                l’inscription.
            </p>
        </div>

        <img src="../../assets/img_sorties.png" alt="Paysage montagnes" />
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
    background-image: url("../../assets/background-sorties.png");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: bottom;
    background-color: #89baad;
    padding-inline: 160px;
    overflow-x: hidden;


    h2 {
        font-size: 34px;
        font-family: "Open Sans", sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        color: #000000;
        padding-bottom: 16px;
    }

    img {
        width: 100%;
        height: auto;
        padding-bottom: 80px;
    }
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

.blue-line {
    display: block;
    width: 100%;
    height: 5px;
    background-color: #1f266b;
    margin-block: 20px;
    border-radius: 5px;
}

.text-yellow-bar {
    display: flex;
    align-items: center;
    width: 100vw;

    .yellow-bar {
        width: 10px;
        height: 40px;
        background-color: #fbba00;
        transform: rotate(10deg);
        margin-right: 10px;
        margin-bottom: 20px;
    }
}

.catalogue {
    padding-top: 40px;
    padding-bottom: 40px;

    h2 {
        font-size: 34px;
        font-family: "Open Sans", sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        color: #000000;
        padding-bottom: 16px;
    }

    p {
        font-size: 24px;
        font-family: "Open Sans", sans-serif;
        color: #000000;
        padding-bottom: 16px;
        font-weight: 500;
    }

    .paragraphs-img {
        display: flex;
        justify-content: space-between;

        .paragraphs {
            padding-block: 60px;
            display: flex;
            flex-direction: column;
            gap: 40px;
            z-index: 1;
        }

        .first-circle {
            width: 300px;
            height: 300px;
            background-color: #89baad;
            border-radius: 50%;
            margin-top: 250px;
            margin-left: -220px;
            position: absolute;
            z-index: 0;
        }

        .second-circle {
            width: 200px;
            height: 200px;
            background-color: #89baad;
            border-radius: 50%;
            margin-top: 20px;
            margin-left: 700px;
            position: absolute;
            z-index: 0;
        }

        img {
            width: 40%;
            height: 40%;
            margin-right: 0;
            margin-top: 120px;
            z-index: 1;
        }
    }
}

.sorties {
    padding-top: 40px;
    padding-bottom: 40px;

    h2 {
        font-size: 34px;
        font-family: "Open Sans", sans-serif;
        text-transform: uppercase;
        font-weight: bold;
        color: #000000;
        padding-bottom: 16px;
    }

    p {
        font-size: 24px;
        font-family: "Open Sans", sans-serif;
        color: #000000;
        padding-top: 40px;
        padding-bottom: 16px;
        font-weight: 500;
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

@media (min-width: 1440px) {
    .paragraphs {
        width: 50%;
    }
}

@media (max-width: 1440px) and (min-width: 1024px) {
    .body {
        padding-inline: 100px;
    }

    .title {
        padding-top: 50px;
        padding-inline: 100px;
    }

    .catalogue {
        padding-top: 40px;
        padding-bottom: 40px;
        padding-inline: 100px;
    }

    .sorties {
        padding-top: 40px;
        padding-bottom: 40px;
        padding-inline: 100px;
    }

    .paragraphs-img {
        .paragraphs {
            padding-block: 40px;
            width: 50%;
        }

        .first-circle {
            display: none;
        }

        .second-circle {
            display: none;
        }

        img {
            display: flex;
            justify-content: center;
            width: 80vw;
        }
    }

    img {
        display: flex;
        justify-content: center;
        width: 80vw;
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

    .blue-line {
        width: 95%;
    }

    .paragraphs-img {
        justify-content: flex-start;
    }
    .paragraphs {
        padding-block: 20px;
        width: 100%;
    }

    .text-yellow-bar {
        h2 {
            font-size: 20px;
        }
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

    .text-yellow-bar {
        h2 {
            font-size: 18px;
        }
    }

    .paragraphs-img {
        img {
            display: none;
        }
    }

    .first-circle {
        display: none;
    }

    .second-circle {
        display: none;
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
</style>
