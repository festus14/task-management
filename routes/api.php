<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('project-types', 'ProjectTypeApiController');

    Route::apiResource('project-sub-types', 'ProjectSubTypeApiController');

    Route::apiResource('documents', 'DocumentsApiController');

    Route::apiResource('clients', 'ClientApiController');

    Route::apiResource('projects', 'ProjectApiController');

    Route::apiResource('project-comments', 'ProjectCommentsApiController');

    Route::apiResource('tast-categories', 'TastCategoryApiController');

    Route::apiResource('tasks', 'TaskApiController');

    Route::apiResource('task-statuses', 'TaskStatusApiController');

    Route::apiResource('task-comments', 'TaskCommentsApiController');

    Route::apiResource('task-comment-replies', 'TaskCommentReplyApiController');

    Route::apiResource('task-documents', 'TaskDocumentApiController');

    Route::apiResource('project-reports', 'ProjectReportApiController');
});
