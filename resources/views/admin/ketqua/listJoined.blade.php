@extends('admin.index')
@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông tin nhóm đã tham gia thi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách nhóm
                        </div>
                        <div class="col-lg-12">
                            @if(Session::has('flash_massage'))
                                <div  class="alert alert-{{Session::get('flash_level')}}">
                                    {{
                                        Session::get('flash_massage')
                                        }}
                                </div>
                            @endif
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">
                                <thead>
                                    <tr>
                                        <th>ID nhóm</th>
                                        <th>Tên nhóm</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Trình duyệt</th>
                                        <th>Địa chỉ IP</th>
                                        <th>Thời gian tham gia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($team as $item)
                                    <?php
                                            $name = DB::table('teams')->where('id',$item->idNhom)->first();
                                        ?>
                                    <tr class="gradeU">
                                        <td>{{ $item->idNhom }}</td>
                                        <td>{{ $name->TenNhom }}</td>
                                        <td>{{ $name->TenDangNhap }}</td>
                                        <td>{{ $item->TrinhDuyet }}</td>
                                        <td>{{ $item->DiaChiIP }}</td>
                                        <td>{{ $item->created_at }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection
