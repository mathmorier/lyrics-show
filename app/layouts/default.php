<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <?php foreach ($main['head'] as $key => $value) {echo $value;}?>
</head>
<body>
    <header>
        <?php require __DIR__. '/header.php'; ?>
    </header>
    <main>
        <?=$main['view']?>
    </main>
    <footer>
        <?php require __DIR__. '/footer.php'; ?>
    </footer>
</body>
<script src="/js/script.js"></script>
<?php foreach ($main['script'] as $key => $value) {echo $value;}?>
</html>