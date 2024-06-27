<?php
session_start();
include 'databaseConnection.php'; // Conexão com o banco de dados

$codigo = $_POST['codigo'];
$userId = $_POST['userId'];

// Verificar se o usuário já curtiu o post
$query = $pdo->prepare("SELECT * FROM likes WHERE post_id = ? AND user_id = ?");
$query->execute([$codigo, $userId]);

if ($query->rowCount() > 0) {
    // Usuário já curtiu, remover a curtida
    $delete = $pdo->prepare("DELETE FROM likes WHERE post_id = ? AND user_id = ?");
    $delete->execute([$codigo, $userId]);
} else {
    // Usuário não curtiu, adicionar a curtida
    $insert = $pdo->prepare("INSERT INTO likes (post_id, user_id) VALUES (?, ?)");
    $insert->execute([$codigo, $userId]);
}

// Contar curtidas atualizadas
$count = $pdo->prepare("SELECT COUNT(*) AS likes_count FROM likes WHERE post_id = ?");
$count->execute([$codigo]);
$result = $count->fetch();

echo $result['likes_count'];
?>
