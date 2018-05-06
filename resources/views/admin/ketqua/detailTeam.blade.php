@extends('admin.index')
@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý kết quả</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <h3> Chi tiết bài làm - ID nhóm: {{ $team[0]->idNhom }} - Tên nhóm: {{ $info->TenNhom}} - User: {{$info->TenDangNhap }} - <?php
                                try{
                                    $lt = DB::table('des')->where('idDe',$team[0]->idDe)->first();
                                        echo $lt->TenDe;
                                }
                                catch (Exception $e) {
                                    echo "Lỗi!!!";
                                }
                            ?>  
                            </h3>
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
                                        <th>ID TN</th>
                                        <th>Đáp án lựa chọn</th>
                                        <th>Đáp án đúng</th>
                                        <th>Kết quả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($team as $item)
                                    <tr class="gradeU">
                                        <td>{{ $item->idTN }}</td>
                                        <td>{{ $item->DapAnLC }}</td>
                                        <td> <?php
                                        try{
                                            $lt = DB::table('ch_tns')->where('idTN',$item->idTN)->first();
                                                echo $lt->DapAnDung;
                                        }
                                        catch (Exception $e) {
                                            echo "Lỗi!!!";
                                        }
                                        ?></td>
                                        <td>@if($lt->DapAnDung == $item->DapAnLC)
                                            Đúng
                                            @else 
                                            Sai
                                        @endif
                                        </td>
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
        <script src="{{ url('public/js/updateLuotThi.js') }}"></script>
@endsection
