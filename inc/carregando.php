<?php
    echo '<div class="custom-loader"></div>';
    echo '<script>
            setTimeout(function() {
                window.location.href = "' . BASEURL .'dashbord.php";
            }, 1000);
    </script>';
?>