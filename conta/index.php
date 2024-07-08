    <?php $title = "Criando a Conta"?>
    <?php include("../inc/head.php")?>
    <?php include(DBAPI); ?>

    <div class="container">
        <main id="posts-container">
            <?php
            ?>
            <?php if(!empty($_SESSION['messageErrorLogin'])){
                echo "<span class='message-captcha'>Falha na validação do reCAPTCHA. Tente novamente.<br></span>";
                clear_message();
            }
            ?>
            <form class="form-cria-login" action="criaPerfil.php" method="post" enctype="multipart/form-data">
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
                    <label class="label-cria-login">Profissão </label>
                    <input type="text" name="profissao" class="input-cria-login" placeholder="Digite sua profissão">
                </div>

                <!-- Social Media Section -->
                <details>
                    <summary class="label-cria-login summary-user">Quer adicionar suas redes socias?</summary>
                    <div class="form-group icon-input">
                        <label class="label-cria-login"><i class="fa-brands fa-instagram"></i></label>
                        <input type="text" name="instagram" class="input-cria-login" placeholder="Digite a url do seu Instagram">
                    </div>
                    <div class="form-group icon-input">
                        <label class="label-cria-login"><i class="fa-brands fa-twitter"></i></label>
                        <input type="text" name="twitter" class="input-cria-login" placeholder="Digite a url do seu Twitter">
                    </div>
                    <div class="form-group icon-input">
                        <label class="label-cria-login"><i class="fa-brands fa-facebook"></i></label>
                        <input type="text" name="facebook" class="input-cria-login" placeholder="Digite a url do seu Facebook">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <?php include(FOOTER_TEMPLATE); ?>
