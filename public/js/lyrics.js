let btnLike = document.querySelector('#like')

window.onload = function () {
    if (localStorage.getItem('id') == "") {
        btnLike.style.display = 'none'
    }else{
        let li = JSON.parse(localStorage.getItem('saveList'))
        if (li != null) {
            li.forEach(e => {
                if (e.id == localStorage.getItem('id')) {
                    btnLike.children[0].classList.remove('fa-heart')
                    btnLike.children[0].classList.add('fa-circle-check')
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
        this.children[0].classList.add('fa-circle-check')
        this.disabled = true
        listItem = showList(listItem)
        btnOpenPrinc.classList.add('show');
        sliderPrinc.classList.add('show');
    }
})

