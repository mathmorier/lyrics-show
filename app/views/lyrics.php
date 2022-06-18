<div class="search-genuis">
    <?=$main['src']['searchGenius'] ?? ''?>
</div>
<!-- <button id="like">
    <i class="fa-solid fa-heart"></i>
</button> -->
<div class="banner">
    <button id="btn-dark" style="display: none;" class="logo-only"><i class="fa-solid fa-moon"></i></button>
    <button id="full"><i class="fa-solid fa-expand"></i>Full Screen</button>
    <button id="like" disabled style="display: none;"><i class="fa-solid fa-heart"></i>Save</button>

</div>
<div class="list-Song">
    <div class="list-item"></div>
</div>
<?php
if (isset($song->embed_content)) {
    ?>
    <div id="embed-content-lyrics">
        <?=$song->embed_content ?? ''?>
    </div>
    <div class="list-Song">
        <div class="list-item"></div>
    </div>
    <!-- <button onclick="window.location.replace('#')"><i class="fa-solid fa-arrow-up"></i></button> -->
    <?php
}
?>

