<?php $title = "Postagem"?>
<?php include("inc/head.php")?>
<?php include(DBAPI); ?>
<body>
    <?php echo '<link rel="stylesheet" href="./css/style-post.css">' ?>
    <div class="container">
        <main id="posts-container">
            <?php

            if (!isset($_SESSION['login']) || $_SESSION['tipoUser'] !== "admin") {
                // Se não estiver logado, redirecione para a página de login
                $_SESSION['message'] = "Você precisa ser administrador!";
                header("Location: login.php");
                exit;
            }

            $codigo = $_GET['codigo'];
            $codigo_base = base64_decode($codigo);

            // criando a linha do  SELECT
            $sqlconsulta =  "select * from post where codigo = $codigo_base";

            // executando instrução SQL
            $resultado = @mysqli_query($conexao, $sqlconsulta);
            if (!$resultado) {
                die('<b>Query Inválida:</b>' . @mysqli_error($conexao));
            } else {
                $num = @mysqli_num_rows($resultado);
                if ($num == 0) {
                    echo "<strong style='font-size: 18px;'>Código: $codigo </strong> - Não localizado!!<br><br>";
                    echo "<div class='col-md-4'><a href='alteracao.php' class='btn btn-outline-primary w-100'>Voltar</a></div>";
                    exit;
                } else {
                    $dados = mysqli_fetch_array($resultado);
                }
            }

            $timestamp = strtotime($dados['datePost']);
            $data_formatada = date('d/m/Y H:i', $timestamp);

            mysqli_close($conexao);
            if (empty($dados['foto'])) {
                $foto = 'Semfoto.png';
            } else {
                $foto = $dados['foto'];
            }
            ?>
            <form name="produto" action="deletePost.php" class="form border rounded shadow-lg" method="post" enctype="multipart/form-data"><br><br>
                <h1 style="color: #39f;"><i class="fa-solid fa-square-minus"></i> Deletando Post</h1><br>
                <div class="col form-control">
                    <img src="<?php echo "posts/$foto" ?>" style="max-width: 100%; margin: 0 auto;" alt="Foto do Post" readonly>
                </div><br>
                <div class="col text-start">
                    <b>Código do Post:</b><br><input class="form-control border-primary" type="number" name="codigo" id="codigo" placeholder="Sem dados!" title="Não é possível Alterar no DELETE" value="<?php echo $dados['codigo']; ?>" readonly>
                </div><br>
                <div class="col text-start">
                    <b>Título do Post:</b><br><input class="form-control border-primary" type="text" name="titulo" id="titulo" maxlength="80" placeholder="Sem dados!" title="Não é possível Alterar no DELETE" value="<?php echo $dados['titulo']; ?>" readonly>
                </div><br>
                <div class="col text-start">
                    <b>Assunto Introdutório do Post:</b><br><textarea class="form-control border-primary" name="assunto" id="assunto" placeholder="Sem dados!" title="Não é possível Alterar no DELETE" readonly><?php echo $dados['assuntoIntro'] ?></textarea>
                </div><br>
                <div class="col text-start">
                    <b>Assunto Completo do Post:</b><br><textarea class="form-control border-primary" name="assunto" id="assunto" placeholder="Sem dados!" title="Não é possível Alterar no DELETE" readonly><?php echo $dados['assuntoCompleto'] ?></textarea>
                </div><br>
                <div class="col text-start">
                    <b>Autor do Post:</b><br><input class="form-control border-primary" type="text" name="autor" id="autor" placeholder="Sem dados!" title="Não é possível Alterar no DELETE" value="<?php echo $dados['autor']; ?>" readonly></input>
                </div><br>
                <div class="col text-start">
                    <b>Data de Cadastro do Post:</b><br><input class="form-control text-center border-primary" name="datePost" id="datePost" type="datetime-local" placeholder="Sem dados!" title="Não é possível Alterar no DELETE" value="<?php echo $dados['datePost']; ?>" readonly></input>
                </div><br>
                <div class="d-grid col-md-9">
                    <input type='hidden' name='codigo' value="<?php echo $dados['codigo']; ?>">
                    <button class="btn btn-primary" type="submit" title="Excluir" style="color: 444;"><i class="fa-solid fa-trash"></i> Excluir</button>
                    <a href="dashbord.php"><button class="btn btn-outline-danger" type="button" title="Voltar" style="color: 444;"><i class="fa-solid fa-rotate-left"></i> Cancelar</button></a>
                </div>
                <br><br>
            </form>
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
    <?php include(ABSPATH . "inc/foot.php")?>