<?php

namespace App\Http\Requests;

use App\Rules\IsValidJson;
use Illuminate\Foundation\Http\FormRequest;

class ShipStoreRequest extends FormRequest
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
            'title' => 'required',
            'spec' => ['required', new IsValidJson],
            'description' => 'required'
        ];
    }
}
