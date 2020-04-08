
// =======================================================
// Swiper
// =======================================================
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: {
        delay: 3000,
    },
    centeredSlides: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});

// =======================================================
// WOW
// =======================================================
wow = new WOW({
    animateClass: 'animated',
    offset: 100
});

wow.init();


// =======================================================
// DatePicker
// =======================================================
$('.datepicker').datepicker({
    format: 'mm-dd-yyyy',
    todayBtn: 'linked'
});


// =======================================================
// ChartJS
// =======================================================
var ctx = document.getElementById('laporan_terkini').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        datasets: [{
            label: 'X',
            backgroundColor: '#6777ef',
            data: [20]
        },
        {
            label: 'XI',
            backgroundColor: '#ffa426',
            data: [10]
        },
        {
            label: 'XII',
            backgroundColor: '#63ed7a',
            data: [20]
        }],
    },
});