<?php

namespace App\Http\Requests;

class StoreOperatorRequest extends GeneralFormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|unique:users,name',
            'password' => 'required|min:8'
        ];
    }
}
