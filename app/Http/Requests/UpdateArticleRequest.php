<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Si prix_ht absent -> utilisation de la valeur actuelle
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {

        if (!$this->has('prix_ht')) {
            $this->merge([
                'prix_ht' => $this->route('article')->prix_ht
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     * règles de validation pour la MAJ d'un article :
     * utilisation de sometimes pour ne valider que les champs présents
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'sometimes|string|max:255',
            'prix_ht' => 'sometimes|numeric|min:0',
            'prix_achat' => 'sometimes|numeric|min:0',
            'taux_tgc' => 'sometimes|numeric|in:3,6,11,22',
            'famille_id' => 'sometimes|exists:familles,id'

        ];
    }

    /**
     * Réponse json en cas d'erreur de validation
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
