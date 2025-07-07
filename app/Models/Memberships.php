<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memberships extends Model
{
    protected $table = 'memberships';
    protected $primaryKey = 'id_membership';
    protected $fillable = [
        'package_name',
        'price',
        'duration',
    ];

    public $timestamps = true;
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['id_membership'];
}
