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

});

