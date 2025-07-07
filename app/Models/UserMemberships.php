<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserMemberships extends Model
{
    protected $table = 'user_memberships';
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'membership_id',
        'start_date',
        'end_date',
        'status',
    ];
    public $timestamps = true;
}
