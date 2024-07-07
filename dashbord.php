<?php $title = "Modo ADM"?>
<?php include("inc/head.php")?>
    <div class="container">
        <main id="posts-container">
            <?php if(isset($_SESSION['message'])) {
                    echo '<div class="message">' . $_SESSION['message'] . '</div>';
                    clear_message();
                }?>
            <a href="./criaPost.php"><button class="btn-add" style="text-transform: uppercase; font-weight: bold; align-items: center;"><i class="fa-solid fa-square-plus"></i> Adicione um Post</button></a><br><br>
            <?php
                
                // Verifique se o usuário está logado
                if (!isset($_SESSION['login']) || $_SESSION['tipoUser'] !== "admin") {
                    // Se não estiver logado, redirecione para a página de login
                    header("Location: index.php");
                    exit;
                }
            
                include("pesquisador.php");
            

                $query = $conexao->query($sql);

                while ($dados = mysqli_fetch_array($query)) {
                    $timestamp = strtotime($dados['datePost']);
                    $data_formatada = date('d/m/Y H:i', $timestamp);

                    if (empty($dados['foto'])) {
                        $foto = 'Semfoto.png';
                    } else {
                        $foto = $dados['foto'];
                    }

                    $codigo = $dados['codigo'];
                    $codigo_cripto = base64_encode($codigo);

                    echo '<article class="post">';
                    echo "<img src='posts/$foto' alt='Foto do Post'>";
                    echo '<div class="post-buttons"><div class="esquerda"><p class="codigo">Código do Post: ' . $dados["codigo"] . '</p></div><div class="espacador"></div>';
                    echo "<div class='direita-edit'><a href='viewUpdatePost.php?codigo=$codigo_cripto' title='Editar'><i class='fa-regular fa-pen-to-square'></i></a></div>";
                    echo "<div class='direita'><a href='viewDeletePost.php?codigo=$codigo_cripto' title='Apagar'><i class='fa-solid fa-trash-can'></i></a></div></div>";
                    echo "<h3 class='title' title='Clique e veja mais!'><a href='viewPost.php?codigo=$codigo_cripto'>" . $dados['titulo'] . "</a></h3>";
                    echo '<p class="description">' . $dados["assuntoIntro"] . '</p>';
                    echo '<p class="tag-post" >' . '#' . $dados["tags"] . '</p>';
                    echo '<p class="author">' . $dados["autor"] . ' | ' . $data_formatada . '</p>';
                    echo "<a href='viewPost.php?codigo=$codigo_cripto' title='Clique e veja mais!'>Ler mais</a>";
                    echo '</article>';
                }
                mysqli_close($conexao);
            ?>
        </main>
        <aside id="sidebar">
            <section id="search-bar">
                <h4>Busca</h4>
                <div id="form">
                    <input type="search" placeholder="Pesquise no blog" id="pesquisar">
                    <button type="button" class="btn-busca" onclick="searchData()"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </section>
            <section id="categories">
                <h4>Links Úteis</h4>
                <nav>
                    <ul>
                        <li><a href="https://www.etecfernandoprestes.com.br/" title="Site Etec Fernando Prestes">Etec Fernando Prestes</a></li>
                        <li><a href="https://www.vestibulinhoetec.com.br/home/" title="Site Vestibulinho">Vestibulinho</a></li>
                        <li><a href="cursos.php" title="Cursos da Etec Fernando Prestes">Cursos</a></li>
                        <li><a href="./suporte.php">Suporte</a></li>
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
    <?php include(FOOTER_TEMPLATE); ?>