<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ide_schema' => 'nullable|integer',
            'flag_piece' => 'nullable|boolean',
            'mask_piece' => 'nullable|string|max:255',
            'flag_compte' => 'nullable|boolean',
            'mask_compte' => 'nullable|string|max:255',
        ];
    }
}
