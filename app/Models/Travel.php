<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    use HasFactory;

    // Per fargli utilizzare la tabella 'travels'
    protected $table = 'travels';

    public function stops() {
        return $this->HasMany(Stop::class);
    }
}
