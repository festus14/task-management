<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class ProjectReport extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'project_reports';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'client_id',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'project_report',
    ];

    public function getuploadsAttribute()
    {
        return $this->getMedia('uploads')->last();
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id')->withTrashed();
    }
    public function  media_report(){
        return $this->hasMany(MyMedia::class, 'model_id')
           ->where('media.model_type', '=','App\ProjectReport');
    }
}
