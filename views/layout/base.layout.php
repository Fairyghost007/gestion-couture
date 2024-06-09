<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="<?= WEBROOT ?>/js/tailwind.config.js"></script>
    <link rel="stylesheet" href="<?= WEBROOT ?>/css/list.css">
</head>

<body class="">

    <?php
        require_once("../views/sidebar.html.php");
        require_once("../views/navbar.html.php");
        echo $contentView;
    ?>
</body>

</html>