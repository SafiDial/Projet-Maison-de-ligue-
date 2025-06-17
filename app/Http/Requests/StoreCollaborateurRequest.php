<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollaborateurRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:collaborateurs,email',
            'phone' => 'required|string|max:15',
            'birthdate' => 'required|date',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'service' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Ce champ est obligatoire.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Ce mail est déjà utilisé.',
            'max' => 'Ce champ est trop long (max :max caractères).',
            'phone.max' => 'Le numéro de téléphone ne doit pas dépasser 15 caractères.',
            'min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'date' => 'Veuillez entrer une date valide.',
            'image' => 'Le fichier doit être une image.',
            'mimes' => 'Format de fichier image non autorisé. Formats autorisés : :values.',
        ];
    }
}
