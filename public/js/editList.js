let listItemEdit = document.querySelector('.list-item-edit')

listItemEdit.innerHTML = ""
let list = JSON.parse(localStorage.getItem('saveList'))

// console.log(list);

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
    del.innerHTML   = '<i class="fa-solid fa-xmark"></i>'

    up.onclick = function ()    { changePlace('up', key) }
    down.onclick = function ()  { changePlace('down', key) }
    del.onclick = function ()   { changePlace('del', key) }

    let cmd     = document.createElement('div')
    cmd.classList.add('cmd')
    cmd.append(up, down, del)

    let div = document.createElement('div')
    div.classList.add('item')

    div.appendChild(document.createElement('p')).appendChild(document.createTextNode(e.title))
    div.append(img, cmd)
    div.setAttribute('id', 'item-' + e.id)
    // div.setAttribute('draggable', true)
    listItemEdit.appendChild(div)


    })
}


function changePlace(cmd, index) {

    let list = JSON.parse(localStorage.getItem('saveList'))

    console.log(list);

    let line = list[index]

    list.splice(index, 1)
    list.splice(index, 0, line)

    // list.splice(index-1, 1, line);

    // localStorage.setItem('saveList', JSON.stringify(list))

    console.log(list);

    // let tab = document.querySelector(".list-item-edit")


    // if (cmd == 'up') {
    //     let move = tab.children[index]
    //     // tab.removeChild(tab.childNodes[index])
    //     tab.insertBefore(move, tab.children[index-1])
    // }
    // if (cmd == 'down') {
    //     let move = tab.children[index]
    //     tab.removeChild(tab.childNodes[index])
    //     tab.insertBefore(move, tab.children[index+1])
    // }

    // if (cmd == 'del') {
    //     // tab.removeChild(tab.childNodes[index])
    // }



    // console.log(list);

    // let line = {
    //     id: 09,
    //     api_path: '/zz',
    //     title: 'test',
    //     song_art_image_thumbnail_url: '/url'
    // }

    // list.push(line)

    // localStorage.setItem('saveList', JSON.stringify(list))

    // listItemEdit = showEditList(listItemEdit)

    // console.log(list);

    // list.forEach(e => {

    // });

    // switch (cmd) {
    //     case 'up':

    //         break;

    //     default:
    //         break;
    // }


}







