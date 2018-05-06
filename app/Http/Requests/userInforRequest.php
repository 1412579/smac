<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class userInforRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function rules()
	{
		return [
			'captainName' => 'required',
			'captainPhone' => 'required',
			'captainEmail' => 'required',
			'memberOne' => 'required',
			'memberTwo' => 'required',
		];
		
	}
	public function messages(){
		return [
			'captainName.required' => 'Vui lòng nhập đầy đủ các thông tin!!!',
			'captainPhone.required' => 'Vui lòng nhập đầy đủ các thông tin!!!',
			'captainEmail.required' =>  'Vui lòng nhập đầy đủ các thông tin!!!',
			'memberOne.required' =>  'Vui lòng nhập đầy đủ các thông tin!!!',
			'memberTwo.required' =>  'Vui lòng nhập đầy đủ các thông tin!!!',
			];
	}

}
