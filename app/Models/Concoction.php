<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concoction extends Model
{
    use HasFactory;

    public function obatalkes() {
        return $this->hasOne(Obatalkes::class, 'obatalkes_id', 'obatalkes_id');
    }
}
