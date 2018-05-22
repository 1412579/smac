  <?php
    //$temp = $deBai = DB::table('ch_tns')->where('idDe',1)->orderBy(DB::raw('RAND()'))->get();

    //dd($temp);
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>CLB Học Thuật Khoa Y ĐHQG TPHCM - School of Medicine Academic Club - SMAC</title>
  	<meta charset=utf-8>
  	<meta name=description content="">
  	<meta name="description" content="CLB Học Thuật Khoa Y - ĐHQG TP.HCM (SMAC) là môi trường hoạt động học thuật, nơi giao lưu gặp gỡ và rèn luyện kỹ năng cho sinh viên Khoa Y."/>
  	<meta name=viewport content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="{{ url('public/smac.ico')}}">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
  	<!-- Latest compiled and minified CSS -->
  	<link href="https://smac-medvnu.com/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  	<link rel="stylesheet" href="{{ url('public/vendor/bootstrap/css/bootstrap.min.css')}}">
  	
  	<!-- jQuery library -->
  	<script src="{{ url('public/vendor/jquery/jquery.min.js')}}"></script>
  	<!-- Latest compiled JavaScript -->
  	<script src="{{ url('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	

  	<link rel="stylesheet" type="text/css" href="{{ url('public/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/creative.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('public/css/landing-page.css') }}">    
      <link rel="stylesheet" type="text/css" href="{{ url('public/dist/sweetalert.css') }}">

    
    <script src="{{ url('public/js/timerCountdown.js') }}"></script>
    <script src="{{ url('public/dist/sweetalert.min.js') }}"></script>
    <script src="{{ url('public/js/jquery.plugin.min.js') }}"></script>
    
    
  </head>
  <body  id="page-top">
      <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">

          <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('homepage') }}"><img src="{{ asset('public/img/SMAC.png') }}" alt="">
          </a>
            </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
              <li><a target="_blank" href="{{ route('gioithieu') }}">Giới thiệu</a></li>
              <li><a target="_blank" href="{{ route('huongdan') }}">Hướng dẫn</a></li>
              <li><a target="_blank" href="{{ route('lienhe') }}">Liên hệ</a></li>
            </ul>

	
           @if(Auth::check())
           <ul class="nav navbar-nav navbar-right">
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  {{ Auth::user()->TenDangNhap }}<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href=""><span class="glyphicon glyphicon-education" aria-hidden="true"></span> {{ Auth::user()->TenNhom }} </a></li>
                  @if(Auth::user()->Quyen == 1)
                 <li><a href="{{ route('admin.dashboard') }}"><span class="glyphicon glyphicon-folder-close" aria-hidden="true" ></span> Dashboard</a></li>
                  @endif
                  <li><a data-toggle="modal" data-target=".bs-modal-sm" href="#"><span class="glyphicon glyphicon-lock" aria-hidden="true" ></span> Đổi mật khẩu</a></li>
                  @if(Auth::user()->Quyen == 0)
                  <li><a data-toggle="modal" data-target="#squarespaceModal" href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true" ></span> Thông tin nhóm</a></li>
                  @endif
                  <li><a href="{!! url('auth/logout') !!}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Đăng xuất</a></li>
               </ul>
            </ul>
            @else
            <ul class="nav navbar-nav navbar-right">
                  <li><a class="page-scroll" href="{{ route('userLogin') }}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Đăng nhập</a></li>
              </ul>
                
            @endif
          

        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
    @if(isset($thi))

        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-12">
            <img src="{{ asset('public/img/cover.png') }}" class="img-responsive" alt="">
            </div>
        </div>

    @else
     <header>
        <div class="header-content">
            <div class="header-content-inner">
                <a target="_blank" href="{{ route('thamgiathi') }}" id="thamgiathi" class="btn btn-primary " onclick="return confirm('Hãy chuẩn bị kỹ trước khi vào thi nhé, nếu đã sẵn sàng thì bắt đầu thôi!!!')">Vào thi</a>
            </div>
        </div>
    </header>
    @endif

      @yield('content')

    
  @if(is_null($userInfo))
  <div class="modal fade" style="margin-top: 100px" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Cập nhật thông tin nhóm</h3>
        </div>
          <div class="modal-body">
            <form role="form"  action="{!! route('userimformation') !!}"  method="POST"  enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
            	<div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                          <label for="">Tên nhóm</label>
                          <input type="text" class="form-control" id="teamName" name="teamName" placeholder="Hãy đặt tên cho nhóm mình nhé">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                            <label for="">MSSV đội trưởng</label>
                            <input type="text" class="form-control" id="MSSVcaptain" name="MSSVcaptain" placeholder="Nhập MSSV">
                        </div>
                      <div class="col-md-6">
                          <label for="">Họ và tên đội trưởng</label>
                          <input type="text" class="form-control" id="captainName" name="captainName" placeholder="Nhập đầy đủ họ và tên">
                      </div>
                      
                    </div>
                </div>
              <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                          <label for="">Số điện thoại đội trưởng</label>
                          <input type="number" class="form-control" id="captainPhone" name="captainPhone" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="col-md-6">
                          <label for="">Email đội trưởng</label>
                          <input type="email" class="form-control" id="captainEmail"  name="captainEmail" placeholder="Nhập email">
                      </div>
                      
                      <div class="col-md-6">
                          <label for="">Trường đội trưởng</label>
                          <select class="form-control" name="Truong">
                                <option value="1" >Khoa Y ĐHQG TP.HCM</option>
                                <option value="2" >ĐH Y Dược TP.HCM</option>
                                <option value="3" >Đại Học Y Khoa Phạm Ngọc Thạch</option>
                                <option value="4" >Khoa Y Đại Học Tân Tạo</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                    <div class="form-group">
                    <div class="row">
                       <div class="col-md-6">
                            <label for="">MSSV Thành viên 1</label>
                            <input type="text" class="form-control"  id="MSSVmemberOne" name="MSSVmemberOne" placeholder="Nhập MSSV">
                        </div>
                        <div class="col-md-6">
                            <label for="">Họ và tên thành viên 1</label>
                            <input type="text" class="form-control" id="memberOne" name="memberOne" placeholder="Nhập đầy đủ họ và tên">
                        </div>
                        <div class="col-md-6">
                          <label for="">Trường Thành viên 1</label>
                          <select class="form-control" name="Truong1">
                                <option value="1" >Khoa Y ĐHQG TP.HCM</option>
                                <option value="2" >ĐH Y Dược TP.HCM</option>
                                <option value="3" >Đại Học Y Khoa Phạm Ngọc Thạch</option>
                                <option value="4" >Khoa Y Đại Học Tân Tạo</option>
                        </select>
                      </div>
                    </div>
                  </div>
                   
                    <div class="form-group">
                    <div class="row">
                       <div class="col-md-6">
                            <label for="">MSSV Thành viên 2</label>
                            <input type="text" class="form-control" id="MSSVmemberTwo" name="MSSVmemberTwo" placeholder="Nhập MSSV">
                        </div>
                        <div class="col-md-6">
                            <label for="">Họ và tên thành viên 2</label>
                            <input type="text" class="form-control" id="memberTwo" name="memberTwo" placeholder="Nhập đầy đủ họ và tên">
                        </div>
                        <div class="col-md-6">
                          <label for="">Trường Thành viên 2</label>
                          <select class="form-control" name="Truong2">
                                <option value="1" >Khoa Y ĐHQG TP.HCM</option>
                                <option value="2" >ĐH Y Dược TP.HCM</option>
                                <option value="3" >Đại Học Y Khoa Phạm Ngọc Thạch</option>
                                <option value="4" >Khoa Y Đại Học Tân Tạo</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <input style="margin-top: 10px" type="submit" class="btn btn-success" id="changeInfo" value="Xác nhận" >
            </form>

        </div>
        <div class="modal-footer">
             <h4 style="color: red">Hãy chắc chắn các thông tin mà bạn cung cấp là chính xác và không thể thay đổi sau đó!!!</h4>
        </div>
      </div>
  </div>
