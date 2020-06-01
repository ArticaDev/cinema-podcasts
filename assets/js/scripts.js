$(function() {
	
    var ww = document.body.clientWidth;
    if (ww > 460 && ww <1200) {
        $('#img-player').hide();
        $('#playerFrame').attr("style","");
        $('#playerFrame').attr("width","1000");
        $('#playerFrame').attr("height","300");
    };

	$( "body" ).on('click','#more',function() {
	   
         $(this).parent().siblings().find("#thumbnail, #description").toggle("slow");

	});

    $('#search').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: 'episodios.php?pesquisa='+$('#search-input').val(),
            type: 'GET',
            success: function(response) {
                $('#eps').fadeOut(800, function(){
                	$('#eps').html($(response).find('#eps').html()).fadeIn().delay(2000);

                });
            }
        });

    });
    
    var start = 0;

    $('#see-more').click(function(e){
    	start += 6;

        $.ajax({
            url: 'episodios.php?inicio='+start+'pesquisa='+$('#search-input').val(),
            type: 'GET',
            success: function(response) {
                $('#eps').fadeOut(800, function(){
                	$('#eps').append($(response).find('#eps').html()).fadeIn().delay(2000);

                });
            }
        });

    });




});
