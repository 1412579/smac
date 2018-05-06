@extends('admin.index')
@section('content')
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Quản lý nhóm dự thi</h1>
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
                        <div class="col-md-12" style="margin:20px;text-align:center;">
                           <h4> Chỉnh sửa lượt thi của tất cả các nhóm</h4>
                        	<input type="number" value="1" class="qty" size="1" min="1" max="127" name="quantity">
	                    <a id="updateLT_All" onclick="" class="updateLT_All" href="javascript:void(0)">
	                    <i class="fa fa-cog" aria-hidden="true"></i>
	                    Sửa
	                    </a>
	                 </div>
                        <div class="col-md-12">
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
                                        <th>MSSV NT</th>
                                        <th>Nhóm trưởng</th>
                                        <th>SĐT</th>
                                        <th>Email</th>
                                        <th>Trường</th>
                                        <th>MSSV TV1</th>
                                        <th>Thành viên 1</th>
                                        <th>Trường TV2</th>
                                        <th>MSSV TV2</th>
                                        <th>Thành viên 2</th>
                                        <th>Trường TV2</th>
                                        <th>Số LT</th>
                                        <th>Kích hoạt</th>
                                        <th>Thông tin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($team as $item)
                                    <?php
                                            $name = DB::table('thanh_viens')->where('idNhom',$item->id)->first();
                                            //dd($name);
                                        ?>
                                    @if(!is_null($name))
                                    <tr class="gradeU">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->TenNhom }}</td>
                                        <td>{{ $item->TenDangNhap }}</td>
                                        <td>{{ $name->MSSVcap}}</td>
                                        <td>{{ $name->HoTen }}</td>
                                        <td>{{ $name->SDT }}</td>
                                        <td>{{ $name->Email }}</td>
                                        <td>@if($name->Truong == 1)
                                                Khoa Y ĐHQG TP.HCM
                                            @elseif($name->Truong == 2)
                                                ĐH Y Dược TP.HCM
                                            @elseif($name->Truong == 3)
                                                ĐH Y Khoa Phạm Ngọc Thạch
                                            @else
                                                Khoa Y ĐH Tân Tạo
                                            @endif</td>
                                        <td>{{ $name->MSSV1}}</td>
                                        <td>{{ $name->ThanhVien1 }}</td>
                                        <td>@if($name->Truong1 == 1)
                                                Khoa Y ĐHQG TP.HCM
                                            @elseif($name->Truong1 == 2)
                                                ĐH Y Dược TP.HCM
                                            @elseif($name->Truong1 == 3)
                                                ĐH Y Khoa Phạm Ngọc Thạch
                                            @else
                                                Khoa Y ĐH Tân Tạo
                                            @endif</td>
                                        <td>{{ $name->MSSV2}}</td>
                                        <td>{{ $name->ThanhVien2 }}</td>
                                        <td>@if($name->Truong2 == 1)
                                                Khoa Y ĐHQG TP.HCM
                                            @elseif($name->Truong2 == 2)
                                                ĐH Y Dược TP.HCM
                                            @elseif($name->Truong2 == 3)
                                                ĐH Y Khoa Phạm Ngọc Thạch
                                            @else
                                                Khoa Y ĐH Tân Tạo
                                            @endif</td>
                                         <td>
                                            <input type="number" class="qty" size="1" value="{{ $item->SoLuotTG }}" name="quantity">
                                            <a id="{{ $item->id }}" onclick="" class="updateLT" href="javascript:void(0)">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            Sửa
                                            </a>
                                        </td>
                                        <td>@if($item->KichHoat)
                                                Đã kích hoạt
                                            @else
                                                Chưa kích hoạt
                                            @endif
                                        </td>

                                       <td>@if($item->ThongTin)
                                                Đã cập nhật
                                            @else
                                                Chưa cập nhật
                                            @endif
                                        </td>
                                        
                                    </tr>
                                    @else
                                    <tr class="gradeU">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->TenNhom }}</td>
                                        <td>{{ $item->TenDangNhap }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>                                    
                                        <td></td>
                                        <td></td>
                                         <td>
                                            <input type="number" class="qty" size="1" value="{{ $item->SoLuotTG }}" name="quantity">
                                            <a id="{{ $item->id }}" onclick="" class="updateLT" href="javascript:void(0)">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            Sửa
                                            </a>
                                        </td>
                                        <td>@if($item->KichHoat)
                                                Đã kích hoạt
                                            @else
                                                Chưa kích hoạt
                                            @endif
                                        </td>
                                         <td>@if($item->ThongTin)
                                                Đã cập nhật
                                            @else
                                                Chưa cập nhật
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
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
