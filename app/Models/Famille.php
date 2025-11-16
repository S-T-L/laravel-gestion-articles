<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *Modèle Famille
 */
class Famille extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom'
    ];

    /**
     * Relation : une famille possède plusieurs articles
     *
     * @return 
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
