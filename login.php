<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Login</title>
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

    label, input[type="checkbox"]:hover {
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

    .link-turne:hover b, .link-turne a:hover{
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
    <?php include('./inc/header.php');?>
    <div class="container">
        <main id="posts-container">
            <div class="form-center">
                <?php echo '<link rel="stylesheet" href="./css/style-post.css">'; ?>
                <form name="produto" action="logando.php" method="post" enctype="multipart/form-data" class="form-login"><br>
                <figure class="mb-2">
                    <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" class="logo-fp">
                    <figcaption><small style="opacity: 50%;" class="text-small">Projeto Visite: <b>Blog do Fernando Prestes</b></small></figcaption>
                </figure>
                    <div class="col">
                        <b>Login:</b><br><input class="form-control-login  border-primary mb-2" placeholder="Digite o Login" type="text"  name="login" id="login" maxlength="80" title="Digite o Login" required>
                    </div>
                    <div class="col">
                        <b>Senha:</b><br><input class="form-control-login  border-primary" placeholder="Digite o Senha" type="password"  name="senha" id="senha" maxlength="80" title="Digite a Senha" required>
                    </div><br>
                    <div class="d-grid col-md-9">
                        <button class="btn btn-entrar" type="submit" title="Entrar">Entrar</button>
                    </div>
                    <br><br>
                </form>
            </div>
        </main>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
    
    <script src="./js/script.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>
</html>