</div>
@else
<div class="modal fade" style="margin-top: 100px" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            <h3 class="modal-title" id="lineModalLabel">Thông tin nhóm</h3>
        </div>
          <div class="modal-body">
            <form>
            	<div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                          <label for="">Tên nhóm</label>
                          <input type="text" class="form-control" id="teamName" disabled="disabled" name="teamName" value="{{ $tenNhom->TenNhom}}" placeholder="Nhập đầy đủ họ và tên">
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                            <label for="">MSSV đội trưởng</label>
                            <input type="text" class="form-control" disabled="disabled" value="{{ $userInfo->MSSVcap }}"  id="MSSVcaptain" name="MSSVcaptain" placeholder="Nhập MSSV">
                        </div>
                      <div class="col-md-6">
                          <label for="">Họ và tên đội trưởng</label>
                          <input type="text" class="form-control" id="captainName" disabled="disabled" name="captainName" value="{{ $userInfo->HoTen }}" placeholder="Nhập đầy đủ họ và tên">
                      </div>
                      
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                          <label for="">Số điện thoại đội trưởng</label>
                          <input type="number" class="form-control" disabled="disabled" value="{{ $userInfo->SDT }}"  id="captainPhone" name="captainPhone" placeholder="Nhập số điện thoại">
                      </div>
                      <div class="col-md-6">
                          <label for="">Email đội trưởng</label>
                          <input type="email" class="form-control" disabled="disabled" value="{{ $userInfo->Email }}"  id="captainEmail"  name="captainEmail" placeholder="Nhập email">
                      </div>
                      <div class="col-md-6">
                          <label for="">Trường</label>
                          <select class="form-control" disabled="disabled"  name="Truong">
                                <?php if($userInfo->Truong == 1)
                                          echo "<option value='1' >Khoa Y - Đại Học Quốc Gia TPHCM</option>";
                                      else if($userInfo->Truong == 2)
                                           echo "<option value='2' >Đại Học Y Dược TPHCM</option>";
                                      else if($userInfo->Truong == 3)
                                        echo '<option value="3" >Đại Học Y Khoa Phạm Ngọc Thạch</option>';
                                      else
                                        echo '<option value="4" >Khoa Y Đại Học Tân Tạo</option>';
                                 ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  
                    <div class="form-group">
                    <div class="row">
                       <div class="col-md-6">
                            <label for="">MSSV Thành viên 1</label>
                            <input type="text" class="form-control" disabled="disabled" value="{{ $userInfo->MSSV1 }}"  id="MSSVmemberOne" name="MSSVmemberOne" placeholder="Nhập MSSV">
                        </div>
                        <div class="col-md-6">
                            <label for="">Họ và tên thành viên 1</label>
                            <input type="text" class="form-control" disabled="disabled"  value="{{ $userInfo->ThanhVien1 }}" id="memberOne" name="memberOne" placeholder="Nhập đầy đủ họ và tên">
                        </div>
                        <div class="col-md-6">
                          <label for="">Trường</label>
                          <select class="form-control" disabled="disabled"  name="Truong">
                                <?php if($userInfo->Truong1 == 1)
                                          echo "<option value='1' >Khoa Y - Đại Học Quốc Gia TPHCM</option>";
                                      else if($userInfo->Truong1 == 2)
                                           echo "<option value='2' >Đại Học Y Dược TPHCM</option>";
                                      else if($userInfo->Truong1 == 3)
                                        echo '<option value="3" >Đại Học Y Khoa Phạm Ngọc Thạch</option>';
                                      else
                                        echo '<option value="4" >Khoa Y Đại Học Tân Tạo</option>';
                                 ?>
                        </select>
                      </div>
                    </div>
                  </div>
                   
                    <div class="form-group">
                    <div class="row">
                       <div class="col-md-6">
                            <label for="">MSSV Thành viên 2</label>
                            <input type="text" class="form-control" disabled="disabled" value="{{ $userInfo->MSSV2 }}"  id="MSSVmemberTwo" name="MSSVmemberTwo" placeholder="Nhập MSSV">
                        </div>
                        <div class="col-md-6">
                            <label for="">Họ và tên thành viên 2</label>
                            <input type="text" class="form-control" disabled="disabled"  value="{{ $userInfo->ThanhVien2 }}" id="memberTwo" name="memberTwo" placeholder="Nhập đầy đủ họ và tên">
                        </div>
                        <div class="col-md-6">
                          <label for="">Trường</label>
                          <select class="form-control" disabled="disabled"  name="Truong">
                                <?php if($userInfo->Truong2 == 1)
                                          echo "<option value='1' >Khoa Y - Đại Học Quốc Gia TPHCM</option>";
                                      else if($userInfo->Truong2 == 2)
                                           echo "<option value='2' >Đại Học Y Dược TPHCM</option>";
                                      else if($userInfo->Truong2 == 3)
                                        echo '<option value="3" >Đại Học Y Khoa Phạm Ngọc Thạch</option>';
                                      else
                                        echo '<option value="4" >Khoa Y Đại Học Tân Tạo</option>';
                                 ?>
                        </select>
                      </div>
                    </div>
                  </div>
            </form>

        </div>
        <div class="modal-footer">
             <h4 style="color: red">Nếu có bất cứ thắc mắc nào vui lòng liên hệ ban tổ chức, xin cám ơn!!!</h4>
        </div>
      </div>
  </div>
