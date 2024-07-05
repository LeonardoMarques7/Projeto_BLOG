<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Logando</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<?php include("functions.php"); ?>
<body>
    <?php include 'conexao.php'; ?>
    <header id="home">
        <nav id="navbar">
            <div id="navbar-inner">
                <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
                <ul id="nav-links">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="style-toggle">
                            <img src="./img/modo-escuro.png" id="img" alt="Toggle Image" class="img-modo" data-dark-image="./img/modo-claro.png">
                        </label>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <main id="posts-container">
        <?php
            session_start(); // Inicia a sessão

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login = $_POST['login'];

                function criptografia($senha)
                {
                
                    $hash = crypt($senha, SALT);
                
                    return $hash;
                }

                $senha = criptografia($_POST['senha']);
                $recaptchaResponse = $_POST['g-recaptcha-response'];

                $secret = RECAPTCHA_SECRET;
                $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
                $recaptchaData = [
                    'secret' => $secret,
                    'response' => $recaptchaResponse,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ];

                $options = [
                    'http' => [
                        'method' => 'POST',
                        'header' => 'Content-type: application/x-www-form-urlencoded',
                        'content' => http_build_query($recaptchaData)
                    ]
                ];

                $context = stream_context_create($options);
                $response = file_get_contents($recaptchaUrl, false, $context);
                $responseKeys = json_decode($response, true);

                if ($responseKeys['success']) {
                    if ($conexao) {
                        $sql = "SELECT * FROM users WHERE login = '$login' AND senha = '$senha'";
                        $resultado = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($resultado) > 0) {
                            $_SESSION['login'] = $login;

                            $row = mysqli_fetch_assoc($resultado);
                            $_SESSION['foto'] = $row['foto'];
                            $_SESSION['nome'] = $row['nome'];
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['tipoUser'] = $row['tipoUser'];
                            $_SESSION['profissao'] = $row['profissao'];
                            $_SESSION['linkInsta'] = $row['instagram'];
                            $_SESSION['linkTwitter'] = $row['twitter'];
                            $_SESSION['linkFace'] = $row['facebook'];

                            $_SESSION['message'] = "Bem vindo(a) " . $_SESSION['nome'];

                            include("carregando.php");
                        } else {
                            $_SESSION['messageErrorLogin'] = "Error";
                            header("Location: login.php");
                            exit();
                        }

                        mysqli_close($conexao);
                    } else {
                        echo '<h3 class="card-title text-primary fw-bold">Falha ao conectar ao banco de dados!</h3>';
                        echo '<center>';
                        echo '<a href="index.php" class="text-primary border border-primary rounded-2 icon-link text-decoration-none text-center p-2 px-4 btn-clique">Tente Novamente ;)</a>';
                        echo '</center>';
                    }
                } else {
                    $_SESSION['messageErrorLogin'] = 'Falha na validação do reCAPTCHA. Tente novamente.';
                    header("Location: login.php");
                    exit();
                }
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