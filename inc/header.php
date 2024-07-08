<header id="home">
    <nav id="navbar">
        <div id="navbar-inner">
            <img src="<?php echo BASEURL ?>img/288-logo-etec-fernando-prestes.svg" alt="" id="logo-page" style="filter: invert(100%);">
            <ul id="nav-links">
                <li><a href="<?php echo BASEURL ?>index.php">Home</a></li>
                <?php
                session_start();

                // Verifique se o usuário está logado
                if (!isset($_SESSION['login'])) {
                    echo '<li><a href="' . BASEURL . 'conta/login.php">Logar</a></li>';
                } else {
                    if ($_SESSION['tipoUser'] === "admin") {
                        echo '<li><a href="' . BASEURL . 'dashbord.php">Dashboard</a></li>';
                    };

                    echo '<li class="active"><a href="' . BASEURL .'conta/logout.php">Sair</a></li>';
                }


                ?>

                <?php

                if (isset($_SESSION['login'])) {
                    $foto = $_SESSION['foto'];
                    echo "<a href='" .  BASEURL . "perfil/index.php'><li><img src='" . BASEURL . "img/$foto' class='perfil-header'/></li></a>";
                }

                function clear_message()
                {
                    $_SESSION['message'] = null;
                    $_SESSION['messageErrorLogin'] = null;
                }
                ?>
            </ul>
        </div>
    </nav>
</header>