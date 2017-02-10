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
        mediaPlayer.controls = false;
    }

    initialiseMediaPlayer()
});