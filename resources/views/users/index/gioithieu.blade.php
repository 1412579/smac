@extends('users.thi')
@section('content')

            

<div class="container">
	@for($i=1;$i<=17;$i++)	 
		<img class="img-responsive" src="{{ asset('public/img/gioithieu/'.'Slide'.$i.'.PNG')}}" alt="">
	@endfor
	
</div>
	    
@endsection