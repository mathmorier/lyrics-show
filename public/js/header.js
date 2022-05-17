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
const shareLyrics    = document.getElementById('share-lyrics')
let listItem         = document.getElementById('list-item')

listItem = showList(listItem)

shareLyrics.addEventListener('click', function () {
    createShare()
})


saveLyrics.addEventListener('click', function () {

    addItemList(
        localStorage.getItem('id'),
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

function createShare() {
    let list = JSON.parse(localStorage.getItem('saveList'))
    let link =  "http://localhost"
    link += "/lyrics/list/"
    list.forEach(e => {
        link += e.id 
        link += "-"
    })
    link = link.substring(0, link.length - 1)
    alert(link);
}

function addItemList(id,api_path,title,song_art_image_thumbnail_url) {
    let list = JSON.parse(localStorage.getItem('saveList'))
    
    if (api_path == "") {
        alert('No sing selected')
        return
    }

    let line = {
        id: id,
        api_path: api_path,
        title: title,
        song_art_image_thumbnail_url: song_art_image_thumbnail_url
    }

    if (list!=null) {
        list.push(line)
    }else{
        list = [{
            id: id,
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


