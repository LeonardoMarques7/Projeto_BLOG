    <?php $title = "Deletando comentário"?>
    <?php include("inc/head.php")?>
    <?php include(DBAPI); ?>
    <link rel="stylesheet" href="./css/style-post.css">
    <div class="container">
        <main id="posts-container">
            <?php
                include('conexao.php');


                // recuperando a informação da URL
			    // verifica se parâmetro está correto e dento da normalidade 
                if (isset($_GET['comentario_id']) && is_numeric(base64_decode($_GET['comentario_id']))) {
                    $codigo = base64_decode($_GET['comentario_id']);
                } else {
                    header('Location: dashbord.php');
                }

                // criando a linha do  SELECT
                $sqlconsulta =  "select * from comentarios where comentario_id = $codigo";
                
                // executando instrução SQL
                $resultado = @mysqli_query($conexao, $sqlconsulta);
                if (!$resultado) {
                    die('<b>Query Inválida:</b>' . @mysqli_error($conexao)); 
                } else {
                    $num = @mysqli_num_rows($resultado);
                    if ($num==0){
                        echo "<strong style='font-size: 18px;'>Código: $codigo </strong> - Não localizado!!<br><br>";
                        echo "<div class='col-md-4'><a href='alteracao.php' class='btn btn-outline-primary w-100'>Voltar</a></div>";
                    exit;
                    }else{
                        $dados=mysqli_fetch_array($resultado);
                    }
                } 

                    mysqli_close($conexao);
                    if (empty($dados['image_comentario'])){
                        $foto = 'Semfoto.png';
                    } else{
                        $foto = $dados['image_comentario'];
                    }
            ?>
            <form name="produto" action="deleteComent.php" class="form border rounded shadow-lg" method="post" enctype="multipart/form-data"><br><br>
                <h1 style="color: #39f;"><i class="fa-solid fa-square-minus"></i> Deletando Comentário</h1><br>
                <div class="col text-start">
                    <b>Código do Post:</b><br><input class="form-control border-primary" type="number" name="codigo" id="codigo"  placeholder="Sem dados!" title="Não é possível Alterar no DELETE" value="<?php echo $dados['codigo_post'];?>" readonly>
                </div><br>
                <div class="col text-start">
                    <b>Conteúdo:</b><br><input class="form-control border-primary" type="text"  name="titulo" id="titulo" maxlength="80"  placeholder="Sem dados!" title="Não é possível Alterar no DELETE" value="<?php echo $dados['conteudo_comentario'];?>" readonly>
                </div><br>
                <div class="d-grid col-md-9">
                    <input type='hidden' name='codigo' value="<?php echo $dados['comentario_id']; ?>">
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
    <?php include(FOOTER_TEMPLATE); ?>