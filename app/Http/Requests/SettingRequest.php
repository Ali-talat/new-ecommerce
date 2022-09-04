<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'required|exists:settings',
            'plain_value'=>'nullable|numeric',
            'value'=>'required',
        ];

        
    }

    public function messages()
    {
        return [
            'id.required'=>'عفوا حدث خطا ما',
            'plain_value.required'=>'  هذا الحقل مطلوب',
            'value.required'=>'هذا الحقل مطلوب'
        ];
    }
}
