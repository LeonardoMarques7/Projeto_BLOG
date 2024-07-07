    <?php $title = "Logando"?>
    <?php include("inc/head.php")?>
    <?php include(DBAPI); ?>

<body>
    <div class="container">
        <main id="posts-container">
            <div class="form-center">
                <?php echo '<link rel="stylesheet" href="./css/style-post.css">'; ?>
                <form name="produto" action="logando.php" method="post" enctype="multipart/form-data" class="form-login"><br>
                    <?php if (isset($_SESSION['message'])) {
                        echo '<div class="message-error-login">' . $_SESSION['message'] . '</div>';
                        clear_message();
                    } ?>
                    <figure class="mb-2">
                        <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" class="logo-fp">
                        <figcaption><small style="opacity: 50%;" class="text-small">Projeto Visite: <b>Blog do Fernando Prestes</b></small></figcaption>
                    </figure>
                    <div class="col">
                        <b>Login:</b><br><input class="form-control-login  border-primary mb-2" placeholder="Digite o Login" type="text" name="login" id="login" maxlength="80" title="Digite o Login" required>
                    </div>
                    <div class="col senha-col">
                        <b>Senha:</b><br><input class="form-control-login  border-primary" placeholder="Digite o Senha" type="password" name="senha" id="senha" maxlength="80" title="Digite a Senha" required>
                    </div>
                    <b class="title-cria">Não tem uma conta? </b><a href="criandoConta.php" class="link-login">Clique aqui</a>
                    <div class="br"></div>
                    <br>
                    <div class="g-recaptcha" data-sitekey="6LfaXwAqAAAAAKygUYRk_k_DBXMSCmUti6b2RnXb"></div>
                    <br>
                    <div class="d-grid col-md-9">
                        <button class="btn btn-entrar" type="submit" title="Entrar">Entrar</button>
                    </div><br>
                    <?php if (isset($_SESSION['messageErrorLogin'])) :  if (!empty($_SESSION['messageErrorLogin'])) : ?>
                            <div class="message message-error">
                                Login ou senha incorretos. Tente Novamente!
                            </div>
                    <?php clear_message();
                        endif;
                    endif; ?>
                    <br><br>
                </form>
            </div>
        </main>
    </div>
    <?php include(FOOTER_TEMPLATE); ?>