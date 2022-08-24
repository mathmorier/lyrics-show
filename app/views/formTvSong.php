<p>Ywam Turner Valley</p>
<form action="<?=$main['postLink']?>" method="post">
    <div class="line">
        <a href="/tvsong?t=<?=$_SESSION['token'] ?? ''?>" class="btn">back</a>
        <button type="submit"><?=$main['postBtn'] ?? 'post from'?></button>
    </div>
    <div class="line">
        <label for="title">title</label>
        <input type="name" name="title" value="<?=$main['data'][0]['title']??''; ?>" <?=$main['option'] ?? ''; ?>>
    </div>
    <div class="line">
        <label for="author">author</label>
        <input type="name" name="author" value="<?=$main['data'][0]['author']??''; ?>" <?=$main['option'] ?? ''; ?>>
    </div>
    <div class="line">
        <label for="creator">create by</label>
        <input type="name" name="creator" value="<?=$main['data'][0]['creator']??''; ?>" <?=$main['option'] ?? ''; ?>>
    </div>
    <div class="line">
        <label for="content">lyrics</label>
        <textarea name="content" id="content" cols="30" rows="10" <?=$main['option'] ?? ''; ?>><?=$main['data'][0]['content']??''; ?></textarea>
    </div>
</form>