<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Home</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style.alert.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
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

    body {
        display: none;
    }

    a b {
        font-weight: bold;
        font-size: 12px;
        border: 1px solid #39f;
        padding: 2px;
        border-radius: 2px;
        background-color: #39f;
        color: #fff;
        transition: 0.4s;
    }

    .link-turne:hover b,
    .link-turne a:hover {
        color: #fff;
    }

    a:hover b {
        border: 1px solid #39f;
        background-color: #39f;
    }

    #foto-user {
        width: 24pt;
        margin-right: 5px;
    }

    h2 b {
        font-weight: normal;
        color: #000;
    }

    .hide {
        display: none;
    }

    .center {
        justify-content: center;
    }

    .card img {
        border-radius: 10px !important;
    }

    .post img {
        border-radius: 5px !important;
        margin-bottom: 0px;
    }

    .author-post-user b {
        color: #39f;
        opacity: .9;
    }


    .post img {
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
            <div class="faixa-cards">
                <div class="faixa-cards">
                    <?php
                    include("conexao.php");
                    include("pesquisador.php");

                    $id = isset($_GET['id']) ? $_GET['id'] : null;
                    $nome = isset($_GET['nome']) ? $_GET['nome'] : null;

                    if (!$id && !$nome) {
                        echo "ID ou nome não foram fornecidos.";
                        exit;
                    }

                    // Consulta para obter informações do usuário
                    if ($id) {
                        $sqlconsulta =  "SELECT * FROM users WHERE id = $id";
                    } else {
                        $sqlconsulta =  "SELECT * FROM users WHERE nome = '$nome'";
                    }

                    $resultado = mysqli_query($conexao, $sqlconsulta);

                    if (!$resultado) {
                        die('<b>Query Inválida:</b>' . mysqli_error($conexao));
                    } else {
                        $num = mysqli_num_rows($resultado);
                        if ($num == 0) {
                            echo "<strong style='font-size: 18px;'>Usuário não localizado!</strong><br><br>";
                            echo "<div class='col-md-4'><a href='alteracao.php' class='btn btn-outline-primary w-100'>Voltar</a></div>";
                            exit;
                        } else {
                            $dados = mysqli_fetch_array($resultado);
                        }

                        $autor = $dados['nome'];
                        $foto = $dados['foto'];

                        echo '<div class="perfil">';
                        echo "<img src='./img/$foto' alt='' />";
                        echo '<div class="text">';
                        echo '<h2>' . $dados["nome"] . '</h2>';
                        echo '<b>' . $dados["profissao"] . '</b>';
                        echo '<br><br>';
                        if (!empty($dados['instagram'])) {
                            echo '<a href="' . $dados['instagram'] . '"><i class="fa-brands fa-instagram"></i></a>';
                        }
                        if (!empty($dados['twitter'])) {
                            echo '<a href="' . $dados['twitter'] . '"><i class="fa-brands fa-twitter"></i></a>';
                        }

                        if (!empty($dados['facebook'])) {
                            echo '<a href="' . $dados['facebook'] . '"><i class="fa-brands fa-facebook"></i></a>';
                        }
                        echo '</div></div></div></div><div class="container-post-user">';

                        $sqlPosts = "SELECT * FROM post WHERE autor = '$autor'";
                        $resultadoPosts = mysqli_query($conexao, $sqlPosts);

                        if ($resultadoPosts) {
                            while ($post = mysqli_fetch_array($resultadoPosts)) {
                                $timestamp = strtotime($post['datePost']);
                                $data_formatada = date('d/m/Y H:i', $timestamp);

                                $fotoPost = empty($post['foto']) ? 'Semfoto.png' : $post['foto'];

                                $codigo = $post['codigo'];
                                $codigo_base = base64_encode($codigo);

                                // Exibir informações do post
                                echo '<article class="post post-user">';
                                echo "<img src='posts/$fotoPost' alt='Foto do Post'>";
                                echo "<h3 class='title-post-user' title='Clique e veja mais!'><a href='viewPost.php?codigo=$codigo_base'>" . $post['titulo'] . "</a></h3>";
                                echo '<p class="author-post-user"><b>' . $post["autor"] . '</b> | ' . $data_formatada . '</p>';
                                echo "<a href='viewPost.php?codigo=$codigo_base' title='Clique e veja mais!'>Ler mais</a>";
                                echo '</article>';
                            }
                        } else {
                            die('<b>Query Inválida:</b>' . mysqli_error($conexao));
                        }

                        mysqli_close($conexao);
                    }
                    ?>



                </div>
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