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
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>User</th>
                                        <th>ID Đề</th>
                                        <th>Lần Thi</th>
                                        <th>Thời gian còn lại (MMss)</th>
                                        <th>Thời gian nộp</th>
                                        <th>Số câu trả lời đúng</th>
                                        <th>Xem chi tiết</th>
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
                                        <td>{{ $item->idDe }}</td>
                                        <td>{{ $item->LanThi }}</td>
                                        <td>{{ $item->ThoiGianHoanThanh }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td><?php
                                             $ans = DB::table('hoanthanh_tns')->select('idTN','DapAnLC')->where('idNhom',$item->idNhom)->where('idDe',$item->idDe)->where('LanThi',$item->LanThi)->orderBy('idTN','ASC')->get();
                                             $ques = DB::table('ch_tns')->select('idTN','DapAnDung')->orderBy('idTN','ASC')->get();
                                             //die(print_r($ques));
                                             //dd($ans);
                                             //dd($ques);
                                            $countTrue = 0;
                                            $indexOfAns = 0;
                                            for($i=0 ; $i<count($ques) ; $i++){
                                                if($ans[$indexOfAns]->idTN == $ques[$i]->idTN){
                                                    if($ans[$indexOfAns]->DapAnLC == $ques[$i]->DapAnDung)
                                                        $countTrue++;
                                                    $indexOfAns++;
                                                    if($indexOfAns == count($ans))
                                                        break;
                                                }
                                            }
                                            echo $countTrue;
                                            echo "/";
                                            echo count($ans);
                                        ?></td>
                                        <td><a href="{!! URL::route('admin.ketqua.detailTeam',[$item->idNhom,$item->LanThi]) !!}"><i class="glyphicon glyphicon-search"></i>Xem chi tiết</a></td>
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
