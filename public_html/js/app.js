// start full page plugin



var checksize = function () {
    // if ($(window).width() < 1025 && $.fn.fullpage) {
    //     $.fn.fullpage.destroy();
    // }
};

function setLike(url, photo_id, cb) {

    $.ajax({
        url: url,
        type: 'post',
        data: {
            photo_id: photo_id
        },
        success: function(data) {
            cb();
        },
        error: function() {
            $('.preloader').hide();
        }
    });

};

function popup(photo, like) {
    $('.popup-wrapper').removeClass('popup');
    $('like').html(like);
    $('#popupImg').attr('src', photo);
    $('#vk').attr('href', 'https://vk.com/share.php?url=http://syossdev.soc-app.ru/gallery&title=Заголовок&image=http://syossdev.soc-app.ru/'+ photo);
    $('#fb').attr('href', 'https://www.facebook.com/sharer/sharer.php?u=http://syossdev.soc-app.ru/gallery&title=Заголовок&src=http://syossdev.soc-app.ru/'+ photo);
};

function addLike(photo_id, self) {

    var unset = $('#unSetLike' + photo_id);
    var set = $('#setLike' + photo_id);
    var text = set.children('like').text();

    $('.preloader').show();
    setLike('/setLike', photo_id, function() {
        set
            .hide()
            .children('like')
            .html(
                parseInt(text + 1)
            );
        unset
            .show()
            .children('like')
            .html(
                parseInt(text + 1)
            );
        $('.preloader').hide();
    });

};

function removeLike(photo_id) {

    var unset = $('#unSetLike' + photo_id);
    var set = $('#setLike' + photo_id);
    var text = set.children('like').text();

    $('.preloader').show();
    setLike('/unSetLike', photo_id, function() {
        set
            .show()
            .children('like')
            .html(
                parseInt(text - 1)
            );
        unset
            .hide()
            .children('like')
            .html(
                parseInt(text - 1)
            );
        $('.preloader').hide();
    });

};

function urlParse() {

    var object = {};
    if (window.location.href.split('?').length > 1) {
        window.location.href.split('?')[1].split('&').forEach(function(item) {
            object[item.split('=')[0]] = item.split('=')[1];
        });
    }
    return object;

}

$(document).ready(function () {

    var parseURI = urlParse();

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

    $('#popupHide').on('click', function() {
        $('.popup-wrapper').addClass('popup');
    });

    $('#capture').on('click', function(e){
        e.preventDefault();
        $('#files')[0].click();
    });

    var skip = 10;
    var take = 10;
    $('#more').click(function() {

        $('.preloader').show();
        $.ajax({
            url: '/more',
            type: 'get',
            data: {
                skip: skip,
                take: take,
                layout: 'itemPhoto',
                order: parseURI.order
            },
            success: function(data) {
                skip += take;
                $('#wrap').append(data);
                $('.preloader').hide();
            }
        });

    });

       $('.alert-success, .alert-error').click(function () {
           $(this).hide();
       });

       $('#reCompetitionSub').on('click', function() {

           $('.preloader').show();
           $.ajax({
               url: '/room/reCompetition',
               type: 'post',
               success: function(data) {
                    window.location.reload()
               }
           });

       })

});