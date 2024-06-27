<?php
    session_start();
    include('conexao.php');

    $codigo_post = $_POST['codigo'];
    $userId = $_SESSION['id'];

    $sql_verifica_like = "SELECT id FROM likes WHERE id_post = ? AND id_user = ?";
    $stmt_verifica_like = $conexao->prepare($sql_verifica_like);
    $stmt_verifica_like->bind_param('ii', $codigo_post, $userId);
    $stmt_verifica_like->execute();
    $stmt_verifica_like->store_result();
    $num_rows = $stmt_verifica_like->num_rows;

    if ($num_rows > 0) {
        echo 'true';
    } else {
        echo 'false'; 
    }

    $stmt_verifica_like->close();
    mysqli_close($conexao);
?>
