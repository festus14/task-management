<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'tasks';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'ending_date',
        'starting_date',
    ];
    
    protected $fillable = [
        'name',
        'status_id',
        'client_id',
        'manager_id',
        'project_id',
        'project_subtype_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'category_id',
        'ending_date',
        'starting_date',
    ];

    public function getStartingDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartingDateAttribute($value)
    {
        $this->attributes['starting_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getEndingDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEndingDateAttribute($value)
    {
        $this->attributes['ending_date'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function category()
    {
        return $this->belongsTo(TastCategory::class, 'category_id');
    }

    public function assinged_tos()
    {
        return $this->belongsToMany(User::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    public function status()
    {
        return $this->belongsTo(TaskStatus::class, 'status_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function project_sub_type()
    {
        return $this->belongsTo(ProjectSubType::class, 'project_subtype_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function documents(){
        return $this->hasMany(TaskDocument::class, 'task_id' , 'id');
    }
    public function comments(){
        return $this->hasMany(TaskComment::class, 'task_id' , 'id');
    }
    public function reports(){
        return $this->hasMany(TaskDocument::class, 'task_id' , 'id');
    }
}
