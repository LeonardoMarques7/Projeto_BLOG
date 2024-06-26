<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blog | Perfil</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg" />
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css" />
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet" />
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

    .input-edit-name {
        appearance: none;
        border: none;
        background-color: transparent;
        font-size: 24px;
        font-weight: bold;
    }

    .input-edit-name:focus {
        outline: none;
        border-bottom: 1px solid #ccc;
    }

    .input-edit-profissao {
        appearance: none;
        border: none;
        background-color: transparent;
        font-weight: bold;
        font-size: 16px;
        color: #39f;
    }

    .input-edit-profissao:focus {
        outline: none;
        border-bottom: 1px solid #ccc;
    }

    .perfil {
        gap: 1rem;
    }

    .btn-editar {
        border: none;
        border-radius: 25px;
        background-color: #39f;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: .5s;
    }

    .btn-editar:hover {
        background-color: #1877f2;
    }

    .d {
        display: flex;
        flex-direction: column;
        justify-content: start;
    }

    @media (max-width: 800px) {
        

    .perfil {
        display: flex;
        justify-content: start;
        align-items: flex-start;
        flex-direction: column;
    }
    }
    
</style>

<body>
    <?php include("inc/header.php"); ?>
    <div class="container">
        <main id="posts-container">
            <div class="">
                <div class="faixa-cards">
                    <form action="editarPerfil.php" method="post" enctype="multipart/form-data">
                        <div class="perfil">
                            <div class="d">
                                <img src='./img/<?php echo $foto ?>' alt="" />
                                <label class="custom-file-label" for="fileInput">
                                    <i class="fas fa-camera"></i> Selecionar Foto
                                </label>
                                <input type="file" id="fileInput" name="arquivo" class="custom-file-input" value="<?php echo $foto; ?>">

                            </div>

                            <div class="">
                                <h2><input type="text" class="input-edit-name" name="nome" value="<?php echo $_SESSION['nome'] ?>"></h2>
                                <b><input type="text" class="input-edit-profissao" name="profissao" value="<?php echo $_SESSION['profissao'] ?>"></b>
                                <input type="hidden" class="input-edit-profissao" name="login" value="<?php echo $_SESSION['login'] ?>">
                                <br>
                                <br>
                                <div class="redes">
                                    <div class="form-edit-group">
                                        <label for="instagram"><i class="fa-brands fa-instagram"></i></label>
                                        <input type="text" id="instagram" class="input-edit-redes" name="instagram" value="<?php echo $_SESSION['linkInsta'] ?>">
                                    </div>
                                    <div class="form-edit-group">
                                        <label for="twitter"><i class="fa-brands fa-twitter"></i></label>
                                        <input type="text" id="twitter" class="input-edit-redes" name="twitter" value="<?php echo $_SESSION['linkTwitter'] ?>">
                                    </div>
                                    <div class="form-edit-group">
                                        <label for="facebook"><i class="fa-brands fa-facebook"></i></label>
                                        <input type="text" id="facebook" class="input-edit-redes" name="facebook" value="<?php echo $_SESSION['linkFace'] ?>">
                                    </div>
                                </div>  
                                <button class="btn btn-editar" type="submit"><i class="fas fa-save"></i> Salvar</button>
                                <small><b>Atenção:</b> Após o clicar em salvar, você tera de logar novamente.</strong>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <div class="container-post-user">
                <?php
                include("pesquisador.php");
                ?>
            </div>
        </main>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>

    <script src="./js/awsome/all.min.js"></script>
    <script src="./js/script.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>

</html>