<?php
session_start();
include 'databaseConnection.php'; // Conexão com o banco de dados

$codigo = $_POST['codigo'];
$userId = $_POST['userId'];

$query = $pdo->prepare("SELECT * FROM likes WHERE post_id = ? AND user_id = ?");
$query->execute([$codigo, $userId]);
$liked = $query->rowCount() > 0;

echo json_encode($liked);
?>
