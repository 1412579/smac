<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class DeRequest extends Request {

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
			'idBo' => 'required',
			'TenDe' => 'required',
			'fileDeTN' => 'required',
		];
		
	}
	public function messages(){
		return [
			'idBo.required' => 'Vui lòng chọn bộ đề !',
			'TenDe.required' => 'Vui lòng nhập tên đề thi !',
			'fileDeTN.required' => 'Vui lòng chọn file đề thi trắc nghiệm !',
			];
	}

}
