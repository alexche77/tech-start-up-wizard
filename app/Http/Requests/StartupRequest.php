<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartupRequest extends FormRequest
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
        return  [
            'name' => 'required|max:100',
            'description' => 'max:250',
            'features.*' => 'required|min:1',
            'category' => 'required|exists:categories,id',
            'mvp_deadline' => 'min:0',
            'seed_capital' => 'min:0',
        ];
    }
}
