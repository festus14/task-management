<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTaskCommentReplyRequest;
use App\Http\Requests\StoreTaskCommentReplyRequest;
use App\Http\Requests\UpdateTaskCommentReplyRequest;
use App\TaskComment;
use App\TaskCommentReply;
use App\User;

class TaskCommentReplyController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('task_comment_reply_access'), 403);

        $taskCommentReplies = TaskCommentReply::all();

        return view('admin.taskCommentReplies.index', compact('taskCommentReplies'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('task_comment_reply_create'), 403);

        $task_comments = TaskComment::all()->pluck('comments', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reply_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.taskCommentReplies.create', compact('task_comments', 'reply_bies'));
    }

    public function store(StoreTaskCommentReplyRequest $request)
    {
        abort_unless(\Gate::allows('task_comment_reply_create'), 403);

        $taskCommentReply = TaskCommentReply::create($request->all());

        return redirect()->route('admin.task-comment-replies.index');
    }

    public function edit(TaskCommentReply $taskCommentReply)
    {
        abort_unless(\Gate::allows('task_comment_reply_edit'), 403);

        $task_comments = TaskComment::all()->pluck('comments', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reply_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $taskCommentReply->load('task_comment', 'reply_by');

        return view('admin.taskCommentReplies.edit', compact('task_comments', 'reply_bies', 'taskCommentReply'));
    }

    public function update(UpdateTaskCommentReplyRequest $request, TaskCommentReply $taskCommentReply)
    {
        abort_unless(\Gate::allows('task_comment_reply_edit'), 403);

        $taskCommentReply->update($request->all());

        return redirect()->route('admin.task-comment-replies.index');
    }

    public function show(TaskCommentReply $taskCommentReply)
    {
        abort_unless(\Gate::allows('task_comment_reply_show'), 403);

        $taskCommentReply->load('task_comment', 'reply_by');

        return view('admin.taskCommentReplies.show', compact('taskCommentReply'));
    }

    public function destroy(TaskCommentReply $taskCommentReply)
    {
        abort_unless(\Gate::allows('task_comment_reply_delete'), 403);

        $taskCommentReply->delete();

        return back();
    }

    public function massDestroy(MassDestroyTaskCommentReplyRequest $request)
    {
        TaskCommentReply::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}