</div>
@endif
<!-- Modal -->
<div style="margin-top: 100px" class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-body">
        <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
              <h3 class="modal-title" id="lineModalLabel">Đổi mật khẩu</h3>
           </div>
          <div id="myTabContent" class="tab-content">
          
          <form class="form-horizontal" action="{!! route('userpass') !!}"  method="POST"  enctype="multipart/form-data">
               <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
              <fieldset>
              <!-- Sign In Form -->
              <!-- Text input-->
              <div class="control-group">
                <label class="control-label" for="userid">Mật khẩu cũ:</label>
                <div class="controls">
                  <input required="" id="oldpass" name="oldpass" type="password" class="form-control" placeholder="********" class="input-medium" required="">
                </div>
              </div>

              <!-- Password input-->
              <div class="control-group">
                <label class="control-label" for="passwordinput">Mật khẩu mới:</label>
                <div class="controls">
                  <input required="" id="newpass" name="newpass" class="form-control" type="password" placeholder="********" class="input-medium">
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label" for="passwordinput">Xác nhận mật khẩu mới</label>
                <div class="controls">
                  <input required="" id="confirmnewpass" name="confirmnewpass" class="form-control" type="password" placeholder="********" class="input-medium">
                </div>
              </div>

              <!-- Button -->
              <div class="control-group">
                <label class="control-label" for="signin"></label>
                <div class="controls">
                  <input type="submit" id="changePass" name="signin" class="btn btn-success" value="Đổi mật khẩu">
                </div>
              </div>
              </fieldset>
              </form>
          </div>
      </div>
    </div>       
   </div>
