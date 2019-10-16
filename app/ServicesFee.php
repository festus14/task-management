<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServicesFee extends Model
{
    use SoftDeletes;

    public $table = 'services_fees';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'amount',
        'details',
        'currency',
        'created_at',
        'updated_at',
        'deleted_at',
        'currency_rate',
    ];

    public function payrollLetters()
    {
        return $this->belongsToMany(PayrollLetter::class);
    }
}
