jQuery(function($){

    $('#filter').change(function(){

        var filter = $('#filter');

        $.ajax({
            url: nomadtheme_ajax_params.ajaxurl,
            data: filter.serialize(),
            dataType: 'json',
            type: 'POST',
            success:function(data){
                $('.container-trips').html(data.content);
            }
        })
    });
});