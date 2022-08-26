<section id="list-tv-song">
    <h2>List of All Base Song T.V.</h2>
    <div class="item add">
        <a href="/tvsong/create?t=<?=$_SESSION['token']?>" class="btn">create new song</a>
    </div>
    <?php foreach ($main['data'] as $key => $value) {?>
        <div class="item" id="i-<?=$value['id']?>">
            <div class="line id">
                <p class="name">#<?=$value['id']?></p>
            </div>
            <div class="line">
                <p class="name">Title :  </p>
                <p> <?=$value['title']?></p>
            </div>
            <div class="line">
                <p class="name">Author : </p>
                <p> <?=$value['author']?></p>
            </div>
            <div class="line">
                <p class="name">Creator :</p>
                <p> <?=$value['creator']?></p>
            </div>
            <div class="line content-lyrics">
                <p class="name">Lyrics :</p>
                <p> <?=substr($value['content'], 0 , 40)?> ...</p>
            </div>
            <div class="cmd">
                <a href="/tvsong/up/<?=$value['id'].'?t='.$_SESSION['token']?>" class="btn">edit</a>
                <a href="/tvsong/del/<?=$value['id'].'?t='.$_SESSION['token']?>" class="btn del">delete</a>
            </div>
        </div>
    <?php } ?>
</section>