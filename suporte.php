<?php $title = "Postagem"?>
    <?php include("inc/head.php")?>
    <?php include(DBAPI); ?>
<body>
    <div class="container">
        <main id="posts-container">
            <h1>Suporte</h1><div class="linha mt-2"></div><br>
            <form  action="https://api.staticforms.xyz/submit" class="suporte-form" method="post">
                <input type="hidden" name="accessKey" value="aab79bad-b605-4656-a496-ce39c2faefb9">
                <label for="nome">Nome:</label>
                <input type="text" id="nameForm" name="name" class="input-nome-suporte" required placeholder="Digite seu nome">

                <label for="email">Email:</label>
                <input type="email" id="emailForm" name="email" class="input-email-suporte" required placeholder="Digite seu email">

                <label for="mensagem">Mensagem:</label>
                <textarea id="mensagemForm" name="message" rows="4" required class="textarea-suporte" placeholder="Digite o assunto"></textarea>
                <input type="hidden" name="redirectTo" value="https://blog-fp.wuaze.com/obrigado.php">
                <button type="submit" class='btn-add-suporte'>Enviar Mensagem</button>
            </form>
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
                        <li><a href="./suporte.php" class="active">Suporte</a></li>
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
    <?php include(FOOTER_TEMPLATE); ?>
    