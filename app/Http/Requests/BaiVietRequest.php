<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class BaiVietRequest extends Request {

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
			'title' => 'required',
			// 'thumbnail' => 'required',
			'headline' => 'required',
			'content' => 'required',
		];
		
	}
	public function messages(){
		return [
			'title.required' => 'Vui lòng nhập tiêu đề bài viết !',
			// 'thumbnail.required' => 'Vui lòng chọn ảnh thumbnail !',
			'headline.required' => 'Vui lòng nhập nội dung rút gọn !',
			'content.required' => 'Vui lòng nhập nội dung chính!',
			];
	}

}
