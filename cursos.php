<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blog | Cursos</title>
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

        #map {
            max-height: 200px;
            width: 100%;
            border-radius: 10px;
            display: block;
        }

    </style>
    <body>
        <?php include("inc/header.php")?>
        <div class="container">
            <main id="posts-container">
                <h1 class="title-curso">Etec Fernando Prestes</h1>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.576057709761!2d-47.47376852534445!3d-23.511774759771008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c58aeb7987bac9%3A0xbafed5f1761e6f47!2sEscola%20T%C3%A9cnica%20Estadual%20Fernando%20Prestes!5e0!3m2!1spt-BR!2sbr!4v1703168870089!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="map"></iframe>
                    <script>
    document.getElementById('map').onload = function() {
        document.getElementById('map').style.display = 'block';
    }

    document.getElementById('map').onerror = function() {
        document.getElementById('map').style.display = 'none';
    }
</script>
                    <p class="infos-fp text-color fw-bold">
                    <i class="fa-solid fa-map-location-dot info"></i>
                    R. Natal, 340 - Jd. Paulistano CEP 18040-810 - Sorocaba/SP
                </p>
                <p class="infos-fp">
                    <i class="fa-solid fa-phone info"></i> Telefone: (15) 3221-9677 
                    <i class="fa-solid fa-phone info"></i> Telefone: (15) 3221-2044
                </p>
                <p class="infos-fp">
                    <i class="fa-solid fa-at info"></i>
                    E-mail:     
                        <a href="mailto:e016dir@cps.sp.gov.br" class="link"
                        >  e016dir@cps.sp.gov.br</a
                    >
                </p>
                <p class="infos-fp">
                    <i class="fa-solid fa-globe info"></i> Site:
                    <a href="https://www.etecfernandoprestes.com.br/" class="link"
                        >www.etecfernandoprestes.com.br</a
                    >
                </p>
                <div class="border-info"></div>
                <div class="container-curso">
                    <h2 class="title-curso-dark">Cursos oferecidos:</h2>
                    <br />
                    <ul>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=501"
                                class="curso-link"
                                >Administração</a
                            >
                            <br /><br /><span>Período: Tarde - 40 vagas</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.etecfernandoprestes.com.br/Curso/1/administrao-modular"
                                class="curso-link"
                                >Administração - (EaD - On-line)</a
                            >
                            <br /><br /><span
                                >Período: Tarde \ Período: Noite</span
                            >
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=1489"
                                class="curso-link"
                                >Comércio - (EaD - On-line)</a
                            >
                            <br /><br /><span>Período: On-line</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=506"
                                class="curso-link"
                                >Contabilidade</a
                            >
                            <br /><br /><span>Período: Noite - 40 vagas</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=1500"
                                class="curso-link"
                                >Desenvolvimento de Sistemas</a
                            >
                            <br /><br /><span>Período: Noite - 40 vagas</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=1568"
                                class="curso-link"
                                >Desenvolvimento de Sistemas (EaD - On-line)</a
                            >
                            <br /><br /><span>Período: On-line</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=1113"
                                class="curso-link"
                                >Design de Interiores</a
                            >
                            <br /><br /><span>Período: Noite - 40 vagas</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=1580"
                                class="curso-link"
                                >Edificações (com até 20% online)</a
                            >
                            <br /><br /><span>Período: Noite - 40 vagas</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=508"
                                class="curso-link"
                                >Finanças</a
                            >
                            <br /><br /><span>Período: Noite - 40 vagas</span>
                        </li>
                        <li class="li-curso">
                            <a
                                href="https://www.vestibulinhoetec.com.br/unidades-cursos/curso.asp?c=511"
                                class="curso-link"
                                >Logística</a
                            >
                            <br /><br /><span>Período: Noite - 40 vagas</span>
                        </li>
                    </ul>
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
                                    class="active"
                                    >Cursos</a
                                >
                            </li>
                            <li>
                                <a
                                    href="./criadores.html"
                                    title="Veja os Criadores!"
                                    
                                    >Criadores</a
                                >
                            </li>
                            <li>
                                <a 
                                    href="./suporte.php"
                                    
                                    >Suporte</a
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
    
        </body>
        <script src="./js/awsome/all.min.js"></script>
        <script src="./js/script.js"></script>
        <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
    </body>
</html>
