$(document).ready(function() {

});

$(".main").onepage_scroll({
    sectionContainer: ".screen",
    easing: "ease",
    animationTime: 1000,
    pagination: true,
    updateURL: false,
    beforeMove: function(index) {},
    afterMove: function(index) {},
    loop: false,
    keyboard: true,
    responsiveFallback: false,
    direction: "vertical"
});

$('.landing-portfolio').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    centerMode: false,
    dots: true
});







