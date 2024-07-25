<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Log;

class BaseFormRequest extends FormRequest
{
    /**
     * API実行時のバリデーション継承元
     *
     * @param $validator
     * @return
     */
    protected function failedValidation(Validator $validator): void
    {
        $response['errors'] = $validator->errors()->toArray();
        Log::error($response);
        throw new HttpResponseException(response()->json([
            'error' => [
                'code' => 405,
                'message' => 'バリデーションエラー'
              ]
          ], 405));
    }
}
