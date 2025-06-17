<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule; // Ajout de l'import de Rule

class UpdateCollaborateurRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $collaborateurId = $this->route('id'); 
        \Log::info('Collaborateur ID: ' . $collaborateurId);  
    
        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('collaborateurs')->ignore($collaborateurId, 'id')  // Ignore la validation de l'email pour l'utilisateur actuel
            ],
            'phone' => 'nullable|string|max:20',
            'birthdate' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'service' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'isAdmin' => 'nullable|boolean',
            'password' => 'nullable|string|min:8',
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
