$(document).ready(function() {

    var table = $('#informer1').html();
    $('.informer2').append(table);

    $('blockquote .icon a').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: '/ru/site/blockout/',
            data: {
                quote_id: 1
            },
            dataType: 'json',
            success: function (result) {
                if (result.status == 1) {
                    $('blockquote .mytext').empty().append(result.body);
                    $('blockquote .author').empty().append(' - ' + result.title);
                    return false;
                }
            }
        });
        return false;
    });

});