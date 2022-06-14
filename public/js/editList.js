let listItemEdit = document.querySelector('.list-item-edit')

listItemEdit = showEditList(listItemEdit)


function showEditList(listEdit) {
    listEdit.innerHTML = ""
    let list = JSON.parse(localStorage.getItem('saveList'))
    
    if (list!=null) {
        list.forEach(e => {
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
        
        up.onclick = function ()    { changePlace('up', e.id) }
        down.onclick = function ()  { changePlace('down', e.id) }
        del.onclick = function ()   { changePlace('del', e.id) }
        
        let cmd     = document.createElement('div')
        cmd.classList.add('cmd')
        cmd.append(up, down, del)
        
        let div = document.createElement('div')
        div.classList.add('item')
        
        div.appendChild(document.createElement('p')).appendChild(document.createTextNode(e.title))
        div.append(img, cmd)
        div.setAttribute('id', 'item-' + e.id)
        listEdit.appendChild(div)

        
        })
    }
}

function changePlace(cmd, id) {

    let list = JSON.parse(localStorage.getItem('saveList'))

    // let item = document.getElementById("item-" + id)

    let listDom = document.querySelector('.list-item-edit')

    let arr = []

    listDom.childNodes.forEach(e => {
        arr.push(e)
    });


    // ICI ************************************************************************

    
    console.log(arr);

    // console.log(item.parentElement);



    if (cmd == 'del') {
        document.getElementById("item-" + id).remove();
    }



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







