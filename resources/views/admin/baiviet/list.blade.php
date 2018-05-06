@extends('admin.index')
@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý bài viết</h1>
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
                                    <tr style="">
                                        <th>ID</th>   
                                        <th>Tiêu đề</th>
                                        <th>Người đăng</th>
                                        <th>Thời gian đăng</th>
                                        <th>Thumbnail</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($baiviet as $item)
                                    <tr class="gradeU" onmouseover="">
                                        <td style="text-align: center;">{{ $item->idBV }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td style="text-align: center;"><?php 
                                                 $name = DB::table('teams')->select('TenNhom')->where('id',$item->idNhom)->first();
                                                 echo $name->TenNhom;
                                            ?>
                                            </td>
                                        <td>{!!$item->created_at!!}</td>
                                        <td>
                                            <?php
                                                if(!empty($item->thumbnail)){
                                                    echo '<img src="'.asset('/public/thumbnail/'.$item->thumbnail).'" id="thumbnail" class="img-responsive" idBV="'.$item->idBV.'" alt="" style="width: 80px;height: auto;">';
                                                }

                                            ?>
                                            </td>
                                        <td class="center" >
                                           <i class="fa fa-trash-o  fa-fw"></i><a onclick="return xacnhanxoa('Bạn có chắc chắn chưa?')" href="{!! URL::route('admin.baiviet.getDelete',$item->idBV) !!}">Xoá</a>
                                           <i class="fa fa-pencil fa-fw"></i> <a href="{!! URL::route('admin.baiviet.getEdit',$item->idBV) !!}">Sửa</a>
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