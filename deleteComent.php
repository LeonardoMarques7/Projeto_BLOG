    <?php $title = "Deletando o comentário"?>
    <?php include("inc/head.php")?>
    <?php include(DBAPI); ?>
    <link rel="stylesheet" href="./css/style-post.css">
    <div class="container">
        <main id="posts-container">
            <?php
                include('conexao.php');

                if (!isset($_SESSION['login'])) {
                    // Se não estiver logado, redirecione para a página de login
                    header("Location: login.php");
                    exit;
                }

                // Recuperando o código
                $codigo = $_POST['codigo'];

                // Criar a consulta DELETE
                $sqldelete = "DELETE FROM comentarios WHERE comentario_id = '$codigo'";

                // Executar a consulta DELETE
                $resultado = mysqli_query($conexao, $sqldelete);

                if (!$resultado) {
                    echo '<a href="index.php" class="btn btn-primary w-100">Voltar</a>';
                    die('<b>Query Inválida:</b>' . mysqli_error($conexao));
                } else {
                    include("carregando.php");
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
    <footer>
        <?php include("footer.php"); ?>
    </footer>
    
    <script src="./js/script.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>
</html>