</div>
<footer class="footer">

      <div class="footer-socials" title="Tang Liang from ITUS">
        <a  target="_blank" href="https://www.facebook.com/clbhocthuatsm"><i class="fa fa-facebook" style="color: #3b5998;"></i></a>
      </div>

      <div class="footer-bottom"  title="Tang Liang from ITUS">
        <a href="https://www.facebook.com/clbhocthuatsm" target="_blank">CLB Học Thuật Khoa Y ĐHQG TP.HCM - SMAC</a><br>
      </div>
    </footer>
    <script src="{{ url('public/js/HackTimer.min.js') }}"></script>
    <script src="{{ url('public/js/myScript.js') }}"></script>
    <script src="{{ url('public/js/creative.min.js') }}"></script>
      {{ changePass() }}
      {{ changeInfo() }}
      {{ displayAlert() }}
      {{ displayAlertPass() }}
      {{ displayFirshLogin() }}
      {{ displayAlertThongTin() }}
      {{ expiredImforUser() }}
      
      <?php
      	$now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
      	$before = \Carbon\Carbon::create(2017, 5, 6, 0);
      	 $after= \Carbon\Carbon::create(2017, 5, 7, 0);
      	 ?>
      	@if(($before->month - $now->month) == 0)
		@if($before->day - $now->day > 0)
			{{displayAlertNotEnoughLT_Before() }}
		@elseif ($after->day - $now->day >= 0 && $before->day - $now->day <= 0)
			{{displayAlertNotEnoughLT()}}
		@else {{displayAlertNotEnoughLT_After()}}
		@endif
      	
      	@elseif(($before->month - $now->month) > 0)
      		@if((($before->month - $now->month)*30 - $now->day)>0)
      			{{displayAlertNotEnoughLT_Before() }}
      		@elseif((($before->month - $now->month)*30 - $now->day) <= 0 && (($after->month - $now->month)*30 - $now->day) >= 0)
      			{{displayAlertNotEnoughLT()}}
      		@else
      			{{displayAlertNotEnoughLT_After()}}
      		@endif
      	@endif
      
    
      	
      
      
      

</html>
   
