<?php //dump($main['list']); ?>

<div class="container">
    <div class="list">
        <?php foreach ($main['list'] as $key => $line) { ?>
            <div class="line">
                <img src="<?=$line['song_art_image_thumbnail_url']??null?>" alt="<?=$line['title']?>" width="60" height="60">
                <div>
                    <p class="p1">Title : <?=$line['title']?></p>
                    <p class="p2">Id : <?=$line['id']?></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <button id="btn-save-list">save this list</button>
    </div>