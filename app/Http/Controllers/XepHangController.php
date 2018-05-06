<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use Exception;
use Auth;
class XepHangController extends Controller {

	public function getList(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$team = DB::table('hoanthanh_tns')->orderBy('idNhom','DESC')->groupBy('idNhom','LanThi')->get();
		
		return view('admin.ketqua.list',compact('team'));
	}
	public function getListJoined(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$team = DB::table('history')->orderBy('idNhom','DESC')->get();
		
		return view('admin.ketqua.listJoined',compact('team'));
	}
	public function detailTeam($id,$lanthi){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
			$team = DB::table('hoanthanh_tns')->where('idNhom',$id)->where('LanThi',$lanthi)->orderBy('idTN','ASC')->get();
			$info = DB::table('teams')->where('id',$id)->first();
			if(empty($team))
				return redirect()->route('admin.ketqua.getList')->with(['flash_level'=>'danger','flash_massage'=>'Không tồn tại thông tin truy cập !!!']);
			return view('admin.ketqua.detailTeam',compact('team','info'));

		
	}

}
