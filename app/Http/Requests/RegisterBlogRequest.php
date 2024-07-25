<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseFormRequest;

class RegisterBlogRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:20',
            'explanation' => 'required|max:255',
            'published_date' => 'nullable|date_format:Y-m-d H:i:s',
            'published_flg' => 'required|boolean',
            'delete_flg' => 'required|boolean',
        ];
    }
}
