<?php
	function stripUnicode($str){
		if(!$str) 
			return false;
		$unicode = array(
			'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẵ|ẳ|ặ|â|ấ|ầ|ẫ|ẩ|ậ',
			'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Ấ|Ầ|Ẩ|Ẫ|Ậ|Â',
			'd'=>'đ',
			'D'=>'Đ',
			'e'=>'é|è|ẻ|ẹ|ẽ|ê|ế|ề|ể|ễ|ệ',
			'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
			'i'=>'í|ì|ị|ỉ|ĩ',
			'I'=>'Í|Ì|Ị|Ĩ|Ỉ',
			'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|õ|ợ',
			'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
			'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
			'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
			'y'=>'ý|ỳ|ỷ|ỵ|ỹ',
			'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			'-'=>'/|<|>'
			);
		foreach ($unicode as $khongdau=>$codau) {
			$arr=explode("|", $codau);
			$str=str_replace($arr, $khongdau, $str);
		}
		return $str;
	}
	

	function changeTitle($str){
		$str=trim($str);
		if($str==="") return "";
		$str = str_replace('"','',$str);
		$str = str_replace("'",'',$str);
		$str = stripUnicode($str);
		$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		
		//mb case upper/title/lower
		$str = str_replace(' ','-',$str);
		return $str;
	}
	function displayAlert()
	{
	    if (Session::has('message'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Bạn phải đăng nhập trước khi tham gia thi!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}
	
	function expiredImforUser()
	{
	    if (Session::has('expiredImforUser'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Đã hết thời gian cập nhật thông tin nhóm dự thi!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}

	function displayAlertThongTin()
	{
	    if (Session::has('displayAlertThongTin'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Bạn phải cập nhật thông tin nhóm trước khi thi!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}
	
	function displayAlertNotEnoughLT_Before()
	{
	    if (Session::has('displayAlertNotEnoughLT'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Hiện tại chưa tới thời gian thi, hãy chờ đợi thêm nhé!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}

	
	function displayAlertNotEnoughLT()
	{
	    if (Session::has('displayAlertNotEnoughLT'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Bạn không còn đủ lượt thể tham gia, hãy liên hệ ban tổ chức nếu cần thiết!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}
	
	function displayAlertNotEnoughLT_After()
	{
	    if (Session::has('displayAlertNotEnoughLT'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Thời gian tham gia thi đã hết!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}

	function changeInfo()
	{
	    if (Session::has('changeInfo'))
	    {
	       echo '<script type="text/javascript">swal({
                        title: "Thành công!",
                        text: "Cám ơn bạn đã cập nhật thông tin!",
                        type: "success",
                        confirmButtonColor: "#05bc05",
                        confirmButtonText: "Trở về",
                        closeOnConfirm: true,
                      });</script>';
	    }

	}

	function displayAlertPass()
	{
	    if (Session::has('displayAlertPass'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Xin lỗi!",
	          text: "Mật khẩu cũ của bạn không chính xác!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}

	function changePass()
	{
	    if (Session::has('changePass'))
	    {
	       echo '<script type="text/javascript">swal({
                        title: "Thành công!",
                        text: "Bạn đã đổi mật khẩu thành công!",
                        type: "success",
                        confirmButtonColor: "#05bc05",
                        confirmButtonText: "Trở về",
                        closeOnConfirm: true,
                      });</script>';
	    }

	}

	function checkPassword()
	{
	    if (Session::has('checkPassword'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Thông báo!",
	          text: "Mật khẩu hiện tại không chính xác!",
	          type: "error",
	          confirmButtonColor: "#DD6B55",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}
	function displayFirshLogin()
	{
	    if (Session::has('firstLogin'))
	    {
	       echo '<script type="text/javascript">swal({
	          title: "Thông báo!",
	          text: "Đây là lần đầu tiên bạn đăng nhập, hãy cập nhật thông tin và đổi mật khẩu nhé!!!",
	          type: "success",
	          confirmButtonColor: "#15f215",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}

	function displayResult()
	{
	    if (Session::has('displayResult'))
	    {
		  $rs = Session::get('displayResult');
	       echo '<script type="text/javascript">swal({
	          title: "Kết quả thi",
	          text: "Số câu đúng: '.$rs["numTrue"].' và thời gian còn lại: '.$rs["timeLeft"].'",
	          type: "success",
	          confirmButtonColor: "#15f215",
	          confirmButtonText: "Trở về",
	          closeOnConfirm: false,
	        });</script>';
	    }

	}

	function generateRandomPassword ($length) {
		// $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$characters = '123456789';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
?>