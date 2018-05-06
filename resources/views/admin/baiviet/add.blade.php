@extends('admin.index')
@section('content')

        <div id="page-wrapper">
        <!-- Báo lỗi khi nhập sai -->
       
            <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới bài viết</h1>
            </div>
            <div class="col-lg-8">
                <form role="form"  action="{!! route('admin.baiviet.postAdd') !!}"  method="POST"  enctype="multipart/form-data">
                    <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Tiêu đề bài viết</label>
                        <textarea class="form-control" placeholder="Tiêu đề bài viết" rows="1" name="title">{!! old('title') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Ảnh thumbnail (wight - heigh: 900x400)</label>
                        <input type="file" name="thumbnail" {!! old('thumbnail') !!}>
                    </div>
                    <div class="form-group">
                        <label>Mô tả ngắn</label>
                        <textarea class="form-control" placeholder="Nội dung đầu bài" rows="3" name="headline">{!! old('headline') !!}</textarea>
                        <script type="text/javascript">
                            ckeditor('headline');
                        </script>
                    </div>
                    <div class="form-group">
                        <label>Nội dung chính</label>
                        <textarea class="form-control" placeholder="Nội dung chính" rows="3" name="content">{!! old('content') !!}</textarea>
                        <script type="text/javascript">
                            ckeditor('content');
                        </script>

                    </div>
                     <input style="margin-bottom: 50px" type="submit" class="btn btn-success" id="" value="Thêm bài viết" >
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