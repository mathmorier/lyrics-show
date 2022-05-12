<div class="search-box">
        <label for="search">Search Song :</label>
        <input type="text" name="search" id="search" placeholder="Search ..." autofocus>
        <a href="/">X</a>
        <div id="search-res"></div>
</div>

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
                window.location.replace("/lyrics"+e.result.api_path)
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

<style>
    .search-box{
        margin: 10px;
        margin-top: 25px;
    }
    .search-box input{
        width: 20%;
        min-width: 300px;
        padding: 2px 2px;
    }
    .serach-list{
        cursor: pointer;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        gap: 5px;
        padding: 2px;
    }
    .serach-list:hover{
        color: #713c3cf0;
    }
</style>