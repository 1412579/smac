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
class DeThiController extends Controller {

	public function dashboard(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		if(!Auth::check())
			return redirect()->route('adminLogin');
		return view('admin.dashboard.db');
	}
	//
	public function getAdd(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$bode = DB::table('bo_des')->select('idBoDe','TenBo','NoiDung')->get();
		return view('admin.dethi.add',compact('bode'));
	}

	public function postAdd(DeRequest $request){
		$debaiTN = array();
		$debaiTL = array();
		$idBoDe = $request->idBo;
	    $TenDe = $request->TenDe;
        if(Input::hasFile('fileDeTN')){
        	$fileTN = Input::file('fileDeTN');
			$fileTN->move('public/dethi',changeTitle($fileTN->getClientOriginalName()));

			// $fileTL = Input::file('fileDeTL');
			// $fileTL->move('public/dethi',$fileTL->getClientOriginalName());
		}
		try {
			$fileTNread = file('public/dethi/'.changeTitle($fileTN->getClientOriginalName()));
			// $fileTLread = file('public/dethi/'.$fileTL->getClientOriginalName());
			$count = 0;
			foreach($fileTNread as $key => $line){
				$debaiTN[$count] = $line;
				$count++;
			}
			// $count=0;
			// foreach($fileTLread as $key => $line){
			// 	$debaiTL[$count] = $line;
			// 	$count++;
			// }

			$idDe = DB::table('des')->insertGetId(
			    [
			    	'TenDe' => $TenDe, 
				    'idBoDe' => $idBoDe, 
				    "created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
           		]
			);

			for($i = 0; $i < count($debaiTN); $i+=6){
				DB::table('ch_tns')->insert(
				    [
				    	'idDe' => $idDe, 
					    'NoiDung' => $debaiTN[$i],
					    'DapAn1' => $debaiTN[$i+1],
					    'DapAn2' => $debaiTN[$i+2],
					    'DapAn3' => $debaiTN[$i+3],
					    'DapAn4' => $debaiTN[$i+4],
					    'DapAnDung' => $debaiTN[$i+5], 
					    "created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		]
				);

				
			}
			// for($i = 0; $i < count($debaiTL); $i++){
			// 	DB::table('ch_tls')->insert(
			// 	    [
			// 	    	'idDe' => $idDe, 
			// 		    'NoiDung' => $debaiTL[$i],
			// 		    "created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		 //           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
	  //          		]
			// 	);
			// }
			File::delete('public/dethi/'.$fileTN->getClientOriginalName());
			// File::delete('public/dethi/'.$fileTL->getClientOriginalName());
		}
		
		catch (Illuminate\Filesystem\FileNotFoundException $exception){
			 die("Lỗi đọc file, vui lòng kiểm tra lại");
		}
		// print_r($debaiTN);
		// echo "<br>";
		// print_r($debaiTL);
		return redirect()->route('admin.dethi.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã thêm đề thi thành công !!!']);
	}
		

	public function getList(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$de = DB::table('des')->get();
		return view('admin.dethi.list',compact('de'));
	}

	public function getDelete($id){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		DB::table('des')->where('idDe',$id)->delete();
		return redirect()->route('admin.dethi.getList')->with(['flash_level'=>'danger','flash_massage'=>'Đã xoá đề thi thành công !!!']);
	}
			
	public function getQuestion($id){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$danhsachTN = DB::table('ch_tns')->where('idDe',$id)->orderBy('idDe','DESC')->get();
		if(empty($danhsachTN))
			return redirect()->route('admin.dethi.getList')->with(['flash_level'=>'danger','flash_massage'=>'Không tồn tại thông tin truy cập !!!']);
		return view('admin.dethi.question',compact('danhsachTN'));

	}
	public function editQuestionTN($id){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$cauhoi = DB::table('ch_tns')->where('idTN',$id)->first();
		if(empty($cauhoi))
			return redirect()->route('admin.dethi.getList')->with(['flash_level'=>'danger','flash_massage'=>'Không tồn tại thông tin truy cập !!!']);
		return view('admin.dethi.editquestiontn',compact('cauhoi'));
	}
	public function peditQuestionTN(editQTNRequest $request){
		$idTN = $request->idTN;
		$NoiDung = $request->NoiDung;
		$DapAn1 = $request->DapAn1;
		$DapAn2 = $request->DapAn2;
		$DapAn3 = $request->DapAn3;
		$DapAn4 = $request->DapAn4;
		$DapAnDung = $request->DapAnDung;

		if(Input::hasFile('fileAnh')) {
			$fileAnh = Input::file('fileAnh');
			$date = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
			$date = str_replace(":","",$date);
			$hinhanh = changeTitle($date.$fileAnh->getClientOriginalName());
			$fileAnh->move('public/images',$hinhanh);
			echo $hinhanh;
			$update = [
            'NoiDung'     => $NoiDung,
            'DapAn1'   => $DapAn1,
            'DapAn2'   => $DapAn2,
            'DapAn3'   => $DapAn3,
            'DapAn4'   => $DapAn4,
            'DapAnDung'   => $DapAnDung,
            'hinhanh' => $hinhanh,
            "updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
	        ];
			DB::table('ch_tns')->where('idTN',$idTN)->update($update);
		}
		else{
			$update = [
            'NoiDung'     => $NoiDung,
            'DapAn1'   => $DapAn1,
            'DapAn2'   => $DapAn2,
            'DapAn3'   => $DapAn3,
            'DapAn4'   => $DapAn4,
            'DapAnDung'   => $DapAnDung,
            "updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
            ];

			DB::table('ch_tns')->where('idTN',$idTN)->update($update);
		}
		
		return redirect()->route('admin.dethi.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã sửa câu hỏi thành công !!!']);
	}
	
	public function delimg(){
		if(Request::ajax()){
			$id = Request::get('id');
			$src = Request::get('src');
			$update = [
            "hinhanh"     => null,
            "updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
	        ];
			DB::table('ch_tns')->where('idTN',$id)->update($update);
			File::delete($src);
			echo 1;
		}
	}
}

