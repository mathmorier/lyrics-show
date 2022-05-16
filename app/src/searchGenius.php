<?php
// Class Bar de recheche

namespace App\Src;

class SearchGenius  
{
    static function index($callBack = "/")
    {
        ob_start();
        ?>
        <div class="search-box">
            <div id="search-ask">
            <label for="search">Search Song</label>
            <div>
                <input type="text" name="search" id="search" placeholder="Search ..." autofocus>
                <a href="<?=$callBack?>">
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
        return '<link rel="stylesheet" href="/css/searchBar.css">';
    }
    static function script($callBack = "/")
    {
        ob_start();
        ?>
        <script>
            const search    = document.getElementById('search')
            const searchRes = document.getElementById('search-res')

            search.addEventListener('input',async function () {
                let data = await searchGenuisApi(search.value)

                searchRes.innerHTML = "";
                console.log(data);
                data.response.hits.forEach(e => {
                    let item = document.createElement('div')
                    let title = document. createTextNode(e.result.full_title)
                    let song_art_image_thumbnail_url = document.createElement('img')
                    song_art_image_thumbnail_url.src = e.result.song_art_image_thumbnail_url
                    song_art_image_thumbnail_url.setAttribute("width", 60);
                    song_art_image_thumbnail_url.setAttribute("height", 60);

                    item.classList.add('serach-list')
                    item.setAttribute("id", e.result.api_path)
                    item.appendChild(song_art_image_thumbnail_url)
                    item.appendChild(document.createElement('p')).appendChild(title)
                    item.addEventListener('click', function () {
                        window.location.replace("<?=$callBack?>"+e.result.api_path)
                    })
                    searchRes.appendChild(item);
                });
            })

            async function searchGenuisApi(q){
                q = q.replace('&', '')
                const api = 'https://api.genius.com';
                const token = 'xkHGfcbtHLNZuvfUoHkz9ioSIISH7YsnvQSO_Mav4y9E2c-Z3iTo5FbzJqHb_fyI';
                const url = api+ '/search?q='+ q +'&access_token=' + token;
                let res = await fetch(url)
                .then(response => response.json())
                .then(data => {return data})
                .catch(err => console.error(err));
                return res ;
            }
        </script>
        <?php
        return ob_get_clean();

    }
}
?>