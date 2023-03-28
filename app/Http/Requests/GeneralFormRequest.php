<?php

namespace App\Http\Requests;

use App\Helpers\HttpHelper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GeneralFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(HttpHelper::apiResponse(
            [],
            'The given data is invalid',
            $validator->errors()->all(),
            422
        ));
    }
}
