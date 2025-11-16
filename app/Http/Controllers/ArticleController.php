<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ArticleController extends Controller
{
    /**
     * Liste tous les articles
     */
    public function index()
    {
        $articles = Article::with('famille')->get();

        return response()->json([
            'success' => true,
            'data' => $articles
        ], 200);
    }

    /**
     * Création d'un nouvel article
     *
     * @param StoreArticleRequest $request
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        // création d'un article avec données validée par FormRequest
        $article = Article::create($request->validated());

        $article->load('famille');

        return response()->json([
            'success' => true,
            'message' => 'Article créé avec succès',
            'data' => $article
        ], 201);
    }



    /**
     * MAJ d'un article
     *
     * @param UpdateArticleRequest $request
     * @param Article $article
     * @return JsonResponse
     */
    public function update(UpdateArticleRequest $request, Article $article): JsonResponse
    {
        $article->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Article modifié avec succès',
            'data' => $article
        ], 200);
    }

    /**
     * Suppression d'un article
     *
     * @param Article $article
     * @return JsonResponse
     */
    public function destroy(Article $article): JsonResponse
    {
        $article->delete();

        return response()->json([
            'success' => true,
            'message' => 'Article supprimé avec succès'
        ], 200);
    }


    /**
     * Export des articles au format csv
     *
     * @return StreamedResponse
     */
    public function exportCsv(): StreamedResponse
    {
        //nom du fichier
        $fileName = 'articles_export_' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload(function () {
            $csv = fopen('php://output', 'w');


            // En-têtes du CSV
            fputcsv($csv, [
                'ID',
                'Nom',
                'Prix HT',
                'Prix achat',
                'Taux TGC ',
                'Famille',
                'Prix TTC',
                'Marge'
            ], ';');


            /** @var Article $article */
            foreach (Article::with('famille')->cursor() as $article) {
                fputcsv($csv, [
                    $article->id,
                    $article->nom,
                    number_format((float) $article->prix_ht, 2, ',', ''),
                    number_format((float) $article->prix_achat, 2, ',', ''),
                    (int)$article->taux_tgc,
                    $article->famille?->nom ?? '',
                    $article->getPrixTTC(),
                    $article->getMarge(),
                ], ';');
            }

            fclose($csv);
        }, $fileName, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
