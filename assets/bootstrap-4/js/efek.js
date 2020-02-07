$('.page-scroll').on('click', function (e) {

    var tujuan = $(this).attr('href');
    var elemenTujuan = $(tujuan);

    //jumbtoton
    $('body').animate({
        scrollTop: elemenTujuan.offset().top - 50
    }, 1250);

    e.preventDefault();
});

// parallax
//about
$(window).on('load', function () {
    $('.pKiri').addClass('pMuncul');
    $('.pKanan').addClass('pMuncul');
});
$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    $('.jumbotron img').css({
        'transform': 'translate(0px, ' + wScroll / 4 + '%)'
    });

    $('.jumbotron h1').css({
        'transform': 'translate(0px, ' + wScroll / 2 + '%)'
    });

    $('.jumbotron p').css({
        'transform': 'translate(0px, ' + wScroll / 1.2 + '%)'
    });

    //portofolio
    if (wScroll > $('.portofolio').offset().top - 200) {
        $('.portofolio .thumbnail').each(function (i) {
            setTimeout(function () {
                $('.portofolio .thumbnail').eq(i).addClass('muncul');
            }, 300 * (i + 1));
        });

    }
    

});
$(function () {
    $('#gallery a').lightBox();
});
const materialbox = document.querySelectorAll('#materialboxed');
M.Materialbox.init(materialbox);
    // Swift alert
    // $("#kirim").click(function() {
    //     var name = $("#name").val();
    //     var email = $("#email").val();
    //     var telp = $("#telp").val();
    //     var mess = $("#mess").val();

    //     if (name==''||email==''||telp==''||mess='') {
    //         swal({
    //             title: "Status Pengiriman",
    //             text: "Pesan akan dikirimkan",
    //             icon:"success";
    //             button:"Ok"

    //         });
    //     }
    // });