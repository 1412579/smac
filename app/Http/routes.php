<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',  ['as'=>'homepage', 'uses' => 'WelcomeController@index']);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);



Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('dashboard', ['as'=>'admin.dashboard','uses'=>'DeThiController@dashboard']);
	
	Route::group(['prefix'=>'dethi'],function(){
	//route get list
		Route::get('list', ['as'=>'admin.dethi.getList','uses'=>'DeThiController@getList']);
		//Route Add
		Route::get('add',['as'=>'admin.dethi.getAdd','uses'=>'DeThiController@getAdd']);
		Route::post('add',['as'=>'admin.dethi.postAdd','uses'=>'DeThiController@postAdd']);

		Route::get('delete/{id}',['as'=>'admin.dethi.getDelete','uses'=>'DeThiController@getDelete']);
		//Route 

		Route::get('question/{id}', ['as'=>'admin.dethi.getQuestion','uses'=>'DeThiController@getQuestion']);

		Route::get('editquestiontn/{id}', ['as'=>'admin.dethi.editQuestionTN','uses'=>'DeThiController@editQuestionTN']);
		Route::post('peditquestiontn', ['as'=>'admin.dethi.peditQuestionTN','uses'=>'DeThiController@peditQuestionTN']);

		Route::get('del-img/{id}', ['as'=>'admin.dethi.delimg','uses'=>'DeThiController@delimg']);
	});

	Route::group(['prefix'=>'baiviet'],function(){

		Route::get('list', ['as'=>'admin.baiviet.getList','uses'=>'BaiVietController@getList']);
		//Route Add
		Route::get('add',['as'=>'admin.baiviet.getAdd','uses'=>'BaiVietController@getAdd']);
		Route::post('add',['as'=>'admin.baiviet.postAdd','uses'=>'BaiVietController@postAdd']);

		Route::get('edit/{id}',['as'=>'admin.baiviet.getEdit','uses'=>'BaiVietController@getEdit']);
		Route::post('edit',['as'=>'admin.baiviet.postEdit','uses'=>'BaiVietController@postEdit']);

		Route::get('delete/{id}',['as'=>'admin.baiviet.getDelete','uses'=>'BaiVietController@getDelete']);

		Route::get('del-thumb/{id}', ['as'=>'admin.dethi.delThumb','uses'=>'BaiVietController@delThumb']);
	});

	
	Route::group(['prefix'=>'nhom'],function(){
	//route get list
		Route::get('list', ['as'=>'admin.nhom.getList','uses'=>'NhomController@getList']);
		Route::get('cap-nhat-luot-all/{soluot}',['as' => 'admin.nhom.capNhat','uses' => 'NhomController@capNhatAll']);
		Route::get('cap-nhat-luot/{id}/{qty}',['as' => 'admin.nhom.capNhat','uses' => 'NhomController@capNhat']);
	});

	Route::group(['prefix'=>'ketqua'],function(){
	//route get list
		Route::get('list', ['as'=>'admin.ketqua.getList','uses'=>'XepHangController@getList']);
		Route::get('joined', ['as'=>'admin.ketqua.getListJoined','uses'=>'XepHangController@getListJoined']);
		Route::get('/{id}/{lanthi}', ['as'=>'admin.ketqua.detailTeam','uses'=>'XepHangController@detailTeam']);
	});
});


Route::get('tham-gia-thi',['as' => 'thamgiathi', 'middleware'=>'userLogin' , 'uses' => 'WelcomeController@thamgiathi']);
Route::post('submit',['as' => 'submit', 'uses' => 'WelcomeController@submit']);

Route::get('gioi-thieu',['as' => 'gioithieu', 'uses' => 'WelcomeController@gioithieu']);

Route::get('lien-he',['as' => 'lienhe', 'uses' => 'WelcomeController@lienhe']);

Route::get('huong-dan',['as' => 'huongdan', 'uses' => 'WelcomeController@huongdan']);

Route::get('/{id}/{slug}',['as' => 'post', 'uses' => 'WelcomeController@post']);

Route::get('/admin', array('as' => 'adminLogin', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('/admin', array('as' => 'adminLogin', 'uses' => 'Auth\AuthController@postLogin'));


Route::get('/login', array('as' => 'userLogin', 'uses' => 'Auth\AuthController@usergetLogin'));
Route::post('/login', array('as' => 'userLogin', 'uses' => 'Auth\AuthController@userpostLogin'));

Route::post('/userinfo', array('as' => 'userimformation', 'uses' => 'WelcomeController@userImformation'));
Route::post('/userpass', array('as' => 'userpass', 'uses' => 'WelcomeController@userPass'));
//Route::post('test',['as' => 'submit', 'test' => 'WelcomeController@test'])