<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TastCategory extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'tast_categories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'weight',
        'created_at',
        'updated_at',
        'deleted_at',
        'description',
        'project_type_id',
        'sub_category_id',
    ];

    public function project_type()
    {
        return $this->belongsTo(ProjectType::class, 'project_type_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(ProjectSubType::class, 'sub_category_id');
    }
}
