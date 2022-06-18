<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="icon" href="/assets/icon/music-solid.svg"> -->
    <link rel="icon" href="/assets/image/ywam_tv_logo.webp">
    <title>Show Lyrics | YWAM Turner Valley</title>
    <meta name="description" content="This is a website for show the lyrics, create your list">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
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
<script src="/js/header.js"></script>
<?php foreach ($main['script'] as $key => $value) {echo $value;}?>
</html>