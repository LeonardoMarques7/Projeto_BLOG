<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Blog | Perfil</title>
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

        .post img{
            border-radius: 5px !important;
            margin-bottom: 0px;
        }

        .image-user {
            border-radius: 5px !important;
        }

        .post-user {
            width: 50%;
        }

        .container-post-user {
            margin-top: 1rem;
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        @media (max-width: 900px) {
            .container-post-user {
                flex-wrap: wrap;

            }
            
            .post-user {
                width: 100%;
            }
        }

        .author-post-user {
            font-weight: bold;
            font-size: .9rem;
            opacity: .6;
        }

        .alert-message {
            margin-top: 10px;
        }
    </style>
    <body>
        <?php include("inc/header.php") ?>
        <div class="container">
            <main id="posts-container">
                <div class="faixa-cards ">
                    <div class="faixa-cards">
                        <div class="perfil">
                            <img src='./img/<?php echo $foto?>' alt="" />
                            <div class="text">
                                <h2><?php echo $_SESSION['nome']?><button class="button-view-edit"><a href="editPerfil.php" class="link-edit"><i class="fa-solid fa-pen"></i></a></button></h2>
                                <b><?php echo $_SESSION['profissao']?></b>
                                <br>
                                <br>
                                <?php if($_SESSION['linkInsta'] != "") :?>
                                <a
                                    href="<?php echo $_SESSION['linkInsta']?>"
                                    ><i class="fa-brands fa-instagram"></i
                                ></a>
                                <?php endif; ?>
                                <?php if ($_SESSION['linkTwitter'] != "") :?>
                                <a href="<?php echo $_SESSION['linkTwitter']?>"
                                    ><i class="fa-brands fa-twitter"></i
                                ></a>
                                <?php endif; ?>
                                <?php if ($_SESSION['linkFace'] != "") : ?>
                                <a
                                    href="<?php echo $_SESSION['linkFace']?>"
                                    ><i class="fa-brands fa-facebook"></i
                                ></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-post-user">
                <?php
                    include("conexao.php");
                    include("pesquisador.php");


                    $foto = $_SESSION['foto'];
                    $login = $_SESSION['nome'];

                    // Consulta SQL corrigida (substitua 'sua_coluna' pelo nome real da coluna)
                    $sqlconsulta = "SELECT * FROM post WHERE autor = '$login'";

                    // Executando instrução SQL de forma segura com prepared statement
                    $resultado = mysqli_query($conexao, $sqlconsulta);
                    if (!$resultado) {
                        die('<b>Query Inválida:</b>' . mysqli_error($conexao));
                    } else {
                        $num = mysqli_num_rows($resultado);

                        if ($num == 0) {
                            echo '<div class="alert-message"><b class="alert-user">Esse usuário ainda não fez nenhum post...</b></div>';
                        } else {
                            while($dados = mysqli_fetch_array($resultado)) {
                                $timestamp = strtotime($dados['datePost']);
                                $data_formatada = date('d/m/Y H:i', $timestamp);

                                if (empty($dados['foto'])) {
                                    $fotoPost = 'Semfoto.png';
                                } else {
                                    $fotoPost = $dados['foto'];
                                }

                                $codigo = $dados['codigo'];

                                echo '<article class="post post-user">';
                                echo "<img src='posts/$fotoPost ' alt='Foto do Post'>";
                                echo "<h3 class='title-post-user' title='Clique e veja mais!'><a href='viewPost.php?codigo=$codigo'>" . $dados['titulo'] . "</a></h3>";
                                echo '<p class="author-post-user">' . $dados["autor"] . ' | ' . $data_formatada . '</p>';
                                echo "<a href='viewPost.php?codigo=$codigo' title='Clique e veja mais!'>Ler mais</a>";
                                echo '</article>';
                            }
                        }
                    }

                    mysqli_close($conexao);
                ?>
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
                            <li>
                                <a 
                                    href="./suporte.php">
                                    Suporte</a
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
