<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
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
            'name' => ['required', 'unique:App\Models\Admin\Role,name', 'max:45'],
            'point' => ['required', 'max:100'],
            'admin' => ['nullable']
        ];
    }

    public function messages()
    {
        return [
            'point.required' => 'The default point field is required.',
            'point.max' => 'The default point must not be greater than :max characters.'
        ];
    }
}
