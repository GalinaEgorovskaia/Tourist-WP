jQuery(function($){

    $('#filter').change(function(){

        var filter = $('#filter');

        $.ajax({
            url: nomadtheme_ajax_params.ajaxurl,
            data: filter.serialize(),
            dataType: 'json',
            type: 'POST',
            success:function(data){
                nomadtheme_ajax_params.current_page = 1;
                nomadtheme_ajax_params.posts = data.posts;
                nomadtheme_ajax_params.max_page = data.max_page;

                $('.container-trips').html(data.content);

                if (data.max_page < 2) {
                    $('#loadmore').hide();
                } else{
                    $('#loadmore').show();
                }
            }
        });
        return false;
    });

    $('#loadmore').click(function(){
        $.ajax({
            url : nomadtheme_ajax_params.ajaxurl,
            data : {
                'action': 'loadmore',
                'query': nomadtheme_ajax_params.posts,
                'page' : nomadtheme_ajax_params.current_page
            },
            type : 'POST',
            success : function( posts ){
                if( posts ) {

                    $('.container-trips').append( posts );
                    nomadtheme_ajax_params.current_page++;

                    if (nomadtheme_ajax_params.current_page == nomadtheme_ajax_params.max_page)
                        $('#loadmore').hide();
                }
                else {
                    $('#loadmore').hide();
                }
            }
        });
        return false;
    });
});