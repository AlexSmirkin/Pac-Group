<?php

namespace App\Http\Requests;

use App\Models\Ship;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GalleryUpdateRequest extends FormRequest
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
            'title' => 'required',
            'ship_id' => [
                'required',
                Rule::in($shipIds),
            ],
            'ordering' => 'required|integer'
        ];
    }
}
