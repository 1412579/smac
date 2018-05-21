$.ajaxSetup({
     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

     var index = 1;

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
      $('#nextQuestion').click(function(){
          if(!$('#question-' + index + ' .pickAns .radio input[type="radio"]').is(':checked')){
            $('#erroralert').text("Vui lòng chọn đáp án, hoặc 30s sau sẽ tự chuyển câu hỏi");
            $('#erroralert').show();
            return false;
          }
           if(!$('#question-' + index).hasClass('hide')){
                nextQuestion();
            }
      });
});

function nextQuestion(){
    if(!$('#question-' + index).hasClass('hide')){
        $('#question-' + index).hide();
        $('#erroralert').hide();
        index++;
        $('#question-' + index).show();
        if(index == 45){
            $('#saveBaiThi').show();
            $('#nextQuestion').hide();
        }
    }
}

function nextQuestionNum(numindex){
        $('#erroralert').hide();
        $('#question-' + index).hide();
        index++;
        $('#question-' + numindex).show();
        //console.log("index Func:" + index);
        if(index == 45){
            $('#saveBaiThi').show();
            $('#nextQuestion').hide();
        }
}

function xacnhanxoa(msg){
    if(window.confirm(msg)){
        return true;
    }
    return false;
}


