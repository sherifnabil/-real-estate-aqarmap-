<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
            'first_name'        => 'required|string|max:50',
            'last_name'         => 'required|string|max:50',
            'email'             => ['required','string','email','max:50',Rule::unique('users')->ignore($this->user)],
            'phone'             => 'required|numeric|min:11',
            'address'           => 'required|string|max:100',
            'user_type'         => 'required|string',
            'city_id'           => 'required|numeric',
            'state_id'          => 'required|numeric',
            'password'          => 'sometimes|nullable|min:8|confirmed',
            'profile_image'     => 'sometimes|image',
        ];
    }
}
