@extends('users.thi')
@section('content')

            

<div class="container-fluid">
<div class="col-md-6">
	@for($i=1;$i<=12;$i++)	 
		<img class="img-responsive" src="{{ asset('public/img/thongtin/'.'Slide'.$i.'.PNG')}}" alt="">
	@endfor
</div>
<div class="col-md-6">
	@for($i=1;$i<=13;$i++)	 
		<img class="img-responsive" src="{{ asset('public/img/huongdan/'.'Slide'.$i.'.PNG')}}" alt="">
	@endfor
</div>	

</div>

@endsection