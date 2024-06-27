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
    <?php include('./inc/header.php'); include("conexao.php"); ?>
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

        .like {
            color: #39ff;
        }
    </style>
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php

                $codigo = $_GET['codigo'];
                $codigo_base = base64_decode($codigo);
                $codigo_cripto = base64_encode($codigo);

                // criando a linha do SELECT
                $sqlconsulta = "SELECT * FROM post WHERE codigo = " . $codigo_base . ";";

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
                echo "<img src='posts/$foto'alt='Foto do Post' class='image-post'>";
                if (isset($_SESSION['tipoUser'])) {
                    if ($_SESSION['tipoUser'] == "admin") {
                        echo '<div class="post-buttons"><div class="esquerda"><p class="codigo">Código do Post: ' . $codigo_base . '</p></div><div class="espacador"></div>';
                        echo "<div class='direita-edit'><a href='viewUpdatePost.php?codigo=$codigo' title='Editar'><i class='fa-regular fa-pen-to-square'></i></a></div>";
                        echo "<div class='direita'><a href='viewDeletePost.php?codigo=$codigo' title='Apagar'><i class='fa-solid fa-trash-can'></i></a></div></div>";
                    }
                }

                $autor = $dados['autor'];

                $codigo = $dados["codigo"];
                $codigo_cripto_coment = base64_encode($codigo);
                $url_base = 'https://blog-fp.wuaze.com/viewPost.php?codigo=';
                $url_compartilhamento = $url_base . $codigo_cripto_coment;

                echo '<div class="title-share-container">';
                echo '<h3 class="title title-share">' . htmlspecialchars($dados["titulo"]) . '</h3>';
                echo '<div class="social-share-icons">
                    <a href="https://api.whatsapp.com/send?text=' . urlencode($dados['titulo'] . ". Para acessar a postagem, clique no link: ". $url_compartilhamento) .  '" target="_blank" title="Compartilhe no WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=' . urlencode($url_compartilhamento) . '" target="_blank" title="Compartilhe no Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=' . urlencode($url_compartilhamento) . '&text=' . urlencode($dados['titulo'] . ". Para acessar a postagem, clique no link: ") . '" target="_blank" title="Compartilhe no X">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://telegram.me/share/url?url=' . urlencode($url_compartilhamento) . '&text=' . urlencode('Postagem no Blog FP') . '" target="_blank" title="Compartilhe no Telegram">
                        <i class="fab fa-telegram"></i>
                    </a>
                </div>';
                echo '</div>';
               
                echo '<div class="tag-post">' . '#' . $dados["tags"] . '</div>';
               
                echo '<div class="description">' . $dados["assuntoIntro"] . "</div><div class='description'>" . $dados["assuntoCompleto"] . '</div>';


                // Consulta para obter o número de curtidas para o post específico
                $sql_count_likes = "SELECT COUNT(*) FROM likes WHERE id_post = ?";
                $stmt_count_likes = $conexao->prepare($sql_count_likes);
                $stmt_count_likes->bind_param('i', $codigo);
                $stmt_count_likes->execute();
                $stmt_count_likes->bind_result($likes);
                $stmt_count_likes->fetch();
                $stmt_count_likes->close();

                if(isset($_SESSION['login'])):
                    echo "<span class='share-container'>";
                    echo "<span class='area-like'><span id='likeButton'><i class='fa-regular fa-heart'></i></span>";
                    echo "<span id='likeCount'>$likes</span></span>";
                    echo "</span>";
                endif;

                echo "<p class='author'><a href='view.php?nome=$autor'>" . $dados['autor'] . "</a> | " . $data_formatada . "</p>";

                echo "<form action='sendComent.php?codigo=$codigo_cripto_coment' method='post'>";
                echo '<input class="form-control border-primary invisible" type="number" name="codigo" id="codigo" title="Não alterável!" value="' . $codigo_cripto_coment . '">';
                echo '<h2 class="title">Comentários: </h2>';

                $queryComentarios = "SELECT * FROM comentarios WHERE codigo_post = $codigo_base"; // codigo_base = 22222 por exemplo!
                $resultadoComentarios = mysqli_query($conexao, $queryComentarios);
                $resultadoDoComent = $resultadoComentarios->num_rows;

                if ($resultadoDoComent == 0) {
                    echo "<span class='text-coment-null'>Não foi encontrado nenhum comentário</span>";
                }

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
                        echo "      <a href='view.php? id=$comentario[id_user]'><h5 class='title-comentario'>$comentario[nome_user]</h5></a>";
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
                } else if (!isset($_SESSION['login'])) {
                    echo '<h4>Para comentar, faça <a href="./login.php" class="link-login">login</a> ou <a href="criandoConta.php" class="link-login">crie uma conta</a>.</h4>';
                }
                echo '</form>';
                echo '</article>'
                ?>
                <script>
                    
            document.addEventListener('DOMContentLoaded', function() {
                var likeButton = document.getElementById('likeButton');
                var likeCount = document.getElementById('likeCount');

                var userId = "<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>";

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'checkUserLike.php', true);

                var formData = new FormData();
                formData.append('codigo', "<?php echo $codigo; ?>");
                formData.append('userId', userId);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var result = xhr.responseText;

                        if (result === 'true') {
                            likeButton.innerHTML = '<i class="fas fa-heart like"></i>';
                            likeButton.classList.add('liked');
                        } else {
                            likeButton.innerHTML = '<i class="fa-regular fa-heart like"></i>';
                            likeButton.classList.remove('liked'); 
                        }
                    } else {
                        console.error('Erro ao verificar as curtidas do usuário: ' + xhr.statusText);
                    }
                };

                xhr.send(formData);

                likeButton.addEventListener('click', function() {
                    if (likeButton.classList.contains('liked')) {
                        updateLikes('deslike');
                    } else {
                        updateLikes('like');
                    }
                });

                function updateLikes(action) {
                    var updateXHR = new XMLHttpRequest();
                    updateXHR.open('POST', 'updateLikes.php', true);

                    updateXHR.onload = function() {
                        if (updateXHR.status === 200) {
                            var likes = parseInt(updateXHR.responseText);
                            likeCount.textContent = likes;

                            if (action === 'like') {
                                likeButton.innerHTML = '<i class="fas fa-heart like"></i>';
                                likeButton.classList.add('liked'); 
                            } else if (action === 'deslike') {
                                likeButton.innerHTML = '<i class="fa-regular fa-heart like"></i>';
                                likeButton.classList.remove('liked'); 
                            }
                        } else {
                            console.error('Erro ao atualizar as curtidas: ' + updateXHR.statusText);
                        }
                    };

                    var updateFormData = new FormData();
                    updateFormData.append('codigo', "<?php echo $codigo; ?>");
                    updateFormData.append('userId', userId);
                    updateFormData.append('action', action);

                    updateXHR.send(updateFormData);
                }
            });
            </script>

        <section id="related-posts">
                <h2>Posts Relacionados</h2>
                <div class="related-posts-container">
                    <?php
                    $sqlConsultaRelacionados = "SELECT * FROM post WHERE codigo != $codigo_base LIMIT 3";
                    $resultadoRelacionados = @mysqli_query($conexao, $sqlConsultaRelacionados);

                    if ($resultadoRelacionados) {
                        while ($dadosRelacionados = mysqli_fetch_array($resultadoRelacionados)) {
                            $timestampRelacionados = strtotime($dadosRelacionados['datePost']);
                            $dataFormatadaRelacionados = date('d/m/Y', $timestampRelacionados);

                            $codigo_cripto_posts_relacionados = base64_encode($dadosRelacionados["codigo"]);

                            $imagemRelacionados = !empty($dadosRelacionados['foto']) ? 'posts/' . $dadosRelacionados['foto'] : 'Semfoto.png';

                            echo '<article class="related-post">';
                            echo "<img src='$imagemRelacionados' alt='Imagem do post relacionado' class='img-post-mais'>";
                            echo '<a href="viewPost.php?codigo=' . $codigo_cripto_posts_relacionados . '"><h3 class="title">' . $dadosRelacionados['titulo'] . '</h3></a>';
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
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=667b5a96bcdd3d0019d7e65b&product=inline-share-buttons&source=platform" async="async" defer></script>
    <script src="./js/script.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>

</html>