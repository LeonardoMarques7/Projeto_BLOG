    <?php $title = "Postagem"?>
    <?php include("inc/head.php")?>
    <?php include(DBAPI); ?>

    
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php

            // Recuperando o código
            $codigo = $_POST['codigo'];

            // Consulta para obter o nome do arquivo de foto associado a este post
            $sql_select_foto = "SELECT foto FROM post WHERE codigo = $codigo";
            $resultado_select_foto = mysqli_query($conexao, $sql_select_foto);

            if (!$resultado_select_foto) {
                echo '<a href="index.php" class="btn btn-primary w-100">Voltar</a>';
                die('<b>Query Inválida:</b>' . mysqli_error($conexao));
            } else {
                $linha = mysqli_fetch_assoc($resultado_select_foto);
                $nome_foto = $linha['foto'];

                // Excluir a foto associada
                $caminho_foto = "./posts/" . $nome_foto; // Substitua pelo caminho real da sua pasta e arquivo
                if($nome_foto !== "semfoto.png") {
                    if (file_exists($caminho_foto) && is_file($caminho_foto)) {
                        unlink($caminho_foto); 
                    } else {
                        echo "A foto não foi encontrada ou é um diretório.";
                    }
                }

                // Criar a consulta DELETE
                $sqldelete = "DELETE FROM post WHERE codigo = $codigo";

                // Executar a consulta DELETE
                $resultado = mysqli_query($conexao, $sqldelete);

                if (!$resultado) {
                    echo '<a href="index.php" class="btn btn-primary w-100">Voltar</a>';
                    die('<b>Query Inválida:</b>' . mysqli_error($conexao));
                } else {
                    include("carregando.php");
                }
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