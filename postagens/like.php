<?php 
    include("../inc/database.php");

    session_start();

$userId = $_GET['id_user'];
$postId = $_GET['id_post'];
$like = isset($_GET['like']);
$dislike = isset($_GET['dislike']);

$response = array('success' => false);

if ($userId && $postId) {
    if ($like) {
        $stmt = $conexao->prepare("DELETE FROM likes WHERE id_post = ? AND id_user = ?");
        $stmt->bind_param('ii', $postId, $userId);
        $stmt->execute();
        $stmt->close();

        $stmt = $conexao->prepare("INSERT INTO likes (id_post, id_user) VALUES (?, ?)");
        $stmt->bind_param('ii', $postId, $userId);
        $stmt->execute();
        $stmt->close();
    } elseif ($dislike) {
        $stmt = $conexao->prepare("DELETE FROM likes WHERE id_post = ? AND id_user = ?");
        $stmt->bind_param('ii', $postId, $userId);
        $stmt->execute();
        $stmt->close();
    }

    $stmt_count_likes = $conexao->prepare("SELECT COUNT(*) FROM likes WHERE id_post = ?");
    $stmt_count_likes->bind_param('i', $postId);
    $stmt_count_likes->execute();
    $stmt_count_likes->bind_result($likeCount);
    $stmt_count_likes->fetch();
    $stmt_count_likes->close();

    $response['success'] = true;
    $response['likeCount'] = $likeCount;

    $stmt = $conexao->prepare("SELECT id FROM likes WHERE id_post = ? AND id_user = ?");
    $stmt->bind_param('ii', $postId, $userId);
    $stmt->execute();
    $stmt->store_result();
    $response['isLiked'] = $stmt->num_rows > 0;
    $stmt->close();
}

echo json_encode($response);
?>

