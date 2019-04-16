$("document").ready(function () {

    $('.js_start').on('click', 'a.js_test', function () {
        var id = $(this).data('id');
        var url = '?r=' + $(this).data('url');
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            data: {
                'id': id
            },
            success: function (res) {
                $('.content').html(res);
            },
            error: function () {
                alert('Сбой передачи');
            }
        });
        return false; //лучше так отключать дефолтное поведение html элементов
    });

    $('.js_start').on('click', '.vis_close', function () {
        $(this).toggleClass("vis_close vis_open");
        $('.vis_answer').css('display', 'block');
        $('#image').css('display', 'block');
    });

    $('.js_start').on('click', '.vis_open', function () {
        $(this).toggleClass("vis_open vis_close");
        $('.vis_answer').css('display', 'none');
        $('#image').css('display', 'none');
    });

    // $('.js_start').on('mouseenter', '.question', function () {
    //     $(this).toggleClass("question question-mouseenter")
    // });
    //
    // $('.js_start').on('mouseleave', '.question-mouseenter', function () {
    //     $(this).toggleClass("question-mouseenter question")
    // });
    //
    // $('.js_start').on('mouseenter', '.answer', function () {
    //     $(this).toggleClass("answer answer-mouseenter")
    // });
    //
    // $('.js_start').on('mouseleave', '.answer-mouseenter', function () {
    //     $(this).toggleClass("answer-mouseenter answer")
    // });

    $('.archive').on('click', function () {
        $('.js_start').css('display', 'none');
        $(this).parent().next().css('display', 'block');
        $('#close').css('visibility', 'visible')
    });

    $('#close').on('click', function () {
        $('div.archiveQuestion').css('display', 'none');
        $('.js_start').css('display', 'block');
        $(this).css('visibility', 'hidden');
    });

    $('.img').on('mouseenter', function () {
        var zoom = 50;
        $(this).css('cursor', 'zoom-in');
        $(this).on('click', function () {
            zoom = zoom + 25;
            var width = zoom + '%';
            $(this).css('width', width);
        });
    });

    $('.img').on('mouseleave', function () {
        $(this).css('width', '50%');
    });

    $('.js_start').on('mouseenter', '.img', function () {
        var zoom = 50;
        $(this).css('cursor', 'zoom-in');
        $(this).on('click', function () {
            zoom = zoom + 25;
            var width = zoom + '%';
            $(this).css('width', width);
        });
    });

    $('.js_start').on('mouseleave', '.img', function () {
        $(this).css('width', '50%');
    });


});

