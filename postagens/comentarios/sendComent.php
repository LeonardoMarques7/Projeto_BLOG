    <?php $title = "Enviando comentário"?>
    <?php include("../inc/head.php")?>
    <?php include(DBAPI); ?>
<body>
    <div class="container">
        <main id="posts-container">
            <?php

                if (isset($_GET['codigo'])) {
                    $codigo = $_GET['codigo'];
                    $codigo_base = base64_decode($codigo);
                } else {
                    header('Location: ' . BASEURL .' dashbord.php');
                }
				// recuperando 
				$comentario = $_POST['comentario'];	

                $foto = $_SESSION['foto'];

                $nome = $_SESSION['nome'];
                $login = $_SESSION['login'];

                $id_user = $_SESSION['id'];


                $sqlupdate = "INSERT INTO comentarios (codigo_post, conteudo_comentario, image_comentario, id_user, nome_user, login_user) VALUES ('$codigo_base', '$comentario', '$foto', '$id_user', '$nome', '$login');";

				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqlupdate);
				if (!$resultado) {
					echo '<a href="index.php" class="btn btn-outline-primary w-100">Voltar</a>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				} else {
                    include("carregando.php");
				} 
				mysqli_close($conexao);
			?>
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
    <?php include(FOOTER_TEMPLATE); ?>