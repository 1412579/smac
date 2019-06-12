<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Http\Request;
//use Request;
//use App\Http\Controllers\Auth;
use File;
use DB;
use Auth;
use App\Http\Requests\userInforRequest;
use Hash;
use BrowserDetect;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$tenNhom = null;
		$userInfo= null;
		if(Auth::check()){
			$tenNhom = DB::table('teams')->where('id',Auth::user()->id)->first();	
			$userInfo = DB::table('thanh_viens')->where('idNhom',Auth::user()->id)->first();
			return view('users.index.home',compact('userInfo','tenNhom'));
		}
		return view('users.index.home',compact('userInfo','tenNhom'));
	}

	public function gioithieu(){
		$tenNhom = null;
		$userInfo= null;
		if(Auth::check()){
			$tenNhom = DB::table('teams')->where('id',Auth::user()->id)->first();	
			$userInfo = DB::table('thanh_viens')->where('idNhom',Auth::user()->id)->first();
			return view('users.index.gioithieu',compact('userInfo','tenNhom'));
		}
		return view('users.index.gioithieu',compact('userInfo','tenNhom'));
	}
	public function lienhe(){
		$tenNhom = null;
		$userInfo= null;
		if(Auth::check()){
			$tenNhom = DB::table('teams')->where('id',Auth::user()->id)->first();	
			$userInfo = DB::table('thanh_viens')->where('idNhom',Auth::user()->id)->first();
			return view('users.index.contact',compact('userInfo','tenNhom'));
		}
		return view('users.index.contact',compact('userInfo','tenNhom'));
	}
	public function huongdan(){
		$tenNhom = null;
		$userInfo= null;
		if(Auth::check()){
			$tenNhom = DB::table('teams')->where('id',Auth::user()->id)->first();	
			$userInfo = DB::table('thanh_viens')->where('idNhom',Auth::user()->id)->first();
			return view('users.index.huongdan',compact('userInfo','tenNhom'));
		}
		return view('users.index.huongdan',compact('userInfo','tenNhom'));
	}
	public function post($id,$slug){
		$userInfo=null;
		$baiviet = DB::table('bai_viets')->where('idBV',$id)->orderBy('idBV','DESC')->first();
		return view('users.index.post',compact('baiviet','userInfo'));
	}
	public function submit(Request $request){
		$tgcl = 0;
		$dapan = array();
		$cauhoi = array();
		$idDe = $request->input('idDe');;
		$count = DB::table('des')->get();
		for($i=0;$i<count($count);$i++){
			$name = 'idDe'.$i;
			$cauhoi['idTN'.$i] = $request->$name;

			$rad = $i + 1;
			$name = "optradio".$rad;
			$rsl = $request->$name;
			if( $rsl != 1 && $rsl != 2 && $rsl != 3 && $rsl != 4){
				$dapan['Cau'.$i] = 0;
			}
			else {
				$dapan['Cau'.$i] = $rsl;
			}
		}
		$LanThi = DB::table('hoanthanh_tns')->where('idNhom',Auth::user()->id)->groupBy('idNhom')->max('LanThi');
		$Lan = 0;
		if(!is_null($LanThi))
			$Lan = $LanThi;
		for ($i=0; $i < count($dapan) ; $i++) { 
			DB::table('hoanthanh_tns')->insert([
				'LanThi' => $Lan + 1,
				'idNhom' => Auth::user()->id,
				'idTN' => $cauhoi['idTN'.$i],
				'idDe' => $idDe,
				'DapAnLC' => $dapan['Cau'.$i],
				'ThoiGianHoanThanh' => intval($request->tgconlai),
				"created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           	"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
				]);
			}

			$ans = DB::table('hoanthanh_tns')->select('idTN','DapAnLC')->where('idNhom',Auth::user()->id)->where('idDe',$idDe)->where('LanThi',$Lan + 1)->orderBy('idTN','ASC')->get();
			$ques = DB::table('ch_tns')->select('idTN','DapAnDung')->orderBy('idTN','ASC')->get();
			$countTrue = 0;
			$indexOfAns = 0;
			
			for($i=0 ; $i<count($ques) ; $i++){
				if($ans[$indexOfAns]->idTN == $ques[$i]->idTN){
					if($ans[$indexOfAns]->DapAnLC == $ques[$i]->DapAnDung)
						$countTrue++;
					$indexOfAns++;
					if($indexOfAns == count($ans))
						break;
				}
			}
			$timeleft = intval(($request->tgconlai)/100)." phút ".(intval($request->tgconlai)%100)." giây.";
			$result = [
				'numTrue' => $countTrue,
				'timeLeft' => $timeleft
			];
		return redirect()->route('homepage')->with('displayResult',$result);;

	}

	public function thamgiathi(Request $request){
		$userInfo=null;
		$tenNhom = null;
		if(Auth::user()->ThongTin == 0){
			
			return redirect()->route('homepage')->with('displayAlertThongTin','Ahihi');
		}
		else{
			if(Auth::user()->SoLuotTG > 0){
				$count = DB::table('des')->get();
				$arrayNumDe = array();
				$deBai = array();
				for($i = 0;$i < count($count);$i++){
					//$arrayNumDe[$i] = $count[$i]->idDe;
					$temp = DB::table('ch_tns')->where('idDe',$count[$i]->idDe)->orderBy(DB::raw("RAND()"))->take(1)->get();
					$deBai = array_merge($deBai,$temp);
				}
				shuffle($deBai);
				//die(print_r($deBai));
				//$numDe = array_rand($arrayNumDe);
				//$deBai = DB::table('ch_tns')->where('idDe',$arrayNumDe[$numDe])->orderBy(DB::raw("RAND()"))->get();
				$update = [
	            'SoLuotTG'     => Auth::user()->SoLuotTG - 1,
	            "updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
		        ];
				DB::table('teams')->where('id',Auth::user()->id)->update($update);
				
				if(Auth::check()){	
					$tenNhom = DB::table('teams')->where('id',Auth::user()->id)->first();	
					$userInfo = DB::table('thanh_viens')->where('idNhom',Auth::user()->id)->first();
					$thi = 1;
					DB::table('history')->insert([
						'TrinhDuyet' => BrowserDetect::browserName(),
						'DiaChiIP' => $request->ip(),
						'idNhom' => Auth::user()->id,
						"created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
						]);
					return view('users.thamgiathi.dethi',compact('deBai','userInfo','tenNhom','thi'));
				}
				//return view('users.thamgiathi.dethi',compact('deBai'));
			}
			else if(Auth::user()->SoLuotTG <= 0)
				return redirect()->route('homepage')->with('displayAlertNotEnoughLT','Ahihi');
			else return redirect()->route('homepage')->with('message','Ahihi');
		}
		
		
	}
	public function userImformation(Request $request){
			$now = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
		      	$after= \Carbon\Carbon::create(2019, 06, 12, 0);
		      	if($now->day >= $after->day || $now->month > $after->month){
		      		return redirect()->route('homepage')->with('expiredImforUser','Ahihi');
		      	}
		DB::table('teams')->where('id',Auth::user()->id)->update(["TenNhom"=>$request->input('teamName')]);
		DB::table('thanh_viens')->insert(
				    [
				    	'idNhom' => Auth::user()->id, 
					    'HoTen' => $request->input('captainName'),
					    'SDT' => $request->input('captainPhone'),
					    'Email' =>$request->input('captainEmail'),
					    'Truong' => $request->input('Truong'),
					    'Truong1' => $request->input('Truong1'),
					    'Truong2' => $request->input('Truong2'),
					    'ThanhVien1' => $request->input('memberOne'),
					    'ThanhVien2' =>$request->input('memberTwo'),
					    'MSSVcap' => $request->input('MSSVcaptain'),
					    'MSSV1' => $request->input('MSSVmemberOne'),
					    'MSSV2' => $request->input('MSSVmemberTwo'),
					    "created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		]
				);
		if(Auth::user()->ThongTin==0){
				DB::table('teams')->where('id',Auth::user()->id)->update(["ThongTin" => 1]);
			}
		return redirect()->route('homepage')->with('changeInfo','Ahihi');
	}
	
	public function userPass(Request $request){
		$oldpass = DB::table('teams')->select('password')->where('id',Auth::user()->id)->first();
		if (!Hash::check($request->input('oldpass'),$oldpass->password)){
	    	return redirect()->route('homepage')->with('displayAlertPass','Ahihi');
		}
		$password = Hash::make($request->input('newpass'));
		//dd(Hash::check($request->input('newpass'),$password));
		DB::table('teams')->where('id',Auth::user()->id)->update(['password' => $password]);
		return redirect()->route('homepage')->with('changePass','Ahihi');
	}
}

