let lists = document.querySelectorAll('.list-item')

lists.forEach(list => {
    list = showList(list)
});

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