<?php

namespace App\Http\Requests\Admin\Candidate;

use Illuminate\Foundation\Http\FormRequest;
use App\Helps\Authorize;

class StoreCandidateRequest extends FormRequest
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
        $exp = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/si';
        return [
            'number' => ['required', 'numeric', 'min:1'],
            'position' => ['nullable'],
            'address' => ['nullable'],
            'education' => ['nullable'],
            'name' => ['required', 'max:50'],
            'image' => ['required', 'url', 'active_url'],
            'video' => ['required', sprintf('regex:%s', $exp)],
            'description' => ['required']
        ];
    }
}
