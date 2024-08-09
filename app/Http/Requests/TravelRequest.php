<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
            'name' => 'required|min:3|max:100',
            'photo' => 'image|mimes:jpg,png|max:20480'
        ];
    }

    public function message(): array {
        return [
            'name.required' => 'Il nome del viaggio è un campo obbligatorio',
            'name.min' => 'Il viaggio può avere un minimo di :min caratteri',
            'name.max' => 'Il viaggio può avere un massimo di :max caratteri',
             'photo.image' => 'Il file caricato deve essere un immagine',
            'photo.mimes' => 'La photo del viaggio deve essere in formato .JPG o .PNG',
            'photo.max' => 'La photo caricata non può essere più pesante di :max KB'
        ];
    }
}
