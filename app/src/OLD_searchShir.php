<?php
// Class Bar de recheche

namespace App\Src;

class SearchShir  
{
    static function index($callBack = null)
    {
        # Par défaut le call back est l'URI -> /....
        ob_start();
        ?>
        <div class="search-box">
            <div id="search-ask">
            <label for="search">Search Song</label>
            <div class="nav-icon">
                <a href="/"><i class="fa-solid fa-house"></i></a>
                <a href="/lyrics"><i class="fa-solid fa-music"></i></a>
                <a href="/os"><i class="fa-solid fa-person-chalkboard"></i></a>
            </div>
            <div>
                <input type="text" name="search" id="search" placeholder="Search ..." autofocus>
                <a href="<?=$callBack = null ? $_SERVER['REQUEST_URI'] : $callBack?>">
                    <div class="corss">
                        <div class="cross-line"></div>
                        <div class="cross-line"></div>
                    </div>
                </a>
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
                
                let totalHits = data.query.searchinfo.totalhits ;

                if (totalHits > 0) {
                    let result = []
                    Object.keys(data.query.pages).forEach(key => {
                        result.push(data.query.pages[key]);
                    })
                    console.log(result);

                    result.forEach(e => {
                    let item = document.createElement('div')
                    let title = document. createTextNode(e.title)
                    let song_art_image_thumbnail_url = document.createElement('img')
                    song_art_image_thumbnail_url.src = 'http://shir.fr/w/shir-carre-150.png'
                    song_art_image_thumbnail_url.setAttribute("width", 60);
                    song_art_image_thumbnail_url.setAttribute("height", 60);

                    item.classList.add('serach-list')
                    item.setAttribute("id", e.pageid)
                    item.appendChild(song_art_image_thumbnail_url)
                    item.appendChild(document.createElement('p')).appendChild(title)
                    item.addEventListener('click', function () {
                        window.location.replace("<?=$callBack?>"+ "/shir/" + e.pageid)
                    })
                    searchRes.appendChild(item);
                        
                    });

                }
                console.log(totalHits);
            })

            async function searchGenuisApi(q){
                q = q.replace('&', '')
                const api = 'http://shir.fr/w/api.php';
                const token = '';
                const url = api
                + '?action=query'
                + '&generator=search'
                + '&gsrsearch='+ q 
                + '&format=json'
                + '&gsrlimit=20';
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