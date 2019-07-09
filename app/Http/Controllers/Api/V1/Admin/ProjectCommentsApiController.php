<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectCommentRequest;
use App\Http\Requests\UpdateProjectCommentRequest;
use App\ProjectComment;

class ProjectCommentsApiController extends Controller
{
    public function index()
    {
        $projectComments = ProjectComment::all();

        return $projectComments;
    }

    public function store(StoreProjectCommentRequest $request)
    {
        return ProjectComment::create($request->all());
    }

    public function update(UpdateProjectCommentRequest $request, ProjectComment $projectComment)
    {
        return $projectComment->update($request->all());
    }

    public function show(ProjectComment $projectComment)
    {
        return $projectComment;
    }

    public function destroy(ProjectComment $projectComment)
    {
        $projectComment->delete();

        return response("OK", 200);
    }
}
