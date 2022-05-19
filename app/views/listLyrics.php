<h2>List lyrics</h2>
<?php //dump($main['list']); ?>

<div class="container">
    <button id="btn-save-list">save this list</button>
    <?php foreach ($main['list'] as $key => $line) {
    ?>
    <div class="line">
        <img src="<?=$line['song_art_image_thumbnail_url']??null?>" alt="<?=$line['title']?>" width="60" height="60">
        <div>
            <p>title : <?=$line['title']?></p>
            <p>id : <?=$line['id']?></p>
        </div>
    </div>
<?php
    }
?>
</div>