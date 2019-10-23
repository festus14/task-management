<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'projects';

    protected $dates = [
        'deadline',
        'created_at',
        'updated_at',
        'deleted_at',
        'starting_date',
    ];

    protected $fillable = [
        'name',
        'deadline',
        'status_id',
        'client_id',
        'manager_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'starting_date',
        'project_type_id',
        'project_subtype_id',
    ];

    public function getStartingDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartingDateAttribute($value)
    {
        $this->attributes['starting_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDeadlineAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDeadlineAttribute($value)
    {
        $this->attributes['deadline'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function team_members()
    {
        return $this->belongsToMany(User::class, 'user_project');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id', 'id')->with('assinged_tos');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }
    public function project_subtype()
    {
        return $this->belongsTo(ProjectSubType::class, 'project_subtype_id');
    }
    public function documents()
    {
        return $this->hasMany(Document::class, 'project_id', 'id')->with('media_report');
    }
    public function comments()
    {
        return $this->hasMany(ProjectComment::class, 'project_id', 'id')->with('user');
    }
    public function reports()
    {
        return $this->hasMany(ProjectReport::class, 'project_id', 'id')->with('media_report');
    }
}
