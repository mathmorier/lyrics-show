const btnOpenPrinc = document.getElementById('btn-open-princ')
const navPrinc = document.getElementById('nav-princ')
const sliderPrinc = document.getElementById('slider-princ')
// btnOpenPrinc.classList.add('show');
// sliderPrinc.classList.add('show');

btnOpenPrinc.addEventListener('click', function() {
    this.classList.toggle('show');
    sliderPrinc.classList.toggle('show');
})


// ------------------- Save Liste -------------------------
const saveLyrics     = document.getElementById('save-lyrics')
const clearLyrics    = document.getElementById('clear-lyrics')
let listItem         = document.getElementById('list-item')

listItem = showList(listItem)

saveLyrics.addEventListener('click', function () {

    addItemList(
        localStorage.getItem('api_path'),
        localStorage.getItem('title'), 
        localStorage.getItem('song_art_image_thumbnail_url')
        )

    listItem = showList(listItem)
})

clearLyrics.addEventListener('click', function () {
    clearList()
    listItem = showList(listItem)
})

function addItemList(api_path,title,song_art_image_thumbnail_url) {
    let list = JSON.parse(localStorage.getItem('saveList'))
    
    if (api_path == "") {
        alert('No sing selected')
        return
    }

    let line = {
        api_path: api_path,
        title: title,
        song_art_image_thumbnail_url: song_art_image_thumbnail_url
    }

    if (list!=null) {
        list.push(line)
    }else{
        list = [{
            api_path: api_path,
            title: title,
            song_art_image_thumbnail_url: song_art_image_thumbnail_url
        }]
    }

    localStorage.setItem('saveList', JSON.stringify(list))

}

function clearList() {
    let ok = confirm('Delete the list ?')
    if (ok) {
        localStorage.removeItem('saveList')
    }
}

function showList(listItem) {
    listItem.innerHTML = ""
    let list = JSON.parse(localStorage.getItem('saveList'))



    if (list!=null) {
        list.forEach(e => {
            let a = document.createElement('a')
            a.href = "/lyrics"+e.api_path
            let div = document.createElement('div')
            div.appendChild(document.createElement('p')).appendChild(document.createTextNode(e.title))
            let img = document.createElement('img')
            img.src = e.song_art_image_thumbnail_url
            img.setAttribute("width",   35);
            img.setAttribute("height",  35);
            div.appendChild(img)
            a.appendChild(div)


            listItem.appendChild(a)

        })
    }

    return listItem
}


