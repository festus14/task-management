<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\\App\\Project',
            'date_field' => 'starting_date',
            'field'      => 'name',
            'prefix'     => 'Project',
            'suffix'     => '',
            'route'      => 'admin.projects.edit',
        ],
        [
            'model'      => '\\App\\Task',
            'date_field' => 'starting_date',
            'field'      => 'name',
            'prefix'     => 'Task',
            'suffix'     => '',
            'route'      => 'admin.tasks.edit',
        ],
        [
            'model'      => '\\App\\Task',
            'date_field' => 'ending_date',
            'field'      => 'name',
            'prefix'     => 'Task:',
            'suffix'     => 'Eding',
            'route'      => 'admin.tasks.edit',
        ],
        [
            'model'      => '\\App\\Project',
            'date_field' => 'deadline',
            'field'      => 'name',
            'prefix'     => 'Project',
            'suffix'     => 'Ending',
            'route'      => 'admin.projects.edit',
        ],
        [
            'model'      => '\\App\\TaskComment',
            'date_field' => 'created_at',
            'field'      => 'created_at',
            'prefix'     => 'Commented',
            'suffix'     => '',
            'route'      => 'admin.task-comments.edit',
        ],
        [
            'model'      => '\\App\\TaskCommentReply',
            'date_field' => 'created_at',
            'field'      => 'task_comment_reply',
            'prefix'     => 'Replied',
            'suffix'     => '',
            'route'      => 'admin.task-comment-replies.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['field']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
