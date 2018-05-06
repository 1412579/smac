<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\DeRequest;
use App\Http\Requests\editQTNRequest;
use Input;
use File;
use DB;
use Auth;
class NhomController extends Controller {

	//
	public function getList(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$team = DB::table('teams')->where('Quyen','!=',1)->orderBy('id','DESC')->get();
		return view('admin.nhom.list',compact('team'));
	}
	public function capNhatAll(){
		if(Request::ajax()){
			$qty = Request::get('qty');
			$update = [
		            'SoLuotTG'     => $qty,
		            "updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
			        ];
			DB::table('teams')->update($update);
			echo 1;
		}
	}
	public function capNhat(){
		if(Request::ajax()){
			$id = Request::get('id');
			$qty = Request::get('qty');
			$update = [
            'SoLuotTG'     => $qty,
            "updated_at" => \Carbon\Carbon::now()
	        ];
			DB::table('teams')->where('id',$id)->update($update);
			echo 1;
		}
	}




}



