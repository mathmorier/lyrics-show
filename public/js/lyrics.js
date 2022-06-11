let btnLike = document.querySelector('#like')
let btnFull= document.querySelector('#full')

window.onload = function () {
    if (localStorage.getItem('id') == "") {
        btnLike.style.display = 'none'
        btnLike.disabled = false;
    }else{
        let li = JSON.parse(localStorage.getItem('saveList'))
        if (li != null) {
            let saved = false
            li.forEach(e => {
                if (e.id == localStorage.getItem('id')) {
                    btnLike.children[0].classList.replace('fa-heart','fa-check')
                    // btnLike.children[0].classList.remove('fa-heart')
                    // btnLike.children[0].classList.add('fa-check')
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
            alert('Use F11 for full screen')
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
            alert('Use F11 for exit full screen')
        }
    }
    return isInFullScreen;
}
