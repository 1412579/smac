@extends('admin.index')
@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý đề thi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách đề thi
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
                                        <th>Tên bộ đề</th>
                                        <th>Tên đề</th>
                                        <th>Ngày tạo</th>
                                        <th>Số câu trắc nghiệm</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($de as $item)
                                    <tr class="gradeU" onmouseover="" style="cursor: pointer;" onclick="window.location='{{route('admin.dethi.getQuestion',$item->idDe)}}'">
                                        <td><?php 
                                                 $name = DB::table('bo_des')->select('TenBo')->where('idBoDe',$item->idBoDe)->first();
                                                 echo $name->TenBo;
                                            ?>
                                            </td>
                                        <td>{{ $item->TenDe }}</td>
                                        <td>{!! $item->created_at !!}</td>
                                        <td>
                                            <?php
                                                $socau = DB::table('ch_tns')->where('idDe',$item->idDe)->get();
                                                echo count($socau);
                                            ?>
                                        </td>
                                        <td>
                                           <i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc chắn chưa?')" href="{!! URL::route('admin.dethi.getDelete',$item->idDe) !!}">Delete</a>
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
@endsection