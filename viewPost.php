<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Post</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        border: 1px solid #e50000;
        padding: 2px;
        border-radius: 2px;
        background-color: #e50000;
        color: #fff;
        transition: 0.4s;
    }

    .link-turne:hover b,
    .link-turne a:hover {
        color: #fff;
    }

    a:hover b {
        border: 1px solid #a70000;
        background-color: #a70000;
    }

    #foto-user {
        width: 24pt;
        margin-right: 5px;
    }

    h2 b {
        font-weight: normal;
        color: #000;
    }
</style>

<body>
    <?php include('./inc/header.php'); ?>
    <style>
        .invisible {
            display: none;
        }

        .form-area {
            width: 100%;
            background-color: #ffffff2f;
            font-weight: bold;
            color: #1b1b1b;
        }

        .form-comentario {
            font-weight: bold;
            color: #1b1b1b;
        }

        .author {
            margin-bottom: .5rem;
        }
    </style>
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php
            include('conexao.php');

            $codigo = $_GET['codigo'];
            $codigo_base = base64_encode($codigo);

            // criando a linha do  SELECT
            $sqlconsulta =  "select * from post where codigo = " . base64_decode($codigo_base) . ";";

            // executando instrução SQL
            $resultado = @mysqli_query($conexao, $sqlconsulta);
            if (!$resultado) {
                die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
            } else {
                $num = @mysqli_num_rows($resultado);
                if ($num == 0) {
                    echo "<strong style='font-size: 18px;'>Código: $codigo </strong> - Não localizado!!<br><br>";
                    echo "<div class='col-md-4'><a href='alteracao.php' class='btn btn-outline-primary w-100'>Voltar</a></div>";
                    exit;
                } else {
                    $dados = mysqli_fetch_array($resultado);
                }
            }

            $timestamp = strtotime($dados['datePost']);
            $data_formatada = date('d/m/Y H:i', $timestamp);

            if (empty($dados['foto'])) {
                $foto = 'Semfoto.png';
            } else {
                $foto = $dados['foto'];
            }
            echo '<article class="post">';
            echo "<img src='posts/$foto'alt='Foto do Post'>";

            echo "<script defer>
            document.addEventListener('DOMContentLoaded', function() {
                var likeButton = document.getElementById('likeButton');
                var dislikeButton = document.getElementById('deslikeButton');
                var isLiked = false; 
                var isDisliked = false;
    
                likeButton.addEventListener('click', function() {
                    // Alterna entre os ícones com base no estado atual
                    if (isLiked) {
                        likeButton.innerHTML = '<i class=\"far fa-thumbs-up\"></i>';
                    } else {
                        likeButton.innerHTML = '<i class=\"fas fa-thumbs-up\"></i>';
                    }
    
                    // Inverte o estado
                    isLiked = !isLiked;
    
                    // Desmarca o botão dislike quando o botão like é clicado
                    if (isLiked) {
                        dislikeButton.innerHTML = '<i class=\"far fa-thumbs-down\"></i>';
                        isDisliked = false;
                    }
                });
    
                deslikeButton.addEventListener('click', function() {
                    // Alterna entre os ícones com base no estado atual
                    if (isDisliked) {
                        dislikeButton.innerHTML = '<i class=\"far fa-thumbs-down\"></i>';
                    } else {
                        dislikeButton.innerHTML = '<i class=\"fas fa-thumbs-down\"></i>';
                    }
    
                    // Inverte o estado
                    isDisliked = !isDisliked;
    
                    // Desmarca o botão like quando o botão dislike é clicado
                    if (isDisliked) {
                        likeButton.innerHTML = '<i class=\"far fa-thumbs-up\"></i>';
                        isLiked = false;
                    }
                });
            });
                </script>";
            if (isset($_SESSION['tipoUser'])) {
                if ($_SESSION['tipoUser'] == "admin") {
                    echo '<div class="post-buttons"><div class="esquerda"><p class="codigo">Código do Post: ' . $codigo . '</p></div><div class="espacador"></div>';
                    echo "<div class='direita-edit'><a href='viewUpdatePost.php?codigo=$codigo' title='Editar'><i class='fa-regular fa-pen-to-square'></i></a></div>";
                    echo "<div class='direita'><a href='viewDeletePost.php?codigo=$codigo' title='Apagar'><i class='fa-solid fa-trash-can'></i></a></div></div>";
                }
            }

            $autor = $dados['autor'];

            echo '<h3 class="title">' . $dados["titulo"] . '</h3>';
            echo '<div class="tag-post" >' . '#' . $dados["tags"] . '</div>';
            echo '<div class="description">' . $dados["assuntoIntro"] . "</div><div class='description'>" . $dados["assuntoCompleto"] . '</div>';
            echo "<div class='share-container'><b class='text-like'>Avaliação do conteúdo:</b><span id='likeButton'><i class='fa-regular fa-thumbs-up'></i></span><span id='deslikeButton'><i class='fa-regular fa-thumbs-down'></i></span></div>";
            echo "<p class='author'><a href='view.php?nome=$autor'>" . $dados['autor'] . "</a> | " . $data_formatada . "</p>";
            echo "<form action='sendComent.php?codigo=$codigo' method='post'>";
            echo '<input class="form-control border-primary invisible" type="number" name="codigo" id="codigo" title="Não alterável!" value="' . $dados["codigo"] . '">';
            echo '<h2 class="title">Comentários: </h2>';

            $queryComentarios = "SELECT * FROM comentarios WHERE codigo_post = $codigo";

            $resultadoComentarios = mysqli_query($conexao, $queryComentarios);


            if ($resultadoComentarios) {
                while ($comentario = mysqli_fetch_assoc($resultadoComentarios)) {
                    if (empty($comentario['image_comentario'])) {
                        $foto = 'Semfoto.png';
                    } else {
                        $foto = $comentario['image_comentario'];
                    }

                    $comentario_id = base64_encode($comentario['comentario_id']);

                    echo '<div class="comentario">';
                    echo "  <div class='img-title-coment'>";
                    echo "     <img src='./img/$foto' class='image-coment' />";
                    echo "      <a href='view.php?id=$comentario[id_user]'><h5 class='title-comentario'>$comentario[nome_user]</h5></a>";
                    if (isset($_SESSION['login'])) {
                        if ($_SESSION['login'] === $comentario['login_user']) {
                            echo "<a href='viewDeleteComent.php?comentario_id=$comentario_id' class='btn btn-delete-coment'><i class='fa-solid fa-trash'></i></a>";
                        } else if ($_SESSION['tipoUser'] === "admin") {
                            echo "<a href='viewDeleteComent.php?comentario_id=$comentario_id' class='btn btn-delete-coment'><i class='fa-solid fa-trash'></i></a>";
                        }
                    }
                    echo "  </div>";
                    echo '  <p class="coment">' . $comentario["conteudo_comentario"] . '</p>';

                    echo '</div>';
                }
            } else {
                echo "Nenhum comentário encontrado.";
            }
            if (isset($_SESSION['login']) && $autor != $_SESSION['nome']) {
                echo '<textarea placeholder="Escreva aqui seu comentário" class="form-area" name="comentario" id="comentario" maxlength="1000" required></textarea>';
                echo '<button type="submit" class="btn-primary btn-mt-2"> Enviar <i class="fa-regular fa-paper-plane"></i></button>';
            } 
            else if (!isset($_SESSION['login'])){
                echo '<h4>Para comentar, faça <a href="./login.php" class="link-login">login</a> ou <a href="criandoConta.php" class="link-login">crie uma conta</a>.</h4>';
            }
            echo '</form>';
            echo '</article>';

            ?>
            <script>

            </script>
            <section id="related-posts">
                <h2>Posts Relacionados</h2>
                <div class="related-posts-container">
                    <?php
                    $sqlConsultaRelacionados = "SELECT * FROM post WHERE codigo != $codigo LIMIT 3";
                    $resultadoRelacionados = @mysqli_query($conexao, $sqlConsultaRelacionados);

                    if ($resultadoRelacionados) {
                        while ($dadosRelacionados = mysqli_fetch_array($resultadoRelacionados)) {
                            $timestampRelacionados = strtotime($dadosRelacionados['datePost']);
                            $dataFormatadaRelacionados = date('d/m/Y', $timestampRelacionados);

                            $imagemRelacionados = !empty($dadosRelacionados['foto']) ? 'posts/' . $dadosRelacionados['foto'] : 'Semfoto.png';

                            echo '<article class="related-post">';
                            echo "<img src='$imagemRelacionados' alt='Imagem do post relacionado' class='img-post-mais'>";
                            echo '<a href="viewPost.php?codigo=' . $dadosRelacionados["codigo"] . '"><h3 class="title">' . $dadosRelacionados['titulo'] . '</h3></a>';
                            echo '<p class="description description-max-w">' . $dadosRelacionados["assuntoIntro"] . '</p>';
                            echo '<p class="autor">' . $dadosRelacionados["autor"] . '</p>';
                            echo '<p class="date">Postado em: <strong>' . $dataFormatadaRelacionados . '</strong></p>';
                            echo '</article>';
                        }
                    }

                    mysqli_close($conexao);
                    ?>
                </div>
            </section>
        </main>
        <aside id="sidebar">
            <section id="search-bar">
                <a href="https://websai.cps.sp.gov.br/acesso/Login?ReturnUrl=%2FFormulario%2FLista">
                    <figure>
                        <img src="./img/websai.png" alt="WebSai" title="CPS pesquisa do WEBSAI 2023" class="img-websai">
                    </figure>
                </a>
            </section>
            <section id="categories">
                <h4>Links Úteis</h4>
                <nav>
                    <ul>
                        <li><a href="https://www.etecfernandoprestes.com.br/" title="Site Etec Fernando Prestes">Etec Fernando Prestes</a></li>
                        <li><a href="https://www.vestibulinhoetec.com.br/home/" title="Site Vestibulinho">Vestibulinho</a></li>
                        <li><a href="cursos.php" title="Cursos da Etec Fernando Prestes">Cursos</a></li>
                        <li><a href="./criadores.php" title="Veja os Criadores!">Criadores</a></li>
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