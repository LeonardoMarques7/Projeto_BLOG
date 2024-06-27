<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Home</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Verificação -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style.alert.css">
    <!-- Fontes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
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

    /* Dark theme styles */
    .dark-theme-dropdown .select2-container--open .select2-dropdown {
        background-color: #333;
        /* Dark background color */
        color: #fff;
        /* Light text color */
    }

    .dark-theme-dropdown .select2-selection--single,
    .dark-theme-dropdown .select2-selection--single .select2-selection__rendered,
    .dark-theme-dropdown .select2-selection--single .select2-selection__arrow {
        background-color: #555;
        /* Darker background color for selection area and arrow */
        color: #fff;
        /* Light text color for selection area and arrow */
    }

    .dark-theme-dropdown .select2-search__field {
        border: 1px solid #555;
        /* Dark border color for the search box */
        border-radius: 4px;
        color: #fff;
        /* Light text color for the search box */
    }

    .dark-theme-dropdown .select2-results__option {
        background-color: #333;
        /* Dark background color for dropdown options */
        color: #fff;
        /* Light text color for dropdown options */
    }

    @media (max-width: 600px) {
        .form-cria-login {
            max-width: 300px;
        }
    }
</style>

<body>
    <?php include("inc/header.php") ?>

    <div class="container">
        <main id="posts-container">
            <?php
            include("conexao.php");
            ?>
            <?php if(!empty($_SESSION['messageErrorLogin'])){
                echo "<span class='message-captcha'>Falha na validação do reCAPTCHA. Tente novamente.<br></span>";
                clear_message();
            }
            ?>
            <form class="form-cria-login" action="criarConta.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="label-cria-login">Nome<span class="span-form">*</span> </label>
                    <input type="text" name="nome" class="input-cria-login" required placeholder="Digite seu nome" required>
                </div>

                <div class="form-group">
                    <label class="label-cria-login">Login<span class="span-form">*</span></label>
                    <input type="email" name="login" class="input-cria-login" required placeholder="Digite seu login (gmail)">
                </div>

                <div class="form-group">
                    <label class="label-cria-login">Senha<span class="span-form">*</span></label>
                    <input type="password" name="senha" class="input-cria-login" required placeholder="Digite sua senha">
                </div>

                <div class="form-group">
                    <label class="label-cria-login">Tipo do usuário </label>
                    <select name="tipoUser" class="select-cria-login tipoUser-select" required>
                        <?php if (isset($_SESSION['login']) && $_SESSION['tipoUser'] === "admin") : ?>
                            <option value="admin">Administrador</option>
                        <?php endif; ?>
                        <option value="user" selected>Usuário</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="label-cria-login">Profissão </label>
                    <input type="text" name="profissao" class="input-cria-login" placeholder="Digite sua profissão">
                </div>

                <!-- Social Media Section -->
                <details>
                    <summary class="label-cria-login summary-user">Quer adicionar suas redes socias?</summary>
                    <div class="form-group icon-input">
                        <label class="label-cria-login"><i class="fa-brands fa-instagram"></i></label>
                        <input type="text" name="instagram" class="input-cria-login" placeholder="Digite seu Instagram">
                    </div>
                    <div class="form-group icon-input">
                        <label class="label-cria-login"><i class="fa-brands fa-twitter"></i></label>
                        <input type="text" name="twitter" class="input-cria-login" placeholder="Digite seu Twitter">
                    </div>
                    <div class="form-group icon-input">
                        <label class="label-cria-login"><i class="fa-brands fa-facebook"></i></label>
                        <input type="text" name="facebook" class="input-cria-login" placeholder="Digite seu Facebook">
                    </div>
                </details>


                <!-- <label class="label-cria-login">Foto: </label>
                <input type="file" name="foto" class="file-cria-login"> -->
                <label for="images" class="drop-container" id="dropcontainer">
                    <span class="drop-title">Solte a foto aqui!</span>
                    or
                    <input type="file" name="arquivo" id="images" accept="image/*">
                </label>
                <div class="g-recaptcha" data-sitekey="6LfaXwAqAAAAAKygUYRk_k_DBXMSCmUti6b2RnXb"></div>
                <button type="submit" class="btn-cria-login">Criar conta</button>
            </form>
        </main>
        <aside id="sidebar">
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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    </footer>

    <script src="./js/script.js" defer></script>
    <script src="./js/awsome/all.min.js"></script>
</body>

</html>