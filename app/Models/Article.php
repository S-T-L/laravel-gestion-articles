<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix_ht',
        'prix_achat',
        'taux_tgc',
        'famille_id',

    ];


    protected $casts = [
        'prix_ht' => 'decimal:2',
        'prix_achat' => 'decimal:2',
        'taux_tgc' => 'decimal:2',

    ];

    public function famille()
    {
        return $this->belongsTo(Famille::class);
    }

    /**
     * Calcule le prix TTC
     *
     * @return void
     */
    public function getPrixTTC()
    {
        return $this->prix_ht * (1 + $this->taux_tgc / 100);
    }

    /**
     * Calcule la marge
     *
     * @return void
     */
    public function getMarge()
    {
        return $this->prix_ht - $this->prix_achat;
    }
}
