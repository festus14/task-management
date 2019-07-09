<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectSubType extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'project_sub_types';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
        'project_type_id',
    ];

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }
}
