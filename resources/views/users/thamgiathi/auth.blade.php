@extends('users.thi')
@section('content')

	<script type="text/javascript">

		setTimeout(function(){history.back();}, 5000);
		swal({
			title: "Xin lỗi!",
			text: "Bạn đã hết lượt tham gia bài thi, nếu gặp vấn đề thì hãy liên hệ với ban tổ chức!",
			type: "error",
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Trở về",
			closeOnConfirm: false,
		},
		function(isConfirm){
			if (isConfirm) {
				history.back();
			} 
		});


	
	</script>
@endsection