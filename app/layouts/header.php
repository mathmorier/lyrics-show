<nav id="nav-princ">
    <div id="btn-open-princ" class="btn-menu">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <div id="slider-princ" class="slider show">
        <ul>
            <li><a href="/">home</a></li>
            <li><a href="/lyrics">lyrics</a></li>
            <li><a href="/os<?=$main['api_path'] ?? ""?>">OpenSong</a></li>
        </ul>
        <div id="list">
            <div id="list-btn">
                <button id="save-lyrics"><i class="fa-solid fa-heart"></i></button>
                <button id="clear-lyrics"><i class="fa-solid fa-trash"></i></button>
                <button id="share-lyrics"><i class="fa-solid fa-share-nodes"></i></button>
            </div>
            <div id="list-link">
                <input type="text" id="link">
                <button id="copy-link"><i class="fa-solid fa-copy"></i></button>
            </div>
            <div id="list-item"></div>
        </div>
 
    </div>
</nav>
