<?php
// Class Bar de recheche

namespace App\Src;

class SearchBible  
{
    static function index($callBack = null)
    {
        ob_start();
        ?>
        <div class="search-box">
            <div id="search-ask">
            <label for="search">Search Bible</label>
            <div class="nav-icon">
                <a href="/"><i class="fa-solid fa-house"></i></a>
                <a href="/lyrics"><i class="fa-solid fa-music"></i></a>
                <a href="/bible"><i class="fa-solid fa-book-bible"></i></a>
            </div>
            <div id="api-select">
                <div class="box">
                    <select name="apiSelect" id="apiSelect">
                    </select>
                </div>
            </div>
            <div>
                <!-- <input type="text" name="search" id="search" placeholder="Search ..." autofocus> -->
                <select name="book" id="book"></select>
                <select name="StartChapter" id="StartChapter"></select>
                <select name="StartVerse" id="StartVerse"></select>
                <select name="EndChapter" id="EndChapter"></select>
                <select name="EndVerse" id="EndVerse"></select>

                <a href="<?=$callBack = null ? $_SERVER['REQUEST_URI'] : $callBack?>">
                    <div class="corss">
                        <div class="cross-line"></div>
                        <div class="cross-line"></div>
                    </div>
                </a>
            </div>
            </div>
            <div id="search-res"></div>
        </div>
        <?php 
        return ob_get_clean();
    }
    static function style()
    {
        return '<link rel="stylesheet" href="/css/searchBible.css">';
    }
    static function script($callBack = "/bible")
    {
        ob_start();
        ?>
        <script>
            console.log('done serach 7');
        </script>
        <?php
        return ob_get_clean();
    }
}
?>