<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanRule extends Model
{
    protected $fillable = [
        'min_plafon',
        'max_plafon',
        'tenor_months',
        'interest_rate_monthly',
        'admin_fee_percent',
        'insurance_fee_percent',
        'mandatory_savings_flat',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class, 'rule_id');
    }
}
