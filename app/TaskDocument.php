<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class TaskDocument extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait, Auditable;

    public $table = 'task_documents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DOCUMENT_TYPE_SELECT = [
        '1' => 'Word',
        '2' => 'PDF',
        '3' => 'Excel',
        '4' => 'Text',
    ];

    protected $fillable = [
        'name',
        'task_id',
        'comment',
        'client_id',
        'project_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'document_type',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function getdocumentAttribute()
    {
        return $this->getMedia('document')->last();
    }
}
