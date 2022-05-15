<?=$main['src']['searchGenius'] ?? ''?>

<div class="container">
    <?php
    if ($main['song']) {
        ?>
        <a href="/xml/os<?=$main['song']->api_path?>" target="_blank" rel="noopener noreferrer">Download file for OpenSong (auto-generate)</a>
        <?php
    }
    ?>
    <?=$main['song']->embed_content ?? ''?>
</div>

