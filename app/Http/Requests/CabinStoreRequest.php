<?php

namespace App\Http\Requests;

use App\Models\Ship;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CabinStoreRequest extends FormRequest
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
        $shipIds = Ship::select('id')->pluck('id')->values();

        return [
            'ship_id' => [
                'required',
                Rule::in($shipIds),
            ],
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
