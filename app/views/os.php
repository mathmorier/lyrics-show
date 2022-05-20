<?=$main['src']['searchGenius'] ?? ''?>

<div class="container">
    <?php
    if ($main['song']) {
        ?>
        <a class="down" href="/xml/os<?=$main['song']->api_path?>" target="_blank" rel="noopener noreferrer">Download this lyrics file for OpenSong (auto-generate)</a>
        <?php
    }else{
        ?>
        <a class="down" href="/assets/file/OpenSong Version 2.1.2 Setup.exe" download>Download OpenSong V2</a>
        <?php
    }
    ?>
    <?=$main['song']->embed_content ?? ''?>
</div>

