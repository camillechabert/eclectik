function commande(nom) {
    document.execCommand(nom, false);
}

$(document).ready(function(){
    var menu = document.getElementsByClassName('menu');
    $('#btn-menu').on('click', function() {
        $(this).toggleClass('open');
        if ($(menu).hasClass('deactivate')) {
            $(menu).removeClass('deactivate').addClass('activate');
        } else {
            $(menu).removeClass('activate').addClass('deactivate');
        }
    });

    function initialiseMediaPlayer() {
        mediaPlayer = document.getElementById('video');
        if (mediaPlayer) mediaPlayer.controls = false;
    }
    initialiseMediaPlayer();

    $('#textarea').on('keyup', function() {
        $('[name=mentions]').val($(this).html());
    });

    $(".trr").on('click', function (e) {
        $('[name=mentions]').val($('#textarea').html());
    })
});



