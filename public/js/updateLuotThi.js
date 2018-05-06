$(document).ready(function(){
    $('.updateLT_All').click(function(){
        var qty = $('.qty').val();
        $.ajax({
				url: 'cap-nhat-luot-all/'+qty,
				type: 'GET',
				cache: false,
				data: {'qty': qty},
				success:function(data){
					if(data == 1){
						window.location='list';
					}
				}
			});
    });
    $('.updateLT').click(function(){
        var id = $(this).attr('id');
        var qty = $(this).parent().find('.qty').val();
        $.ajax({
				url: 'cap-nhat-luot/'+id+'/'+qty,
				type: 'GET',
				cache: false,
				data: {'id': id,'qty': qty},
				success:function(data){
					if(data == 1){
						window.location='list';
					}
				}
			});
    });
});

