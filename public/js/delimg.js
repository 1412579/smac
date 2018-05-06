
$(document).ready(function(){
    $('.delimg').click(function(){
        var id = $('#image').attr('idTN');
        var src = $('#image').attr('src');
        src = src.slice(src.indexOf("/public")+1,src.length);
 		// alert(src);
        $.ajax({
				url: '../del-img/'+id,
				type: 'GET',
				cache: false,
				data: {
					'id': id,
					'src': src
				},
				success:function(data){
					if(data == 1){
						location.reload();
					}
				}
			});
    });
    $('.delThumb').click(function(){
        var id = $('#thumbnail').attr('idBV');
        var src = $('#thumbnail').attr('src');
        src = src.slice(src.indexOf("/public")+1,src.length);
 		// alert(src);
        $.ajax({
				url: '../del-thumb/'+id,
				type: 'GET',
				cache: false,
				data: {
					'id': id,
					'src': src
				},
				success:function(data){
					if(data == 1){
						location.reload();
					}
				}
			});
    });
});


