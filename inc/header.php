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
            </style>
            <img src="./img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
            <ul id="nav-links">
                <li><a href="./index.php">Home</a></li>
                <?php  
                
                    session_start();

                    // Verifique se o usuário está logado
                    if (!isset($_SESSION['login'])) {
                        echo '<li><a href="./dashbord.php">Logar</a></li>';
                    } 
                    else {
                        echo '<li><a href="./dashbord.php">Dashboard</a></li>';
                        echo '<li class="active"><a href="./logout.php">Sair</a></li>';
                    }
                    include("conexao.php");
                    
                    
                ?>
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