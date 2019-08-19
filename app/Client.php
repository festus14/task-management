<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'clients';

    const STATUS_SELECT = [
        '1' => 'Active',
        '0' => 'Inactive',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'expiry_date',
        'date_of_engagement',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'status',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
        'expiry_date',
        'date_of_engagement',
    ];

    public function getDateOfEngagementAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfEngagementAttribute($value)
    {
        $this->attributes['date_of_engagement'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getExpiryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpiryDateAttribute($value)
    {
        $this->attributes['expiry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    
    public function tasks()
    {
        return $this->hasMany(Task::class, 'client_id', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'client_id', 'id');
    }

    public function task_comments()
    {
        return $this->hasMany(TaskComment::class, 'client_id', 'id');
    }

    public function project_comments()
    {
        return $this->hasMany(ProjectComment::class, 'client_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'client_id', 'id');
    }

    public function reports()
    {
        return $this->hasMany(ProjectReport::class, 'client_id', 'id');
    }
}
