<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => ['required', 'string', 'max:255'],
            'self_introduction' => ['nullable', 'string'],
            'user_status' => ['nullable', 'numeric'],
            'career' => ['nullable', 'string'],
            'portfolio_1' => ['nullable', 'string', 'max:50'],
            'portfolio_1_url' => ['nullable', 'string', 'max:255'],
            'portfolio_2' => ['nullable', 'string', 'max:50'],
            'portfolio_2_url' => ['nullable', 'string', 'max:255'],
            'portfolio_3' => ['nullable', 'string', 'max:50'],
            'portfolio_3_url' => ['nullable', 'string', 'max:255'],
        ];
    }
}
