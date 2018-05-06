@extends('admin.index')
@section('content')

       <div id="page-wrapper">
        <!-- Báo lỗi khi nhập sai -->
        <form role="form" id="form-editquestiontn"  action="{!! route('admin.dethi.peditQuestionTN') !!}"  method="POST"  enctype="multipart/form-data">
         <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
            <div class="col-lg-12">
                    <h1 class="page-header">Sửa câu hỏi - ID câu: <span id="idTN">{{ $cauhoi->idTN }}</span></h1>
            </div>
            <div class="col-lg-6">
            <div class="row" style="margin-top: 15px">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{!! $error !!}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                    <div class="form-group">
                        <label>ID</label>
                        <textarea class="form-control" readonly="readonly" rows="1" name="idTN">{{ $cauhoi->idTN }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" placeholder="Nội dung câu hỏi" rows="3" name="NoiDung">{{ $cauhoi->NoiDung }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đáp án A</label>
                        <textarea class="form-control" placeholder="Câu trả lời A" rows="3" name="DapAn1">{{ $cauhoi->DapAn1 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đáp án B</label>
                        <textarea class="form-control" placeholder="Câu trả lời B" rows="3" name="DapAn2">{{ $cauhoi->DapAn2 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đáp án C</label>     
                        <textarea class="form-control" placeholder="Câu trả lời C" rows="3" name="DapAn3">{{ $cauhoi->DapAn3 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đáp án D</label>
                        <textarea class="form-control" placeholder="Câu trả lời D" rows="3" name="DapAn4">{{ $cauhoi->DapAn4 }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Đáp án đúng</label>
                        <textarea class="form-control" placeholder="Câu trả lời đúng" rows="3" name="DapAnDung">{{ $cauhoi->DapAnDung }}</textarea>
                    </div>
                    <?php
                        if(empty($cauhoi->hinhanh))
                            echo '<div class="form-group">
                                    <label>Thêm hình ảnh</label>
                                    <input type="file" name="fileAnh">
                                </div>';
                        else{
                            echo '
                            <label>Hình ảnh</label>
                            <div class="form-group">
                                <a href="javascript:void(0)" class="delimg" >Xoá ảnh</a>
                                <img src="'.asset('/public/images/'.$cauhoi->hinhanh).'" id="image" class="img-responsive" idTN="'.$cauhoi->idTN.'" alt="">
                            </div>';
                        }
                    ?>
                    <div style="margin-bottom: 30px;margin-top: 30px">
                        <input type="submit" class="btn btn-success" id="" value="Xác nhận" >
                        <input type="button" class="btn btn-basic" onclick="history.back();" value="Huỷ bỏ" style="margin-left: 15px">    
                    </div>
                </form>
                
                 
            </div>
             <div class="col-lg-6">
             <div  style="margin-top:30px">
                <p>1 -> 4 tương đương đáp án từ A -> D.</p>
             </div>
@endsection