<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class MyMedia extends Model implements HasMedia
{
    use  HasMediaTrait, Auditable;

    public $table = 'media';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'model_type',
        'model_id',
        'collection_name',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'size',
        'order_column',
    ];

    public function project_report()
    {
        return $this->hasOne(ProjectReport::class, 'model_id', 'id');
    }

}
