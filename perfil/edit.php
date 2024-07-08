<?php $title = "Editando a Postagem"?>
<?php include("../inc/head.php")?>
<?php include(DBAPI); ?>
<body>
    <div class="container">
        <main id="posts-container">
            <div class="">
                <div class="faixa-cards">
                    <form action="functions.php" method="post" enctype="multipart/form-data">
                        <div class="perfil">
                            <div class="d">
                                <img src='<?= BASEURL ?>img/<?php echo $foto ?>' alt="" />
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
        </main>
    </div>
    <?php include(FOOTER_TEMPLATE); ?>