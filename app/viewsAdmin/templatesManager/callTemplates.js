$('.pages').each(function() {
    $(this).on('click', function(){
        var page = $(this).data('href');
        getTemplate(page);
    });
});

function getTemplate(template) {
    $.ajax({
        url: 'templatesManager/getTemplate.php',
        type: 'POST',
        dataType: 'html',
        data: {
            template: template
        }
    })
        .done(function(template) {
            console.log("success");
            var app = $('#app');
            app.animate({
                opacity: 0,
            }, 500, function() {
                app.children().remove();
                app.append(template)
                    .animate({
                    opacity: 1,
                }, 500);
            })
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
}

$(document).ready(function(){
    var urlParams, i, params;
    //check url of the page
    urlParams = window.location.search;
    i = urlParams.indexOf("=");
    params = urlParams.substring(i + 1, urlParams.length);
    if(params) getTemplate(params);
});

