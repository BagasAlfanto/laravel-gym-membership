<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalTrainers extends Model
{
    protected $table = 'personal_trainers';
    protected $primaryKey = 'id_pt';
    protected $fillable = [
        'name',
        'price',
        'no_wa',
    ];

    public $timestamps = true;
}
