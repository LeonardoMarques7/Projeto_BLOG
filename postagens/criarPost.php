    <?php $title = "Criando a Postagem"?>
    <?php include("../inc/head.php")?>
    <?php include(DBAPI); ?>
<body>
    <div class="container">
        <main id="posts-container">
            <?php

                if (!isset($_SESSION['login']) || $_SESSION['tipoUser'] !== "admin") {
                    // Se não estiver logado, redirecione para a página de login
                    header("Location: login.php");
                    exit;
                }

				// recuperando 
				$titulo = $_POST['titulo'];	
				$assuntoIntro = $_POST['assuntoIntro'];	
				$assuntoCompleto = $_POST['assuntoCompleto'];	
				$tags = $_POST['tag-input'];	
				$codigo = $_POST['codigo'];	
				$autor = $_SESSION['nome'];	

                // Pegando a hora atual
                $data_formatada = new DateTime ('now', new DateTimeZone ('America/Sao_Paulo'));
				
                $datePost = $data_formatada->format("Y-m-d H:i");
				

				$foto = $_FILES['arquivo']['name']; // nome do arquivo
				$foto_tmp = $_FILES['arquivo']['tmp_name']; // nome temporário do arquivo

				// movendo o arquivo temporário para o destino desejado
				move_uploaded_file($foto_tmp, "posts/" . $foto);

				if (!empty($foto)) {
                    // criando a linha de INSERT
                    $sqlinsert = "INSERT INTO post (codigo, titulo, assuntoIntro, assuntoCompleto, tags, autor, datePost, foto) VALUES ('$codigo', '$titulo', '$assuntoIntro', '$assuntoCompleto', '$tags', '$autor', '$datePost', '$foto')";
                }
                else {
                    $foto = 'Semfoto.png';
                    $sqlinsert = "INSERT INTO post (codigo, titulo, assuntoIntro, assuntoCompleto, tags, autor, datePost, foto) VALUES ('$codigo', '$titulo', '$assuntoIntro', '$assuntoCompleto', '$tags', '$autor', '$datePost', '$foto')";
                }

				// executando instrução SQL
				$resultado = @mysqli_query($conexao, $sqlinsert);
				if (!$resultado) {
					echo '<a href="index.php" class="btn btn-outline-primary w-100">Voltar</a>';
					die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
				} else {
                    include(ABSPATH . "carregando.php");
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