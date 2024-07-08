      
    <?php $title = "Criando o Perfil"?>
    <?php include("../inc/head.php")?>
    <?php include(DBAPI); ?>
    <div class="container">
        <main id="posts-container">
            <?php
				// recuperando 
				$nome = $_POST['nome'];	
				$login = $_POST['login'];	
				$senha = $_POST['senha'];	
				$tipoUser = $_POST['tipoUser'];	
                $profissao = $_POST['profissao'];	
				$instagram = $_POST['instagram'];	
				$twitter = $_POST['twitter'];	
				$facebook = $_POST['facebook'];	
				$foto = $_FILES['arquivo']['name'];
				$foto_tmp = $_FILES['arquivo']['tmp_name'];

				move_uploaded_file($foto_tmp, "img/" . $foto);
                function criptografia($senha)
                {
                    $custo = "08";
                    $salt = "Cf1f11ePArKlBJomM0F6aJ";
                
                    // Gera um hash baseado em bcrypt
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
                    if (!empty($foto)) {
                        $sqlinsert = "INSERT INTO users (nome, login, senha, tipoUser, profissao, instagram, twitter, facebook, foto) VALUES ('$nome', '$login', '$senha', '$tipoUser', '$profissao','$instagram', '$twitter', '$facebook', '$foto')";
                    }
                    else {
                        $foto = 'Semfoto.png';
                        $sqlinsert = "INSERT INTO users (nome, login, senha, tipoUser, profissao, instagram, twitter, facebook, foto) VALUES ('$nome', '$login', '$senha', '$tipoUser', '$profissao','$instagram', '$twitter', '$facebook', '$foto')";
                    }
                    // executando instrução SQL
                    $resultado = @mysqli_query($conexao, $sqlinsert);
                    if (!$resultado) {
                        echo '<a href="index.php" class="btn btn-outline-primary w-100">Voltar</a>';
                        die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
                    } else {
                        include(ABSPATH . "carregando.php");
                    } 
                } else {
                    $_SESSION['messageErrorLogin'] = 'Falha na validação do reCAPTCHA. Tente novamente.';
                    header("Location: " . BASEURL ."conta/index.php");
                    exit();
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