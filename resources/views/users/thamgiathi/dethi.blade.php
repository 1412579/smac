@extends('users.thi')
@section('content')

<div class="container-fluid" style="margin-bottom: 50px">
<form id="form-submit"  name="form-submit" action="{!! route('submit') !!}" method="POST">
  <input type="hidden"  name="_token" value="{!! csrf_token() !!}">
  <input type="hidden"  name="idDe" value="{{ $deBai[0]->idDe }}">
  <input type="hidden"  name="tgconlai" id="tgconlai" value="">
    <div class="container">
        <div class="col-md-2" data-offset-top="205" data-spy="affix" style="position: fixed; right: -10px; top:50%;">
        <input type="hidden"  name="tgcl" value="">
            <span class="timer">Thời gian còn lại: </span>
            <br>
            <span class="timecountdown timeCount" id="timer">
                <script type="text/javascript">
                  timeDisplay('timer',0,0,22,35,5,'saveBaiThi');
              </script>

            </span>
            <br>
            <br>
            <span class="" id="alert">
                
            </span>
       </div>
        <div class="row">
        <?php $i = 0; ?>
        @foreach($deBai as $item)
        <input type="hidden"  name="idDe{{ $i }}" value="{{ $item->idTN }}">
          <?php $i++; ?>
          
          <div class="col-md-8 col-sm-12 col-xs-12 col-centered" style="border: 2px solid #DCDCDC; margin-bottom: 20px">

                  <div class="col-md-2 col-sm-3 col-xs-3" style="text-align: center; font-size: 30px">Câu <?php echo $i;?></div>
                  <div class="col-md-10 col-sm-9 col-xs-9" style="text-align: justify; margin: 10px 0px 10px 0px; border: 1px solid #DCDCDC" >
                        <p>{!! $item->NoiDung !!}</p>
                        <?php
                            if(!empty($item->hinhanh)){
                              echo '<img src="'.asset('/public/images/'.$item->hinhanh).'" style="" class="img-responsive" alt="">';
                            }
                        ?>
                          
                        <div class="col-md-10 col-sm-12 col-xs-12" style=" border-top: 1px solid #DCDCDC;border-bottom: 1px solid #DCDCDC">
                            <p>Chọn câu trả lời đúng:</p>
                            <div class="col-md-10 col-sm-12 col-xs-12" style="word-wrap:break-word;">
                                <div class="radio" >
                                  <label class=""><input type="radio" value="1" id="<?php echo "optradio".$i; ?>" name="<?php echo "optradio".$i; ?>">{!! $item->DapAn1 !!}</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="2" name="<?php echo "optradio".$i; ?>">{!! $item->DapAn2 !!}</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="3" name="<?php echo "optradio".$i; ?>">{!! $item->DapAn3 !!}</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" value="4" name="<?php echo "optradio".$i; ?>">{!! $item->DapAn4 !!}</label>
                                </div>
                            </div>
                        </div>
                  </div>
            
                <div class="row">
                    
                </div>   
          </div>
          @endforeach
          
         
           <div class="col-md-1 col-sm-1 col-xs-1 col-centered">
              <input type="submit" class="btn btn-success btn-xls" id="saveBaiThi" value="Nộp bài"  >
            </div>

    </div>
  </div>
    </form>
    
</div>

    <script type="text/javascript">
        $(document).bind("contextmenu",function(e){
            e.preventDefault();
        });
        $(document).keydown(function(ev) {
           // capture the event for a variety of browsers
           ev = ev || window.event;
           // catpure the keyCode for a variety of browsers
           kc = ev.keyCode || ev.which;
           if(kc == 13)
           	return false;
           // check to see that either ctrl or command are being pressed along w/any other keys
           if((ev.ctrlKey || ev.metaKey) && kc) {
               // these are the naughty keys in question. 'x', 'c', and 'c'
               // (some browsers return a key code, some return an ASCII value)
               if(kc == 99 || kc == 67 || kc == 88 || kc == 87) {
                      return false;
               }
           }
        });
    </script>

@endsection