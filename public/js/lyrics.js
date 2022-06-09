let btnLike = document.querySelector('#like')
let btnFull= document.querySelector('#full')

window.onload = function () {
    if (localStorage.getItem('id') == "") {
        btnLike.style.display = 'none'
    }else{
        let li = JSON.parse(localStorage.getItem('saveList'))
        if (li != null) {
            li.forEach(e => {
                if (e.id == localStorage.getItem('id')) {
                    btnLike.children[0].classList.remove('fa-heart')
                    btnLike.children[0].classList.add('fa-check')
                    btnLike.disabled = true;
                }
            });
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
    }
})

btnFull.addEventListener('click', function () {
    if (changeFullNoFull()) {
        this.children[0].classList.remove('fa-compress')
        this.children[0].classList.add('fa-expand')
    }else{
        this.children[0].classList.remove('fa-expand')
        this.children[0].classList.add('fa-compress')
    }
    
    // this.disabled = true
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
    // var player = document.documentElement

    // if (player.requestFullscreen){
    //     player.requestFullscreen();
    // }
    // else if (player.mozRequestFullScreen){
    //     player.mozRequestFullScreen(); // Firefox
    // }
    // else if (player.webkitRequestFullscreen){
    //     player.webkitRequestFullscreen(); // Chrome and Safari
    // }else{
    //     alert('Use F11 for full screen')
    // }
}
