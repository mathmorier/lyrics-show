<div class="container">
    <?= $main['src']['search'] ?? "" ?>
    <div class="list-bible">
        <?php
        foreach ($main['biblesList'] ?? [] as $bible) {
        ?>
            <div>
                <a href="<?=$bible['path']??'/bible'?>" class="line">
                    <h4><?=$bible['name']??''?></h4>
                    <p><?=$bible['language']??''?></p>
                </a>
            </div>
        <?php
        }
        ?>
    </div>


    <div class="bible">
    <?php
        foreach ($main['bible'] ?? [] as $book) {
        ?>
            <div class="book">
                <a href="/bible/<?=($main['bibleVersion']??'').'/'.($book->abbrev??'')?>"><h3><?=$book->name??''?></h3></a>
            </div>  
        <?php
        }
        ?>
    </div>

    <div class="book">
        <h3><?=$main['book']->name??''?></h3>
        <?php
        foreach (($main['book']->chapters??[]) as $numChapter => $chapter) {
        ?>
        <br>
        <div class="chapter">
            <h4>Chapter <?=($numChapter??0)?></h4>
            <?php
            foreach ($chapter as $numVerse => $verse) {
            ?>
            <p><?=$verse??''?></p>
            <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </div>
</div>