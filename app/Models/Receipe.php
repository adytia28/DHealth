<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipe extends Model
{
    use HasFactory;

    public function signa() {
        return $this->hasOne(SignaM::class, 'id', 'signa_id');
    }
}
