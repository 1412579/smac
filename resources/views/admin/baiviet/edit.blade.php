@extends('admin.index')
@section('content')

        <div id="page-wrapper">
        <!-- Báo lỗi khi nhập sai -->
       
            <div class="col-lg-12">
                    <h1 class="page-header">Sửa bài viết</h1>
            </div>
            <div class="col-lg-8">
                <form role="form"  action="{!! route('admin.baiviet.postEdit') !!}"  method="POST"  enctype="multipart/form-data">
                    <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
                    <input type="hidden" name="idBV" value="{!! $baiviet->idBV !!}">
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <textarea class="form-control" placeholder="Tiêu đề bài viết" rows="1" name="title">{!! $baiviet->title !!}</textarea>
                    </div>
                    <div class="form-group">
                        <?php
                        if(empty($baiviet->thumbnail))
                            echo '<div class="form-group">
                                    <label>Thêm thumbnail</label>
                                    <input type="file" name="thumbnail">
                                </div>';
                        else{
                            echo '
                            <label>Thumbnail</label>
                            <div class="form-group">
                                <a href="javascript:void(0)" class="delThumb" >Xoá ảnh</a>
                                <img src="'.asset('/public/thumbnail/'.$baiviet->thumbnail).'" id="thumbnail" class="img-responsive" idBV="'.$baiviet->idBV.'" alt="">
                            </div>';
                        }
                    ?>
                    </div>
                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea class="form-control" placeholder="Nội dung đầu bài" rows="3" name="headline">{!! $baiviet->headline !!}</textarea>
                        <script type="text/javascript">
                            ckeditor('headline');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Nội dung chính</label>
                        <textarea class="form-control" placeholder="Nội dung chính" rows="3" name="content">{!! $baiviet->content !!}</textarea>
                        <script type="text/javascript">
                            ckeditor('content');
                        </script>



                    </div>
                     <input type="submit" style="margin-bottom: 20px" class="btn btn-success" id="" value="Sửa bài viết" >
                </form>

            </div>
            <div class="col-lg-4">
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
                 </div>
            
        </div>
        <!-- /#page-wrapper -->
@endsection