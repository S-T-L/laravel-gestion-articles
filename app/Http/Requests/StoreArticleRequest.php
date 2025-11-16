<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreArticleRequest extends FormRequest
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
     * Règles de validation pour la création d'un article :
     * 
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'prix_ht' => 'required|numeric|min:0',
            'prix_achat' => 'required|numeric|min:0|lt:prix_ht',
            'taux_tgc' => 'required|numeric|in:3,6,11,22',
            'famille_id' => 'required|exists:familles,id'
        ];
    }

    /**
     * Messages d'erreur
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nom.required' => 'Le nom de l\'article est obligatoire.',
            'nom.string' => 'Le nom doit être une chaîne de caractères.',

            'prix_ht.required' => 'Le prix HT est obligatoire.',
            'prix_ht.numeric' => 'Le prix HT doit être un nombre.',
            'prix_ht.min' => 'Le prix HT doit être supérieur ou égal à 0.',

            'prix_achat.required' => 'Le prix d\'achat est obligatoire.',
            'prix_achat.numeric' => 'Le prix d\'achat doit être un nombre.',
            'prix_achat.min' => 'Le prix d\'achat doit être supérieur ou égal à 0.',
            'prix_achat.lt' => 'Le prix d\'achat doit être inférieur au prix HT.',

            'taux_tgc.required' => 'Le taux TGC est obligatoire.',
            'taux_tgc.numeric' => 'Le taux TGC doit être un nombre.',
            'taux_tgc.in' => 'Le taux TGC doit être : 3, 6, 11 ou 22.',

            'famille_id.required' => 'La famille de l\'article est obligatoire.',
            'famille_id.exists' => 'La famille sélectionnée n\'existe pas.',
        ];
    }
    /**
     * Réponse json avec les erreurs de validation
     *
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422)
        );
    }
}
