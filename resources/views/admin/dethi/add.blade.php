@extends('admin.index')
@section('content')

        <div id="page-wrapper">
        <!-- Báo lỗi khi nhập sai -->
       
            <div class="col-lg-12">
                    <h1 class="page-header">Thêm mới đề thi</h1>
            </div>
            <div class="col-lg-6">
                <form role="form"  action="{!! route('admin.dethi.postAdd') !!}"  method="POST"  enctype="multipart/form-data">
                    <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
                    <div class="form-group">
                        <label>Selects</label>
                        <select class="form-control" name="idBo">
                             @foreach($bode as $item)
                                <option value="{!! $item->idBoDe !!}" >{!! $item->TenBo !!}</option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên đề bài</label>
                        <input class="form-control" name="TenDe" placeholder="Tên đề bài" value="{!! old('TenDe') !!}">
                    </div>
                    <div class="form-group" >
                        <label>Tập tin đề trắc nghiệm</label>
                        <input type="file" name="fileDeTN">
                    </div>
                     <input type="submit" class="btn btn-success" id="" value="Thêm đề thi" >
                </form>
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
             <div class="col-lg-6">
             <div class="noti" style="margin-top:30px">
                <p>Hãy kiểm tra kỹ file đề trước khi thêm, và chắc chắn rằng nó đúng theo cú pháp của file mẫu để tránh tình trạng lỗi xảy ra.
                Nếu xảy ra lỗi vui lòng kiểm tra lại file upload, xoá đề cũ trong phần danh sách đề thi và upload đề mới.</p>
             </div>
                 


            </div>
        </div>
        <!-- /#page-wrapper -->
@endsection