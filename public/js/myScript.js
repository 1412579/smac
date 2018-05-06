$.ajaxSetup({
     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});


$(document).ready(function(){
    $('#form-submit').submit(function(){
        window.onbeforeunload = null;
        var timing = $("#timer").text().replace(/:/g,'');
        $('#tgconlai').val(timing);
        swal("Hoàn thành!", "Chúc mừng bạn đã hoàn thành bài thi!", "success");
    });
    $('#changeInfo').click(function(event){
            if(!$('#MSSVmemberOne').val() || !$('#MSSVmemberTwo').val() || !$('#MSSVcaptain').val() || !$('#memberTwo').val() || !$('#captainEmail').val() || !$('#captainPhone').val() || !$('#memberOne').val() || !$('#captainEmail').val() || !$('#teamName').val() )
            {
                swal({
                  title: "Xin lỗi!",
                  text: "Vui lòng nhập đầy đủ các thông tin trước khi xác nhận!",
                  type: "error",
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Trở về",
                  closeOnConfirm: false,
                });
                event.preventDefault();
            }
        });
      $('#changePass').click(function(event){
          if($('#newpass').val() != $('#confirmnewpass').val() )
          {
              swal({
                title: "Xin lỗi!",
                text: "Mật khẩu mới và xác nhận mật khẩu mới không giống nhau, vui lòng kiểm tra lại!",
                type: "error",
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Trở về",
                closeOnConfirm: false,
              });
              event.preventDefault();
          }
      });
});


function xacnhanxoa(msg){
    if(window.confirm(msg)){
        return true;
    }
    return false;
}


