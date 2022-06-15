localStorage.setItem('saveEditList', localStorage.getItem('saveList'))

showEditList()

function showEditList() {
    let list = getList()
    let listItemEdit = document.querySelector('.list-item-edit')
    listItemEdit.innerHTML = ""
    if (list!=null) {
        list.forEach((e, key) => {
            let img = document.createElement('img')
            img.src = e.song_art_image_thumbnail_url
            img.setAttribute("width",   35);
            img.setAttribute("height",  35);

            let up      = document.createElement('button')
            let down    = document.createElement('button')
            let del     = document.createElement('button')

            up.innerHTML    = '<i class="fa-solid fa-angle-up"></i>'
            down.innerHTML  = '<i class="fa-solid fa-angle-down"></i>'
            del.innerHTML   = '<i class="fa-solid fa-trash"></i>'

            up.onclick = function ()    { moveUp(key) }
            down.onclick = function ()  { moveDown(key) }
            del.onclick = function ()   { delItem(key) }

            let cmd     = document.createElement('div')
            cmd.classList.add('cmd')
            cmd.append(up, down, del)

            let div = document.createElement('div')
            div.classList.add('item')

            let songDiv = document.createElement('div')
            songDiv.classList.add('song-info')
            songDiv.append(img)
            songDiv.appendChild(document.createElement('p')).appendChild(document.createTextNode(e.title))
            div.append(songDiv)
            // div.append(img)
            // div.appendChild(document.createElement('p')).appendChild(document.createTextNode(e.title))
            div.append(cmd)
            div.setAttribute('id', 'item-' + e.id)
            // div.setAttribute('draggable', true)
            listItemEdit.appendChild(div)
        
        })
        listItemEdit.firstChild.lastChild.firstChild.disabled   = true
        listItemEdit.lastChild.lastChild.children[1].disabled     = true
    }
}
function getList() {
    return JSON.parse(localStorage.getItem('saveEditList'))
}
function setList(list) {
    localStorage.setItem('saveEditList', JSON.stringify(list))
}
function saveList() {
    localStorage.setItem('saveList', localStorage.getItem('saveEditList'))
    localStorage.removeItem("saveEditList");
    window.location.replace("/")
}
function moveUp(index) {
    let list = getList() 
    
    if (index >= 1 && index <= (list.length-1)) {
        list.splice(index-1,0, list[index])
        list.splice(index+1, 1)
    }

    setList(list)
    showEditList()
}
function moveDown(index) {
    let list = getList() 
    
    if (index >= 0 && index <= (list.length-2)) {
        list.splice(index,0, list[index+1])
        list.splice(index+2, 1)
    }

    setList(list)
    showEditList()
}
function delItem(index) {
    let list = getList() 
    
    if (index >= 0 && index <= (list.length-1)) {
        list.splice(index, 1)
    }

    setList(list)
    showEditList()
}







