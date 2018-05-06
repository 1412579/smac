@extends('admin.index')
@section('content')

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh sách câu hỏi - Đề: <?php 
                                                 $name = DB::table('des')->select('TenDe')->where('idDe',$danhsachTN[0]->idDe)->first();
                                                 echo $name->TenDe;
                                            ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách câu trắc nghiệm
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-1">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Nội dung câu hỏi</th>
                                        <th>A</th>
                                        <th>B</th>
                                        <th>C</th>
                                        <th>D</th>
                                        <th>Đúng</th>
                                        <th>Ảnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $count = 0; ?>
                                @foreach($danhsachTN as $item)
                                <?php $count++;?>
                                    <tr class="gradeU" onmouseover="" style="cursor: pointer;" onclick="window.location='{{route('admin.dethi.editQuestionTN',$item->idTN)}}'">
                                        <td>{{ $count }}</td>
                                        <td>{{ 
                                                    $item->NoiDung
                                                }}
                                        </td>
                                        <td>{{
                                                    $item->DapAn1
                                                }}
                                        </td>
                                        <td>{{

                                                    $item->DapAn2
                                                }}
                                        </td>
                                        <td>{{
                                                    $item->DapAn3
                                                }}
                                        </td>
                                        <td>{{ 
                                                    $item->DapAn4
                                                }}
                                        </td>
                                        <td style="text-align:center"><?php
                                            if ($item->DapAnDung == 1) {
                                                echo "A";
                                            }
                                            elseif ($item->DapAnDung ==2) {
                                                echo "B";
                                            }
                                            elseif ($item->DapAnDung == 3) {
                                                echo "C";
                                            }
                                            elseif ($item->DapAnDung ==4) {
                                                echo "D";
                                            }
                                             

                                         ?></td>
                                         <td><?php
                                            if(!empty($item->hinhanh))
                                            {
                                                echo '<img src="'.asset('/public/images/'.$item->hinhanh).'" class="img-responsive" alt="">';
                                            }
                                         ?></td>
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