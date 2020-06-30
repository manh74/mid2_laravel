<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
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
			'name' => 'required|unique:tour,name',
			'uploadFile' => 'required',
            'typetour' => 'required',
            'schedule' => 'required',
            'depart' => 'required',
            'number' => 'required',
            'price' => 'required'
		];
    }

    public function messages(){
		return [
			'name.required' => 'Tên không được bỏ trống',
			'name.unique' => 'Tên đã tồn tại',
            'typetour.required' => 'Kiểu tour không được bỏ trống',
            'uploadFile.required' => 'Ảnh không được bỏ trống',
            'schedule.required' => 'Lịch trình không được bỏ trống',
            'depart.required' => 'Ngày khởi hành không được bỏ trống',
            'number.required' => 'Vui lòng nhập số người',
            'price.required' => 'Vui lòng nhập giá'
		];
	}
}
