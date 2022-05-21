let btnLike = document.querySelector('#like')

btnLike.addEventListener('click', function () {
    this.children[0].classList.remove('fa-heart')
    this.children[0].classList.add('fa-circle-check')
    this.disabled = true
    addItemList(
        localStorage.getItem('id'),
        localStorage.getItem('api_path'),
        localStorage.getItem('title'), 
        localStorage.getItem('song_art_image_thumbnail_url')
        )
    listItem = showList(listItem)
    btnOpenPrinc.classList.add('show');
    sliderPrinc.classList.add('show');
})

