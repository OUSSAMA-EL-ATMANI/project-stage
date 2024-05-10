<?php

namespace App\Models;

use App\Models\Designer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    public function designer()
    {
        return $this->belongsTo(Designer::class);
    }
}
