<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Editando</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
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
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php
            include('conexao.php');

            if (!isset($_SESSION['login']) || $_SESSION['tipoUser'] !== "admin") {
                // Se não estiver logado, redirecione para a página de login
                $_SESSION['message'] = "Você precisa ser administrador!";
                header("Location: login.php");
                exit;
            }

            $codigo = $_GET['codigo'];

            // criando a linha do  SELECT
            $sqlconsulta =  "select * from post where codigo = $codigo";

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

            mysqli_close($conexao);
            if (empty($dados['foto'])) {
                $foto = 'Semfoto.png';
            } else {
                $foto = $dados['foto'];
            }
            ?>
            <form name="produto" style="padding: 50px; padding-top: 0px;" action="alterarPost.php" class="form border rounded shadow-lg" method="post" enctype="multipart/form-data"><br><br>
                <h1 style="color: #39f;"><i class="fa-solid fa-square-pen"></i> Editando Post</h1><br>
                <div class="col form-control">
                    <img src="<?php echo "posts/$foto" ?>" style="max-width: 100%; margin: 0 auto;" alt="Foto do Post">
                </div><br>
                <div class="col text-start">
                    <b>Imagem do Post:</b><br><input class="form-control border-primary input-file" type="file" name="arquivo" id="arquivo" title="Imagem do Post" value="<?php echo $foto; ?>">
                </div><br>
                <div class="col text-start">
                    <b>Código do Post:</b><br><input class="form-control border-primary" type="number" name="codigo" id="codigo" title="Não alterável!" value="<?php echo $dados['codigo']; ?>" readonly>
                </div><br>
                <div class="col text-start">
                    <b>Título do Post:</b><br><input class="form-control border-primary" placeholder="Digite o Título" type="text" name="titulo" id="titulo" maxlength="80" title="Digite o Título" value="<?php echo $dados['titulo']; ?>">
                </div><br>
                <div class="col text-start">
                    <script src="https://cdn.tiny.cloud/1/m603wx49uqdb6gnhe5qjqjqkb6ozgucd5p1bginqh8359f9v/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

                    <script>
                    tinymce.init({
                        selector: 'textarea',   
                        plugins: 'paste link',
                        toolbar: 'undo redo | bold italic underline strikethrough | link | checklist numlist bullist | emoticons charmap | removeformat',
                        menubar: false,
                        statusbar: false,
                        tinycomments_mode: 'embedded',
                        tinycomments_author: 'Author name',
                        mergetags_list: [
                        { value: 'First.Name', title: 'First Name' },
                        { value: 'Email', title: 'Email' },
                        ],
                        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
                        content_style: 'body { background-color: #f0f0f0; }',
                        setup: function (editor) {
                            editor.on('init', function () {
                                // Remova o tamanho da textarea
                                editor.getContainer().style.height = '300px';
                                editor.getContainer().style.width = 'auto';
                                editor.getContainer().style.maxWidth = '490px';
                            });
                        }
                    });
                    </script>
                    <b>Assunto Introdutório do Post:</b><br>
                    <textarea name="assuntoCompleto" class="textareaAssunto" value='<?php echo $dados['assuntoIntro']; ?>'><?php echo $dados['assuntoIntro']; ?>
                    </textarea>
                </div><br>
                <div class="col text-start">
                    <b>Assuno Completo do Post:</b><br><textarea name="assuntoCompleto" id="assuntoCompleto" class="form-control" value='<?php echo $dados['assuntoCompleto']; ?>'><?php echo $dados['assuntoCompleto']; ?></textarea><br>
                </div><br>
                <div class="col text-start">
                    <b>Tag do Post: </b>
                    <div class="tag-container">
                        <ul class="d-flex">
                            <label for="tag-input">#</label>
                            <input type="text" class="tag-input" name="tag-input" id="tag-input" placeholder="Digite a Tag e pressione ENTER" title="Digite a TAG e pressione ENTER!" maxlength="19" value="<?php echo $dados['tags']; ?>">
                        </ul>
                        <div class="tags">
                            <ul>

                            </ul>
                        </div>
                    </div>
                </div><br>
                <div class="col text-start">
                    <b>Data de Cadastro do Post:</b><br><input class="form-control text-center border-primary" name="datePost" id="datePost" type="datetime-local" title="A data será envianda após a alteração!" value="<?php echo $dados['datePost']; ?>" disabled></input>
                </div><br>
                <div class="d-grid col-md-9">
                    <button class="btn btn-primary" type="submit" title="Enviar" style="color: 444;"><i class="fa-regular fa-paper-plane"></i> Enviar</button>
                    <button class="btn btn-outline-danger shadow" type="reset" title="Limpar"><i class="fa-solid fa-trash"></i> Limpar</button>
                    <a href="dashbord.php"><button class="btn btn-outline-danger" type="button" title="Voltar"><i class="fa-solid fa-rotate-left"></i> Cancelar</button></a>
                </div>
                <br><br>
            </form>
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