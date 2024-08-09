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

    protected $fillable = [
        'name',
        'slug',
        'start_date',
        'end_date',
        'days_tot',
        'photo',
        'description',
        'vote'
    ];
}
