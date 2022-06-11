const btnOpenPrinc = document.getElementById('btn-open-princ')
const navPrinc = document.getElementById('nav-princ')
const sliderPrinc = document.getElementById('slider-princ')

btnOpenPrinc.addEventListener('click', function() {
    this.classList.toggle('show');
    sliderPrinc.classList.toggle('show');
})


// -------------- Option close slider -----------------------
// use : serach genius
try {
    const searchHe    = document.getElementById('search')
    searchHe.addEventListener('click', function () {
        btnOpenPrinc.classList.remove('show')
        sliderPrinc.classList.remove('show')
    })
} catch (e) {
    
}

//----------------------------------------------------------


// ------------------- Save Liste -------------------------
const saveLyrics     = document.getElementById('save-lyrics')
const clearLyrics    = document.getElementById('clear-lyrics')
const shareLyrics    = document.getElementById('share-lyrics')
const btnCopy        = document.getElementById('copy-link')
let listItem         = document.getElementById('list-item')
let listLink         = document.querySelector('#list-link')

listItem = showList(listItem)

btnCopy.addEventListener('click', function () {
    listLink.children[0].select();
    document.execCommand('copy');
    this.firstChild.classList.remove('fa-copy')
    this.firstChild.classList.add('fa-check')
})

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
    if (localStorage.getItem('id')) {
        this.children[0].classList.remove('fa-heart')
        this.children[0].classList.add('fa-circle-check')
        this.disabled = true
        try {
            btnLike.children[0].classList.replace('fa-heart','fa-circle-check')
            btnLike.disabled = true
            lists.forEach(list => {
                list = showList(list)
            });
        } catch (error) {}
        
    }
})

clearLyrics.addEventListener('click', function () {
    clearList()
    listItem = showList(listItem)
    try {
        btnLike.children[0].classList.replace('fa-check','fa-heart')
        btnLike.disabled = false
    } catch (error) {}
    try {
        lists.forEach(list => {
            list = showList(list)
        });
    } catch (error) {}
})

function createShare() {
    let list = JSON.parse(localStorage.getItem('saveList'))
    let link = document.location.protocol + "//"
    link += document.location.host
    link += "/lyrics/list/"
    if (list == null || list.length == 0) {
        addItemList(
            localStorage.getItem('id'),
            localStorage.getItem('api_path'),
            localStorage.getItem('title'), 
            localStorage.getItem('song_art_image_thumbnail_url')
            )
            listItem = showList(listItem)
            list = JSON.parse(localStorage.getItem('saveList'))
    }
    list.forEach(e => {
        link += e.id 
        link += "-"
    })
    link = link.substring(0, link.length - 1)

    listLink.classList.add('show')
    listLink.children[0].value = link
    console.log();


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
        list = [line]
    }

    localStorage.setItem('saveList', JSON.stringify(list))
    listLink.classList.remove('show')
}

function clearList() {
    let ok = confirm('Delete the list ?')
    if (ok) {
        localStorage.removeItem('saveList')
        listLink.classList.remove('show')    
        saveLyrics.children[0].classList.replace('fa-circle-check','fa-heart')
        saveLyrics.disabled = false
        try {  
            btnLike.children[0].classList.replace('fa-circle-check','fa-heart')
            btnLike.disabled = false
            lists.forEach(list => {
                list = showList(list)
            });
        } catch (e) {}
    }


}

function showList(listItem) {
    listItem.innerHTML = ""
    let list = JSON.parse(localStorage.getItem('saveList'))
    btnCopy.firstChild.classList.add('fa-copy')
    btnCopy.firstChild.classList.remove('fa-check')



    if (list!=null) {
        list.forEach(e => {

            if (e.id == localStorage.getItem('id')) {
                saveLyrics.children[0].classList.remove('fa-heart')
                saveLyrics.children[0].classList.add('fa-circle-check')
                saveLyrics.disabled = true;
            }

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


