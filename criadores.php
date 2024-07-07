
<?php $title = "Criadores"?>
<?php include("inc/head.php")?>
<?php include(DBAPI); ?>
<body>
    <div class="container">
        <main id="posts-container">
        <div class="container-criadores">
                    <div class="card-criador">
                        <img
                            src="./img//leo.png"
                            alt="Foto"
                            class="img-criador"
                        />
                        <h2>Leonardo Marques</h2>
                        <div class="content-card">
                                <strong class="profile-insta"><a href="">@leonardoMarques</a></strong>
                            <a
                                href="https://delve.office.com/?u=9e95e692-b83f-4ebc-9972-d94809f4e0c7&v=work"
                            >
                                <button class="contato-button">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-criador">
                        <img
                            src="./img//manu.png"
                            alt="Foto"
                            class="img-criador"
                        />
                        <h2>Manoela Moraes</h2>
                        <div class="content-card">
                            <strong class="profile-insta"><a href="https://www.instagram.com/manu.tjx/">@manu.tjx</a></strong>
                            <a
                                href="https://delve.office.com/?u=8cc24190-c073-48af-8b84-1f35a108bf07&v=work"
                            >
                                <button class="contato-button">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-criador">
                        <img
                            src="./img//geo.png"
                            alt="Foto"
                            class="img-criador"
                        />
                        <h2>Geovana Terra</h2>
                        <div class="content-card">
                            <strong class="profile-insta"><a href="https://www.instagram.com/__te777/">@__te777</a></strong>
                            <a
                                href="https://delve.office.com/?u=a603630d-56b0-4b35-aef4-446f1631cacc&v=work"
                            >
                                <button class="contato-button">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-criador">
                        <img
                            src="./img//nathy.png"
                            alt="Foto"
                            class="img-criador"
                        />
                        <h2>Natália Hidemi</h2>
                        <div class="content-card">
                            <strong class="profile-insta"><a href="https://www.instagram.com/nat_sski/">@nat_sski</a></strong>
                            <a
                                href="https://delve.office.com/?u=e24f47a8-33f8-43d4-bb62-a471078bdf42&v=work"
                            >
                                <button class="contato-button">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-criador">
                        <img
                            src="./img//matteus.jpg"
                            alt="Foto"
                            class="img-criador"
                        />
                        <h2>Matteus Guilherme</h2>
                        <div class="content-card">
                            <strong class="profile-insta"><a href="https://www.instagram.com/mattetteus/">@mattetteus</a></strong>
                            <a
                                href="https://delve.office.com/?u=907ca394-9b97-470f-ab47-81f81813c60f&v=work"
                            >
                                <button class="contato-button">
                                    <i class="fa-regular fa-envelope"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
        </main>
        <aside id="sidebar">
            <section id="search-bar">
                <a href="https://websai.cps.sp.gov.br/acesso/Login?ReturnUrl=%2FFormulario%2FLista">
                    <figure>
                        <img src="./img/websai.png" alt="WebSai" title="CPS pesquisa do WEBSAI 2023" class="img-websai" />
                    </figure>
                </a>
            </section>
            <section id="categories">
                <h4>Links Úteis</h4>
                <nav>
                    <ul>
                        <li>
                            <a href="https://www.etecfernandoprestes.com.br/" title="Site Etec Fernando Prestes">Etec Fernando Prestes</a>
                        </li>
                        <li>
                            <a href="https://www.vestibulinhoetec.com.br/home/" title="Site Vestibulinho">Vestibulinho</a>
                        </li>
                        <li>
                            <a href="cursos.php" title="Cursos da Etec Fernando Prestes">Cursos</a>
                        </li>
                        <li>
                            <a href="./suporte.php">Suporte</a>
                        </li>
                    </ul>
                </nav>
            </section>
            <section id="redes">
                <h4>Redes Socias</h4>
                <div id="tags-container-2">
                    <a href="https://www.instagram.com/etecfernandoprestes/" title="Instagram" id="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/etecfernando" title="Facebook" id="facebook"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.youtube.com/@EtecFernandoPrestesCPS" title="Youtube" id="youtube"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </section>
        </aside>
    </div>
    <?php include(ABSPATH . "inc/foot.php")?>