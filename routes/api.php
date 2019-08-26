<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('project-types', 'ProjectTypeApiController');

    Route::apiResource('project-sub-types', 'ProjectSubTypeApiController');

    Route::apiResource('documents', 'DocumentsApiController');

    Route::apiResource('clients', 'ClientApiController');

    Route::apiResource('projects', 'ProjectApiController');

    Route::get('project_create', 'ProjectApiController@createProject');

    Route::apiResource('project-comments', 'ProjectCommentsApiController');

    Route::apiResource('tast-categories', 'TastCategoryApiController');

    Route::apiResource('tasks', 'TaskApiController');
    
    Route::get('create_task', 'TaskApiController@createTask');

    Route::apiResource('task-statuses', 'TaskStatusApiController');

    Route::apiResource('task-comments', 'TaskCommentsApiController');

    Route::apiResource('task-comment-replies', 'TaskCommentReplyApiController');

    Route::apiResource('task-documents', 'TaskDocumentApiController');

    Route::apiResource('project-reports', 'ProjectReportApiController');

    Route::get('calendar', 'CalendarApiController@index');

    Route::get('calendar', 'CalendarApiController@index');

    Route::get('tasks_documents/{task}', 'TaskApiController@documents');

    Route::get('projects_documents/{project}', 'ProjectApiController@documents');
    Route::get('projects_tasks/{project}', 'ProjectApiController@tasks');

    Route::get('clients_tasks/{client}', 'ClientApiController@tasks');
    Route::get('clients_projects/{client}', 'ClientApiController@projects');



//    Route::get('client_project/{client_id}', 'ClientDashboardPagesAPIController@clientProject');
//    Route::get('client_task/{client_id}', 'ClientDashboardPagesAPIController@clientTask');
//    Route::post('client_project/{client_id}', 'ClientDashboardPagesAPIController@clientProject');
//    Route::post('client_task/{client_id}', 'ClientDashboardPagesAPIController@clientTask');

});
