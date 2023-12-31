<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'name' => 'required|min:4|alpha_num',
            'status' => 'required|min:4|alpha_num',
            // 'user_id' => 'required',
            'end_date' => 'required|min:4',
            'start_date' => 'required|min:4',
        ];
    }
}
