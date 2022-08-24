<div class="alert"><?=$params['msg'] ?? '' ?></div>
<h1>Create a base song</h1>
<p>Ywam Turner Valley</p>
<form action="/create" method="post">
    <div class="line">
        <label for="title">title</label>
        <input type="name" name="title" value="<?=$params['title']??''; ?>">
    </div>
    <div class="line">
        <label for="author">author</label>
        <input type="name" name="author" value="<?=$params['author']??''; ?>">
    </div>
    <div class="line">
        <label for="content">lyrics</label>
        <textarea name="content" id="content" cols="30" rows="10" ><?=$params['content']??''; ?></textarea>
    </div>
    <div class="line">
        <label for="creator">create by</label>
        <input type="name" name="creator" value="<?=$params['creator']??''; ?>">
    </div>
    <div class="line">
        <button type="submit">Create the song</button>
    </div>
</form>