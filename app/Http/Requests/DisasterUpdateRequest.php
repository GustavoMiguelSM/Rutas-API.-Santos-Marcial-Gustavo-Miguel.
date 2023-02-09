<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DisasterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'damage_level_id' => 'required|numeric|exists:disaster_types,id',
            'PublicService_id' => 'required|numeric|exists:damage_levels,id',
            'casualties' => 'required|numeric|min:0',
            'description'=> 'required|string|max:255',
            'level'=> 'required|string|max:255',
            
        ];
    }
}