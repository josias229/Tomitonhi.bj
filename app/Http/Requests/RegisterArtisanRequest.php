<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterArtisanRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'whatsapp' => 'required|string|max:20',
            'rccm' => ['required', 'string', 'unique:artisans,rccm', 'regex:/^[A-Z0-9]{10}$/'],
            'ifu' => ['required', 'string', 'unique:artisans,ifu'],
            'cni' => 'required|file|mimes:pdf,jpg,png|max:5120',
            'produits.*' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'atelier' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'rccm.regex' => 'Le format RCCM doit être RB123456789',
            'cni.max' => 'Le fichier CNI ne doit pas dépasser 5MB',
            'produits.*.max' => 'Chaque image produit ne doit pas dépasser 2MB',
        ];
    }
}
