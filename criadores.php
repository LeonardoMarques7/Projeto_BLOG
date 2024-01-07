<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blog | Criadores</title>
        <link
            rel="shortcut icon"
            href="./img/288-logo-etec-fernando-prestes.svg"
            type="image/svg"
        />
        <!-- Estilização -->
        <link id="style-link" rel="stylesheet" href="./css/style.css" />
        <!-- Fontes -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
            rel="stylesheet"
        />
    </head>
    <style>
        input[type="checkbox"] {
            appearance: none;
        }

        label,
        input[type="checkbox"]:hover {
            cursor: pointer;
        }

        #nav-links .img-modo {
            width: 18px;
            margin-top: 2px;
        }
    </style>
    <body>
        <header id="home">
            <nav id="navbar">
                <div id="navbar-inner">
                    <img
                        src="./img/288-logo-etec-fernando-prestes.svg"
                        alt=""
                        id="logo-page"
                        style="filter: invert(100%)"
                    />
                    <ul id="nav-links">
                        <li><a href="./index.php">Home</a></li>
                        <li><a href="./login.php">Administrador</a></li>
                        <li>
                            <label class="switch">
                                <input type="checkbox" id="style-toggle" />
                                <img
                                    src="./img/modo-escuro.png"
                                    id="img"
                                    alt="Toggle Image"
                                    class="img-modo"
                                    data-dark-image="./img/modo-claro.png"
                                />
                            </label>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <main id="posts-container">
                <div class="faixa-cards">
                    <div class="faixa-cards">
                        <div class="card">
                            <img src="./img/leo.png" alt="" />
                            <h2>Leonardo Marques</h2>
                            <b>Software Engineer & Programmer</b>
                            <p>
                                Olá, eu sou o Leo! Tenho 17 anos. Gosto de
                                música e jogar videogame. Amo filmes e séries,
                                principalmente a Marvel.
                            </p>
                            <br />
                            <a
                                href="https://www.instagram.com/leonardo_marques15/"
                                ><i class="fa-brands fa-instagram"></i
                            ></a>
                            <a href="https://twitter.com/LeonardoMarks07"
                                ><i class="fa-brands fa-twitter"></i
                            ></a>
                            <a
                                href="https://delve.office.com/?u=9e95e692-b83f-4ebc-9972-d94809f4e0c7&v=editprofile"
                                ><i class="fa-solid fa-paper-plane"></i
                            ></a>
                        </div>
                        <div class="card">
                            <img src="./img/manu.png" alt="" />
                            <h2>Manoela Moraes</h2>
                            <b>Designer & Programmer</b>
                            <p>
                                Olá, sou a Manu! Tenho 17 anos. Amo música,
                                principalmente POP. Meu hobbie favorito é jogar
                                vôlei.
                            </p>
                            <br />
                            <a href="https://www.instagram.com/manu.tjx/"
                                ><i class="fa-brands fa-instagram"></i
                            ></a>
                            <a href="https://twitter.com/manusx_"
                                ><i class="fa-brands fa-twitter"></i
                            ></a>
                            <a
                                href="https://delve.office.com/?u=8cc24190-c073-48af-8b84-1f35a108bf07&v=work"
                                ><i class="fa-solid fa-paper-plane"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </main>
            <aside id="sidebar">
                <section id="search-bar">
                    <a
                        href="https://websai.cps.sp.gov.br/acesso/Login?ReturnUrl=%2FFormulario%2FLista"
                    >
                        <figure>
                            <img
                                src="./img/websai.png"
                                alt="WebSai"
                                title="CPS pesquisa do WEBSAI 2023"
                                class="img-websai"
                            />
                        </figure>
                    </a>
                </section>
                <section id="categories">
                    <h4>Links Úteis</h4>
                    <nav>
                        <ul>
                            <li>
                                <a
                                    href="https://www.etecfernandoprestes.com.br/"
                                    title="Site Etec Fernando Prestes"
                                    >Etec Fernando Prestes</a
                                >
                            </li>
                            <li>
                                <a
                                    href="https://www.vestibulinhoetec.com.br/home/"
                                    title="Site Vestibulinho"
                                    >Vestibulinho</a
                                >
                            </li>
                            <li>
                                <a
                                    href="cursos.php"
                                    title="Cursos da Etec Fernando Prestes"
                                    >Cursos</a
                                >
                            </li>
                            <li>
                                <a
                                    href="./criadores.php"
                                    title="Veja os Criadores!"
                                    class="active"
                                    >Criadores</a
                                >
                            </li>
                        </ul>
                    </nav>
                </section>
                <section id="redes">
                    <h4>Redes Socias</h4>
                    <div id="tags-container-2">
                        <a
                            href="https://www.instagram.com/etecfernandoprestes/"
                            title="Instagram"
                            id="instagram"
                            ><i class="fab fa-instagram"></i
                        ></a>
                        <a
                            href="https://www.facebook.com/etecfernando"
                            title="Facebook"
                            id="facebook"
                            ><i class="fab fa-facebook"></i
                        ></a>
                        <a
                            href="https://www.youtube.com/@EtecFernandoPrestesCPS"
                            title="Youtube"
                            id="youtube"
                            ><i class="fa-brands fa-youtube"></i
                        ></a>
                    </div>
                </section>
            </aside>
        </div>
        <footer>
            <?php include("footer.php"); ?>
        </footer>

        <script src="./js/awsome/all.min.js"></script>
        <script src="./js/script.js"></script>
        <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
    </body>
</html>
