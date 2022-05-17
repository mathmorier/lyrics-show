<nav id="nav-princ">
    <div id="btn-open-princ" class="btn-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <div id="slider-princ" class="slider">
        <ul>
            <li><a href="/">home</a></li>
            <li><a href="/lyrics">lyrics</a></li>
            <li><a href="/os<?=$main['api_path'] ?? ""?>">OpenSong</a></li>
        </ul>
        <div id="list-item"></div>
        <div id="list-btn">
            <button id="save-lyrics">S</button>
            <button id="clear-lyrics">D</button>
            <button id="share-lyrics">></button>
        </div>
        <div id="list-link">
            <input type="text" id="link">
            <button id="copy-link">C</button>
        </div>
    </div>
</nav>
