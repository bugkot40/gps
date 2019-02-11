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
});