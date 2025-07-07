<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkins extends Model
{
    protected $table = 'checkins';
    protected $primaryKey = 'id_checkin';
    protected $fillable = [
        'user_id',
        'checkin_date',
        'lockers_used',
        'checkin_time',
        'checkout_time',
        'used_pt',
    ];
    public $timestamps = true;
}
