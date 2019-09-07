<?php

namespace App\Http\Requests\Complaints;

use Illuminate\Foundation\Http\FormRequest;

class CreateComplaintsRequest extends FormRequest
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
            // 'user_id' =>        'required',
            'category' =>       'required',
            'subcategory' =>    'required',
            'service'=>         'required',
            'description' =>    'required',
            'customer_name' =>  'required',
            'job_assign' =>     'required',
            'date_completed'=>  'required',
        ];
    }
}
