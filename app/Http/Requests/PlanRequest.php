<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'tag_id' => 'required|integer',
            'plan_title' => 'required|string|max:50',
            'plan_explanation' => 'required|string',
            'plan_status' => 'required|integer',
            'amount' => 'required|integer',
        ];
    }
}
