<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class editQTNRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'NoiDung' => 'required',
			'DapAn1' => 'required',
			'DapAn2' => 'required',
			'DapAn3' => 'required',
			'DapAn4' => 'required',
			'DapAnDung' => 'required|numeric|between:1,4'
		];
		
	}
	public function messages(){
		return [
			'NoiDung.required' => 'Vui lòng nhập nội dung câu hỏi !',
			'DapAn1.required' => 'Vui lòng nhập nội dung đáp án A !',
			'DapAn2.required' => 'Vui lòng nhập nội dung đáp án B!',
			'DapAn3.required' => 'Vui lòng nhập nội dung đáp án C !',
			'DapAn4.required' => 'Vui lòng nhập nội dung đáp án D !',
			'DapAnDung.between' => 'Đáp án đúng chỉ từ 1 - 4 !',
			'DapAnDung.numeric' => 'Đáp án đúng chỉ có thể nhập bằng số từ 1 -> 4!'
			];
	}

}
