<?php $title = "Home" ?>
<?php include("inc/head.php") ?>
<div class="container">
    <main id="posts-container">
        <?php

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
            $codigo_base = base64_encode($codigo);

        

            echo '<article class="post">';
            echo "<img src='posts/$foto' alt='Foto do Post'>";
            echo "<h3 class='title' title='Clique e veja mais!'><a href='viewPost.php?codigo=$codigo_base'>" . $dados['titulo'] . "</a></h3>";
            echo '<p class="description">' . $dados["assuntoIntro"] . '</p>';
            echo '<p class="tag-post" >' . '#' . $dados["tags"] . '</p>';
            echo '<p class="author">' . $dados["autor"] . ' | ' . $data_formatada . '</p>';
            echo "<a href='viewPost.php?codigo=$codigo_base' title='Clique e veja mais!'>Ler mais</a>";
            echo '</article>';
        }
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
        <section id="categories">
            <h4>Hashtags</h4>
            <nav>
                <ul>
                    <?php

                    $queryTags = $conexao->query($sql);


                    while ($dados = mysqli_fetch_array($queryTags)) {
                        $timestamp = strtotime($dados['datePost']);
                        $data_formatada = date('d/m/Y H:i', $timestamp);

                        $codigo = $dados['codigo'];


                        echo '<li class="">';
                        echo '<p class="tag-container-post" >' . '#' . $dados["tags"] . '</p>';
                        echo '</li>';
                    }
                    mysqli_close($conexao);

                    ?>
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
<?php include("foot.php"); ?>
