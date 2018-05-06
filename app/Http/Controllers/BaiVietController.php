<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\BaiVietRequest;
use Input;
use Auth;
use DB;
use File;
class BaiVietController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getAdd(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		return view('admin.baiviet.add');
	}

	public function postAdd(BaiVietRequest $request){
		$title = $request->title;
		$headline = $request->headline;
		$content = $request->content;
		
		$date = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
		$date = str_replace(":","",$date);
		if(Input::hasFile('thumbnail')){
        	$fileTN = Input::file('thumbnail');
			$fileTN->move('public/thumbnail',changeTitle($date.$fileTN->getClientOriginalName()));
		}
		
		DB::table('bai_viets')->insert(
				    [
				    	'idNhom' => Auth::user()->id, 
					    'title' => $title,
					    'slug' => changeTitle($title),
					    'headline' => $headline,
					    'thumbnail' => changeTitle($date.$fileTN->getClientOriginalName()),
					    'content' => $content,
					    "created_at" =>  \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		]
				);
		return redirect()->route('admin.baiviet.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã thêm bài viết thành công !!!']);

	}

	public function getList(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$baiviet = DB::table('bai_viets')->orderBy('idBV','DESC')->get();
		return view('admin.baiviet.list',compact('baiviet'));
	}

	public function getDelete($id){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		DB::table('bai_viets')->where('idBV',$id)->delete();
		return redirect()->route('admin.baiviet.getList')->with(['flash_level'=>'danger','flash_massage'=>'Đã xoá bài viết thành công !!!']);
	}

	public function getEdit($id){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		$baiviet = DB::table('bai_viets')->where('idBV',$id)->first();
		return view('admin.baiviet.edit',compact('baiviet'));
	}

	public function postEdit(BaiVietRequest $request){
		$idBV = $request->idBV;
		$title = $request->title;
		$headline = $request->headline;
		$content = $request->content;
		$date = \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
		$date = str_replace(":","",$date);
		if(Input::hasFile('thumbnail')){
        	$fileTN = Input::file('thumbnail');
			$fileTN->move('public/thumbnail',changeTitle($date.$fileTN->getClientOriginalName()));
			$update = [
				    	'idNhom' => Auth::user()->id, 
					    'title' => $title,
					    'slug' => changeTitle($title),
					    'headline' => $headline,
					    'thumbnail' => changeTitle($date.$fileTN->getClientOriginalName()),
					    'content' => $content,
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		];

			DB::table('bai_viets')->where('idBV',$idBV)->update($update);
		}
		$update = [
				    	'idNhom' => Auth::user()->id, 
					    'title' => $title,
					    'slug' => changeTitle($title),
					    'headline' => $headline,
					    'content' => $content,
		           		"updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
	           		];
		DB::table('bai_viets')->where('idBV',$idBV)->update($update);
		return redirect()->route('admin.baiviet.getList')->with(['flash_level'=>'success','flash_massage'=>'Đã sửa bài viết thành công !!!']);

	}

	public function delThumb(){
		if(Request::ajax()){
			$id = Request::get('id');
			$src = Request::get('src');
			$update = [
            "thumbnail"     => null,
            "updated_at" => \Carbon\Carbon::now('Asia/Ho_Chi_Minh')
	        ];
			DB::table('bai_viets')->where('idBV',$id)->update($update);
			File::delete($src);
			echo 1;
		}
	}

}
	

