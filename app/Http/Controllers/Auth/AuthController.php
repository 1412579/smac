<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\LoginRequest;
use Session;
use Auth;
use Input;
use DB;
class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;
	protected $redirectPath = 'admin';
	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	protected $loginPath = 'admin';
	
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function getLogin(){
		if(Auth::check())
			if (Auth::user()->Quyen == 0)
				return redirect()->route('homepage');
		return view('login.admin');
	}
	public function postLogin(LoginRequest $request){

		$remember = (Input::has('remember')) ? true : false;
		
		$auth = Auth::attempt(
            [
                'TenDangNhap' => $request->txtUser,
				'password' => $request->txtPass,
				'Quyen' => 1 
            ], $remember
        );

		if($auth){
			return redirect()->route('admin.dashboard');
		}
		else{
			return redirect()->back()->withInput(Input::except('password'))->with('status', 'Tài khoản hoặc mật khẩu không chính xác!');
		}
	}

	public function usergetLogin(){


		return view('login.user');
	}
	public function userpostLogin(LoginRequest $request){

		$remember = (Input::has('remember')) ? true : false;
		
		$auth = Auth::attempt(
            [
                'TenDangNhap' => $request->txtUser,
				'password' => $request->txtPass,
				'Quyen' => 0 
            ], $remember
        );
		if($auth){
			if(Auth::user()->KichHoat==0){
				DB::table('teams')->where('id',Auth::user()->id)->update(["KichHoat" => 1]);
				return redirect()->route('homepage')->with('firstLogin','Ahihi');
			}
			return redirect()->route('homepage');
		}
		else{
			return redirect()->back()->withInput(Input::except('password'))->with('status', 'Tài khoản hoặc mật khẩu không chính xác!');
		}
	}


}
