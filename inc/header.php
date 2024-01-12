<header id="home">
    <nav id="navbar">
        <div id="navbar-inner">
            <style>
                .active a{
                    border: 1px solid #39f;
                    background-color: #39f;
                    color: #fff;
                    padding: 5px 10px;
                    border-radius: 5px;
                }

                .perfil-header{
                    width: 30px;
                    border-radius: 50%;
                    cursor: pointer;
                    padding: 2px;
                    border: 2px solid #707070;
                }

                
            </style>
            <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
            <ul id="nav-links">
                <li><a href="./index.php">Home</a></li>
                <?php  
                
                    session_start();
                    

                    // Verifique se o usuário está logado
                    if (!isset($_SESSION['login'])) {
                        echo '<li><a href="./login.php">Logar</a></li>';
                    }
                    else {
                        if($_SESSION['tipoUser'] === "admin") { echo '<li><a href="./dashbord.php">Dashboard</a></li>'; };

                        echo '<li class="active"><a href="./logout.php">Sair</a></li>';
                    }
                    
    
                ?>
                <li>
                    <label class="switch">
                        <input type="checkbox" id="style-toggle">
                        <img src="./img/modo-escuro.png" id="img" alt="Toggle Image" class="img-modo" data-dark-image="./img/modo-claro.png">
                    </label>
                </li>

                    <?php 

                    if (isset($_SESSION['login'])) {
                        $foto = $_SESSION['foto'];
                        echo "<a href='perfilView.php'><li><img src='./img/$foto' class='perfil-header'/></li></a>";
                    }
                    include("conexao.php");

                    function clear_message () {
                        $_SESSION['message'] = null;
                    }
                ?>
            </ul>
        </div>
    </nav>
</header>