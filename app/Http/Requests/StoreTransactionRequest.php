<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Helps\Authorize;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $auth = Authorize::is_user();
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
            'user' => ['required', 'unique:\App\Models\Admin\Transaction,user_id', 'exists:\App\Models\Admin\User,id'],
            'number' => ['required', 'exists:\App\Models\Admin\Candidate,number']
        ];
    }

    public function messages()
    {
        return [
            'number.exists' => 'The selected candidate is not exist.',
            'user.unique' => 'Forbidden.'
        ];
    }
}
