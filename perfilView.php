    <?php $title = "Perfil"?>
    <?php include("inc/head.php")?>
    <?php include(DBAPI); ?>

    <body>
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
                                $codigo_base = base64_encode($codigo);

                                echo '<article class="post post-user">';
                                echo "<img src='posts/$fotoPost ' alt='Foto do Post'>";
                                echo "<h4 class='title-post-user' title='Clique e veja mais!'><a href='viewPost.php?codigo=$codigo_base'>" . $dados['titulo'] . "</a></h4>";
                                echo '<p class="date-post-user">' . $data_formatada . '</p>';
                                echo "<a href='viewPost.php?codigo=$codigo_base' title='Clique e veja mais!' class='btn btn-vermais'>Ler mais</a>";
                                echo '</article>';
                            }
                        }
                    }

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
        <?php include(ABSPATH . "inc/foot.php")?>