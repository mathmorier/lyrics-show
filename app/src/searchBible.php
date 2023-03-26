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
                    <select name="bibleSelect" id="bibleSelect">
                    </select>
                </div>
            </div>
            <div>
                <!-- <input type="text" name="search" id="search" placeholder="Search ..." autofocus> -->
                <select name="searchBook" id="searchBook"></select>
                <label for="startChapter">Chapter</label>
                <select name="startChapter" id="startChapter">
                    <option value="1">1</option>
                </select>
                <label for="startVerse">Verse</label>
                <select name="startVerse" id="startVerse">
                    <option value="1">1</option>
                </select>
                <p>TO :</p>
                <label for="endChapter">Chapter</label>
                <select name="endChapter" id="endChapter">
                    <option value="1">1</option>
                </select>
                <label for="endVerse">Verse</label>
                <select name="endVerse" id="endVerse">
                    <option value="1">1</option>
                </select>

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
            listBible();
            getBooks();
            getChapters();

            async function listBible(){
                const bibleSelect = document.getElementById('bibleSelect') ;
                const api = '/api/bible';
                const url = api
                let res = await fetch(url)
                .then(response => response.json())
                .then(data => {return data})
                .catch(err => console.error(err));
                
                res.forEach((e)=>{
                    let opt = document.createElement('option');
                    opt.value = e.abbreviation;
                    opt.innerHTML = e.name;
                    bibleSelect.appendChild(opt);
                })

            }
            async function getBooks(version = 'en_kjv'){
                const searchBook = document.querySelector('#searchBook');
                const api = '/api/bible/';
                const url = api + version ;
                let res = await fetch(url)
                .then(response => response.json())
                .then(data => {return data})
                .catch(err => console.error(err));
                res.forEach((e)=>{
                    let opt = document.createElement('option');
                    opt.value = e.abbreviation;
                    opt.innerHTML = e.name;
                    searchBook.appendChild(opt);
                })
            }
            async function getChapters(version = 'en_kjv', book = 'gn'){
                const startChapter = document.querySelector('#startChapter');
                const api = '/api/bible/';
                const url = api + version + '/' + book;
                let res = await fetch(url)
                .then(response => response.json())
                .then(data => {return data})
                .catch(err => console.error(err));
                res.forEach((e)=>{
                    console.log(e.chapters);
                    e.chapters.forEach((e2) => {
                        console.log(e2);
                        // let opt = document.createElement('option');
                        // opt.value = e2.abbreviation;
                        // opt.innerHTML = e2.name;
                        // startChapter.appendChild(opt);
                    });
                })
            }
        </script>
        <?php
        return ob_get_clean();
    }
}
?>