<div class="list">
    <div class="item add">
        <a href="/tvsong/create?t=<?=$_SESSION['token']?>" class="btn">create new song</a>
    </div>
    <?php foreach ($main['data'] as $key => $value) {?>
        <div class="item" id="i-<?=$value['id']?>">
            <p><?=$value['title']?></p>
            <p><?=$value['author']?></p>
            <p><?=$value['creator']?></p>
            <div class="cmd">
                <a href="/tvsong/up/<?=$value['id'].'?t='.$_SESSION['token']?>" class="btn">edit</a>
                <a href="/tvsong/del/<?=$value['id'].'?t='.$_SESSION['token']?>" class="btn">delete</a>
            </div>
        </div>
    <?php } ?>
</div>