<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavingsTransaction extends Model
{
    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'type_trx',
        'status',
        'proof_of_payment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
