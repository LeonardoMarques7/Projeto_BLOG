<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Criando Post</title>
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
    <?php
    include("conexao.php");

    function formatadata($date, $formato)
    {
        $dt = new DateTime($date, new DateTimeZone("America/Sao_Paulo"));
        return $dt->format($formato);
    }
    ?>
    <?php
    include("inc/header.php");

    if (!isset($_SESSION['login']) || $_SESSION['tipoUser'] !== "admin") {
        // Se não estiver logado, redirecione para a página de login
        $_SESSION['message'] = "Você precisa ser administrador!";
        header("Location: login.php");
        exit;
    }
    $codigo = rand(10000, 99999);
    ?>
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <form name="produto" action="criarPost.php" class="form border rounded shadow-lg" method="post" enctype="multipart/form-data"><br><br>
                <h1 style="color: #39f; text-transform: uppercase;"><i class="fa-solid fa-square-plus"></i> Criando Post</h1><br>
                <div class="col text-start">
                    <b>Imagem do Post:</b><br><input class="form-control border-primary input-file" type="file" name="arquivo" id="arquivo" title="Imagem do Post">
                </div><br>
                <div class="col text-start">
                    <b>Código do Post:</b><br><input class="form-control border-primary" type="number" placeholder="Digite o Código do Post" name="codigo" id="codigo" title="Digite o Código do Post" readonly value="<?php echo $codigo?>"> 
                </div><br>
                <div class="col text-start">
                    <b>Título do Post:</b><br><input class="form-control border-primary" placeholder="Digite o Título" type="text" name="titulo" id="titulo" maxlength="80" title="Digite o Título" required>
                </div><br>
                <div class="col text-start" required>
                <script src="https://cdn.tiny.cloud/1/m603wx49uqdb6gnhe5qjqjqkb6ozgucd5p1bginqh8359f9v/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
                    <b>Assunto Introdutório do Post:</b><br>
                    <textarea name="assuntoIntro">
                    </textarea>
                </div><br>
                <div class="col text-start" required>
                    
                    <b>Assunto Completo do Post:</b><br>
                    <textarea name="assuntoCompleto" class="textareaAssunto">
                    </textarea>
                </div><br>
                <div class="col text-start">
                    <b>Tag do Post: </b>
                    <div class="tag-container">
                        <ul class="d-flex">
                            <label for="tag-input">#</label>
                            <input type="text" class="tag-input" name="tag-input" id="tag-input" placeholder="Digite a Tag e pressione ENTER" title="Digite a TAG e pressione ENTER!" maxlength="19">
                        </ul>
                        <div class="tags">
                            <ul>

                            </ul>
                        </div>
                    </div>
                    <script>
                        const tags = document.querySelector(".tags ul");
                        const tag_input = document.querySelector(".tag-input");

                        tag_input.addEventListener('keydown', (e) => {
                            if (e.key === "Enter") {
                                const getUserInput = tag_input.value;

                                // Remova todas as tags existentes
                                while (tags.firstChild) {
                                    tags.removeChild(tags.firstChild);
                                }

                                if (getUserInput.trim() !== "") {
                                    const tag = document.createElement('li');
                                    tag.textContent = getUserInput;
                                    tags.appendChild(tag);

                                    const remove = document.createElement('span');
                                    remove.textContent = "X";
                                    tag.appendChild(remove);
                                    remove.classList.add("remove");

                                    remove.addEventListener('click', () => {
                                        tag.style.display = "none";
                                        tag_input.value = "";
                                    });
                                }
                            }
                        });
                    </script>
                </div><br>
                <div class="col text-start dataCad">
                    <input class="form-control text-center border-primary" type="hidden" name="datePost" id="datePost" placeholder="A data será informada só quando enviar!" title="Digite data do Post" disabled></input>
                </div>
                <div class="d-grid col-md-9">
                    <button class="btn btn-primary" type="submit" title="Enviar" style="color: 444;"><i class="fa-regular fa-paper-plane"></i> Enviar</button>
                    <button class="btn btn-outline-danger shadow" type="reset" title="Limpar"><i class="fa-solid fa-trash"></i> Limpar</button>
                    <a href="dashbord.php"><button class="btn btn-outline-danger shadow" type="button" title="Voltar"><i class="fa-solid fa-rotate-left"></i> Cancelar</button></a>
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
    <script src="./js/script-post.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>

</html>