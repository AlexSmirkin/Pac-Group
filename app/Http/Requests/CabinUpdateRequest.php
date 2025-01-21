<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CabinUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'vendor_code' => 'required|max:10',
            'title' => 'required',
            'type' => [
                'required',
                Rule::in(['Inside', 'Ocean view', 'Balcony', 'Suite']),
            ],
            'description' => 'required'
        ];
    }
}
