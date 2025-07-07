<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'id_transaction';
    protected $fillable = [
        'user_id',
        'transaction_date',
        'membership_id',
        'quota_pt',
        'personal_trainer_id',
        'total_amount',
        'payment_status',
        'transaction_type',
    ];
    public $timestamps = true;
}
