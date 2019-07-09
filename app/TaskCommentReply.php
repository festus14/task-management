<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskCommentReply extends Model
{
    use SoftDeletes, Auditable;

    public $table = 'task_comment_replies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'reply_by_id',
        'task_comment_id',
        'task_comment_reply',
    ];

    public function task_comment()
    {
        return $this->belongsTo(TaskComment::class, 'task_comment_id');
    }

    public function reply_by()
    {
        return $this->belongsTo(User::class, 'reply_by_id');
    }
}
