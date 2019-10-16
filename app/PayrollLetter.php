<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PayrollLetter extends Model
{
    use SoftDeletes;

    public $table = 'payroll_letters';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date',
        'type_id',
        'client_id',
        'project_id',
        'staff_name',
        'fees_table',
        'created_at',
        'updated_at',
        'deleted_at',
        'fees_footer',
        'contact_person',
        'client_summary',
        'company_short_name',
        'other_services_charges',
    ];

    public function type()
    {
        return $this->belongsTo(LetterType::class, 'type_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function services()
    {
        return $this->belongsToMany(ServicesFee::class);
    }
}
