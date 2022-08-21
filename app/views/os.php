<?=$main['src']['searchGenius'] ?? ''?>

<div class="container">
    <div class="download">
    <?php
    if ($main['song']) {
        ?>
        <p style="color: #888; font-size: 12px;"><i class="fa-solid fa-triangle-exclamation"></i> flie is auto generate <i class="fa-solid fa-triangle-exclamation"></i></p>
        <div class="down">
            <a href="<?=$main['song']->api_path_full?>" target="_blank" rel="noopener noreferrer" class="btn"><i class="fa-solid fa-download"></i> Lyrics file for OpenSong</a>
        </div>
        <?php
    }else{
        ?>
            <h4><i class="fa-solid fa-download"></i> OpenSong V2 </h4>
            <div class="down">
                <a href="/assets/file/OpenSong Version 2.1.2 Setup.exe" download class="btn"><i class="fa-brands fa-windows"></i> Windows</a>
                <a href="/assets/file/OpenSongOSX-V2.1.2.dmg" download class="btn"><i class="fa-brands fa-apple"></i> Mac</a>
            </div>
            <a href="http://www.opensong.org/home/download" target="_blank" rel="noopener noreferrer">More : opensong.org (linux, set, ...)</a>
        
        <?php
    }
    ?>
    </div>
    <?=$main['song']->embed_content ?? ''?>
</div>

