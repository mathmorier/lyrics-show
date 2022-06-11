let btnLike     = document.querySelector('#like')
let btnFull     = document.querySelector('#full')
let btnDark     = document.querySelector('#btn-dark')
let emLyrics    = document.querySelector('#embed-content-lyrics')


if (emLyrics != null) {
    btnDark.style.display = 'block'   
    if (localStorage.getItem('mode') == 'black') {
        btnDark.classList.add('dark')
    }else{
        btnDark.classList.remove('dark')
    }
    changBtnDark()
}

window.onload = function () {
    if (localStorage.getItem('id') == "") {
        btnLike.disabled = false;
    }else{
        btnLike.style.display = 'block'
        let li = JSON.parse(localStorage.getItem('saveList'))
        if (li != null) {
            let saved = false
            li.forEach(e => {
                if (e.id == localStorage.getItem('id')) {
                    btnLike.children[0].classList.replace('fa-heart','fa-check')
                    saved = true
                }
            })
            btnLike.disabled = saved
        }else{
            btnLike.disabled = false;
        }
        
    }
}

btnLike.addEventListener('click', function () {
    addItemList(
        localStorage.getItem('id'),
        localStorage.getItem('api_path'),
        localStorage.getItem('title'), 
        localStorage.getItem('song_art_image_thumbnail_url')
        )
    if (localStorage.getItem('id')) {
        this.children[0].classList.remove('fa-heart')
        this.children[0].classList.add('fa-check')
        this.disabled = true
        listItem = showList(listItem)
        btnOpenPrinc.classList.add('show');
        sliderPrinc.classList.add('show');
        lists.forEach(list => {
            list = showList(list)
        });
    }
})

btnFull.addEventListener('click', function () {
    if (changeFullNoFull()) {
        this.innerHTML = "<i class='fa-solid fa-expand'></i>Full Screen"
    }else{
        this.innerHTML = "<i class='fa-solid fa-compress'></i>Exit"
    }
})


btnDark.addEventListener('click', function () {
    btnDark.classList.toggle('dark')
    changBtnDark()
})

function changBtnDark() {
    if (btnDark.classList.contains('dark')) {
        btnDark.innerHTML = "<i class='fa-solid fa-sun'></i>"
        emLyrics.classList.add('dark')
        localStorage.setItem('mode','black')
    }else{
        btnDark.innerHTML = "<i class='fa-solid fa-moon'></i>"
        localStorage.setItem('mode','white')
        emLyrics.classList.remove('dark')
    }
}


function changeFullNoFull() {

    var isInFullScreen = (document.fullscreenElement && document.fullscreenElement !== null) ||
    (document.webkitFullscreenElement && document.webkitFullscreenElement !== null) ||
    (document.mozFullScreenElement && document.mozFullScreenElement !== null) ||
    (document.msFullscreenElement && document.msFullscreenElement !== null);

    var docElm = document.documentElement;
    if (!isInFullScreen) {
        if (docElm.requestFullscreen) {
            docElm.requestFullscreen();
        } else if (docElm.mozRequestFullScreen) {
            docElm.mozRequestFullScreen();
        } else if (docElm.webkitRequestFullScreen) {
            docElm.webkitRequestFullScreen();
        } else if (docElm.msRequestFullscreen) {
            docElm.msRequestFullscreen();
        }else{
            alert('Not possible on your browser, try F11 for full screen or change your browser')
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.msExitFullscreen) {
            document.msExitFullscreen();
        }else{
            alert('Not possible on your browser, try F11 for exit full screen or change your browser')
        }
    }
    return isInFullScreen;
}
