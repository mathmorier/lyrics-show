<section id="form-edit">
    <h2>Ywam Turner Valley</h2>
    <form action="<?=$main['postLink']?>" method="post">
        <div class="line cmd">
            <a href="/tvsong?t=<?=$_SESSION['token'] ?? ''?>" class="btn back">back</a>
            <button type="submit" class="btn <?=$main['postBtn'] == 'delete value' ? 'del' : ''?>"><?=$main['postBtn'] ?? 'post from'?></button>
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
</section>