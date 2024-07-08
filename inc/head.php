<?php require_once "config.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog FP | <?=$title?></title>
    <link rel="shortcut icon" href="<?=BASEURL?>img/288-logo-etec-fernando-prestes.svg" type="image/svg">
    <!-- Verificação -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!-- Estilização -->
    <link id="style-link" rel="stylesheet" href="<?=BASEURL?>css/style.css">
    <link rel="stylesheet" href="<?=BASEURL?>css/style.alert.css">
    <!-- Fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include(HEADER_TEMPLATE) ?>
    