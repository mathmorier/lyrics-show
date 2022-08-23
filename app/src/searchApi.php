<?php
// Class Bar de recheche

namespace App\Src;

class SearchApi  
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
            <div id="api-select">
                <div class="box">
                    <select name="apiSelect" id="apiSelect">
                        <option value="genius.com"  id="genius.com" >Genius</option>
                        <option value="shir.fr"     id="shir.fr"    >Shir.fr</option>
                    </select>
                </div>
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
            </div>
            <div id="search-res"></div>
        </div>
        <?php 
        return ob_get_clean();
    }
    static function style()
    {
        return '<link rel="stylesheet" href="/css/searchBarV2.css">';
    }
    static function script($callBack = "/")
    {
        ob_start();
        ?>
        <script>
            const search    = document.getElementById('search')
            const searchRes = document.getElementById('search-res')
            const apiSelectBox = document.getElementById('apiSelect')

            let apiSelect = 'genius.com';

            if (localStorage.getItem('apiSelected') != null) { apiSelect = localStorage.getItem('apiSelected') }

            apiSelectBox.value = apiSelect;

            apiSelectBox.addEventListener('change', function(){
                localStorage.setItem('apiSelected',apiSelectBox.value)
                apiSelect = apiSelectBox.value
                createListFromApi()
            })

            search.addEventListener('input', createListFromApi)
            
            async function createListFromApi() {
                if (search.value != '') {
                    let data = null ;

                    switch (apiSelect) {
                        case 'genius.com':
                            data = await searchGenuisApi(search.value)
                            break;
                        case 'shir.fr':
                            data = await searchShirApi(search.value)
                            break;
                        default:
                            data = await searchGenuisApi(search.value)
                            break;
                    }

                    searchRes.innerHTML = "";
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
                }else{
                    searchRes.innerHTML = "";
                }
            }

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
            async function searchShirApi(q){
                q = q.replace('&', '')
                const api = '/shir/api';
                const token = '';
                const url = api + '?gsrsearch='+ q ;
                let res = await fetch(url)
                .then(response => response.json())
                .then(data => {return data})
                .catch(err => console.error(err));

                // format compatibility genius   
                let resformat = {
                    'response' : {
                        'totalHits' : res.query.searchinfo.totalhits,
                        'hits':[]
                    }
                }
                if (resformat.response.totalHits > 0) {  
                    Object.keys(res.query.pages).forEach(key => {
                        let temp = {
                            'result': {
                                'full_title' : res.query.pages[key].title,
                                'song_art_image_thumbnail_url': '/assets/image/shir-carre-150.png',
                                'api_path' : '/shir/' + res.query.pages[key].pageid
                            }
                        }
                        resformat.response.hits.push(temp);
                    })
                } else{
                    let temp = {
                        'result': {
                            'full_title' : 'Need more info or no result',
                            'song_art_image_thumbnail_url': '/assets/image/150px-Search_Icon.svg.png',
                            'api_path' : '#' 
                        }
                    }
                    resformat.response.hits.push(temp);
            }
                return resformat ;
            }
        </script>
        <?php
        return ob_get_clean();

    }
}
?>