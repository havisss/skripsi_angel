<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id',
        'rule_id',
        'principal_amount',
        'net_disbursement',
        'total_deduction',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rule()
    {
        return $this->belongsTo(LoanRule::class, 'rule_id');
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
