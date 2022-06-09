<div class="search-genuis">
    <?=$main['src']['searchGenius'] ?? ''?>
</div>
<!-- <button id="like">
    <i class="fa-solid fa-heart"></i>
</button> -->
<div class="banner">
    <button id="full"><i class="fa-solid fa-expand"></i>Full Screen</button>
    <button id="like"><i class="fa-solid fa-heart"></i>Save</button>
</div>
<div class="list-Song">
    <div class="list-item"></div>
</div>
<?php
if (isset($song->embed_content)) {
    ?>
    <div>
        <?=$song->embed_content ?? ''?>
    </div>
    <div class="list-Song">
        <div class="list-item"></div>
    </div>
    <?php
}
?>

