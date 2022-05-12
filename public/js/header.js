const btnOpenPrinc = document.getElementById('btn-open-princ')
const navPrinc = document.getElementById('nav-princ')
const sliderPrinc = document.getElementById('slider-princ')
// btnOpenPrinc.classList.add('show');
// sliderPrinc.classList.add('show');

btnOpenPrinc.addEventListener('click', function() {
    this.classList.toggle('show');
    sliderPrinc.classList.toggle('show');
})