<?php

namespace App\Models;

use App\Models\Designer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $with = ['secteur', 'designer'];
    protected $fillable = [
        'file_name',
        'description',
        'commentaire',
        'file_path',
        'is_visible',
        'is_accepted',
        'points',
        'secteur_id',
        'designer_id',
    ];


    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }

    public function secteur()
    {
        return $this->belongsTo(Secteur::class);
    }
}
