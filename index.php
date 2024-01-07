<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | Home</title>
    <link rel="shortcut icon" href="./img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/style.alert.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
</head>
<style>
    input[type="checkbox"] {
        appearance: none;
    }

    label, input[type="checkbox"]:hover {
        cursor: pointer;
    }

    #nav-links .img-modo {
        width: 18px;
        margin-top: 2px;
    }

    body {
        display: none;
    }

    a b {
        font-weight: bold;
        font-size: 12px;
        border: 1px solid #39f;
        padding: 2px;
        border-radius: 2px;
        background-color: #39f;
        color: #fff;
        transition: 0.4s;
    }

    .link-turne:hover b, .link-turne a:hover{
        color: #fff;
    }

    a:hover b {
        border: 1px solid #39f;
        background-color: #39f;
    }

    #foto-user {
        width: 24pt; 
        margin-right: 5px;
    }

    h2 b {
        font-weight: normal;
        color: #000;
    } 

    .hide {
        display: none;
    }
</style>
<body>
    <header id="home">
        <nav id="navbar">
            <div id="navbar-inner">
                <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
                <ul id="nav-links">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="./login.php">Administrador</a></li>
                    <li>
                        <label class="switch">
                            <input type="checkbox" id="style-toggle">
                            <img src="./img/modo-escuro.png" id="img" alt="Toggle Image" class="img-modo" data-dark-image="./img/modo-claro.png">
                        </label>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container">
        <main id="posts-container">
            <?php 
                include("conexao.php");
                include("pesquisador.php");

                $query = $conexao -> query($sql);

                while($dados=mysqli_fetch_array($query)) {
                    $timestamp = strtotime($dados['datePost']);
                    $data_formatada = date('d/m/Y H:i', $timestamp);

                    if (empty($dados['foto'])){
                        $foto = 'Semfoto.png';
                    } else {
                        $foto = $dados['foto'];
                    }

                    $codigo = base64_encode($dados['codigo']);

                    echo '<article class="post">';
                    echo "<img src='posts/$foto' alt='Foto do Post'>";
                    echo "<h3 class='title' title='Clique e veja mais!'><a href='viewPost.php?codigo=$codigo'>" . $dados['titulo'] . "</a></h3>";
                    echo '<p class="description">' . $dados["assuntoIntro"] . '</p>';
                    echo '<p class="tag-post" >' . '#' . $dados["tags"] . '</p>';
                    echo '<p class="author">' . $dados["autor"] . ' | ' . $data_formatada . '</p>';
                    echo "<a href='viewPost.php?codigo=$codigo' title='Clique e veja mais!'>Ler mais</a>";
                    echo '</article>';
                }
                mysqli_close($conexao); 
            ?>
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
                        <li><a href="./criadores.php" title="Veja os Criadores!">Criadores</a></li>
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
    <footer>
        <?php include("footer.php"); ?>
    </footer>
    
    <script src="./js/script.js"></script>
    <script src="./js/awsome/all.min.js"></script>
    <!-- Finalizando Seção de Projeto de Blog Semântico com HTML5 e CSS3 (23.08.2023) => {19:05}; -->
</body>
</html>