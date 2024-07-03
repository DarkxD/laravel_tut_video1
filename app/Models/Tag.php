<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false; // Azért mert a tábláiban nem használunk többet timestamp-et

    public function aitool(){
        return  $this->belongsToMany(Aitool::class);
    }
}