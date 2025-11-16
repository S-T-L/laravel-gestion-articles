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
