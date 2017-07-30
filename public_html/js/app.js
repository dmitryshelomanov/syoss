// start full page plugin



var checksize = function () {
    // if ($(window).width() < 1025 && $.fn.fullpage) {
    //     $.fn.fullpage.destroy();
    // }
};

function setLike(url, photo_id) {

    $.ajax({
        url: url,
        type: 'post',
        data: {
            photo_id: photo_id
        },
        success: function(data) {
            console.log(data)
        },
        error: function() {
            console.log('error')
        }
    });

};

$(document).ready(function () {

    var csrftoken = $('meta[name="srf-token"]').attr('content');
    $.ajaxSetup({
        beforeSend: function (xhr, settings) {
            if (!/^(GET|HEAD|OPTIONS|TRACE|POST")$/i.test(settings.type)) {
                xhr.setRequestHeader("X-CSRF-TOKEN", csrftoken)
            }
        }
    });

    $('#fullpage').fullpage({
        scrollingSpeed: 1000
    });

    checksize();

    $(window).resize(function () {
        checksize();
    });

    $('.open-menu').click(function(e) {
        var i1 = $('.open-menu i:first-child');
        var i2 = $('.open-menu i:last-child');
        $('.mobile-menu').fadeToggle(function() {
            if ($(this).attr('style') === 'display: block;') {
                i2.show(); i1.hide();
            } else {
                i1.show(); i2.hide();
            }
        })
    });

    $('#capture').on('click', function(e){
        e.preventDefault();
        $('#files')[0].click();
    });

});