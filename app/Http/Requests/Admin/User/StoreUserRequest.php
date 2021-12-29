<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use App\Helps\Authorize;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth = Authorize::is_admin();
        return $auth;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => ['required'],
            'username' => ['required', 'unique:\App\Models\Admin\User,username'],
            'password' => ['required', 'min:8'],
            'role' => ['required', 'exists:\App\Models\Admin\Role,id']
        ];
    }
}
