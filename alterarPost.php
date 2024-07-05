<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Editando Post</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include("inc/header.php") ?>
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php

            if (!isset($_SESSION['login']) || $_SESSION['tipoUser'] !== "admin") {
                // Se não estiver logado, redirecione para a página de login
                $_SESSION['message'] = "Você precisa ser administrador!";
                header("Location: login.php");
                exit;
            }
            include('conexao.php');
            $codigo = $_POST['codigo'];

            $titulo = $_POST['titulo'];
            $assuntoIntro = $_POST['assuntoIntro'];
            $assuntoCompleto = $_POST['assuntoCompleto'];
            $tags = $_POST['tag-input'];
            $foto = $_FILES['arquivo']['name'];
            $foto_tmp = $_FILES['arquivo']['tmp_name'];

            // Pegando a hora atual
            $data_formatada = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));

            $datePost = $data_formatada->format("Y-m-d H:i");

            // Verificar se um novo arquivo foi enviado
            if (!empty($foto)) {
                // Processar o upload do novo arquivo e mover para o destino desejado
                move_uploaded_file($foto_tmp, "posts/" . $foto);

                // Atualizar o campo "imagem" na consulta SQL apenas se um novo arquivo foi enviado
                $sqlupdate = "UPDATE post SET foto='$foto', titulo='$titulo', assuntoIntro='$assuntoIntro', assuntoCompleto='$assuntoCompleto', tags='$tags', datePost='$datePost' WHERE codigo='$codigo'";
            } else {
                // Se nenhum novo arquivo foi enviado, manter o valor atual do campo "imagem"
                $sqlupdate = "UPDATE post SET titulo='$titulo', assuntoIntro='$assuntoIntro', assuntoCompleto='$assuntoCompleto', tags='$tags', datePost='$datePost' WHERE codigo='$codigo'";
            }


            // executando instrução SQL
            $resultado = @mysqli_query($conexao, $sqlupdate);
            if (!$resultado) {
                echo '<a href="index.php" class="btn btn-outline-primary w-100">Voltar</a>';
                die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
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
                        <li><a href="./criadores.php" title="Veja os Criadores!">Criadores</a></li>
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