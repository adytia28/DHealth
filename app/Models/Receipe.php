<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    use HasFactory;

    public function signa() {
        return $this->belongsTo(Signas::class, 'id', 'signa_id');
    }

    public function concoction() {
        return $this->hasMany(Concoction::class, 'receipes_id', 'id');
    }
}
