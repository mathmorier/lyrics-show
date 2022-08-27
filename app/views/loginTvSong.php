<section id="login">
    <form action="<?=$main['backLink'] ?? '/tvsong'?>" method="get">
        <h3>Login</h3>
        <div class="line">
            <input type="text" name="u" placeholder="Username" value="<?=$_GET['u'] ?? '' ?>">
        </div>
        <div class="line">
            <input type="password" name="p" placeholder="Password" value="<?=$_GET['p'] ?? '' ?>">
        </div>
        <div class="line">
            <button type="submit">login</button>
        </div>
        <div class="line">
            <a href="/help">you have forget the password ?</a>
        </div>
    </form>
</section>