<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/audit-logs*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.userManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.auditLog.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('client_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/clients*') ? 'menu-open' : '' }} {{ request()->is('admin/client-portals*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-box-open">
                            </i>
                            <p>
                                <span>{{ trans('cruds.clientManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('client_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.clients.index") }}" class="nav-link {{ request()->is('admin/clients') || request()->is('admin/clients/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-building">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.client.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('client_portal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.client-portals.index") }}" class="nav-link {{ request()->is('admin/client-portals') || request()->is('admin/client-portals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-bookmark">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.clientPortal.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('project_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/project-types*') ? 'menu-open' : '' }} {{ request()->is('admin/project-sub-types*') ? 'menu-open' : '' }} {{ request()->is('admin/documents*') ? 'menu-open' : '' }} {{ request()->is('admin/projects*') ? 'menu-open' : '' }} {{ request()->is('admin/project-comments*') ? 'menu-open' : '' }} {{ request()->is('admin/project-reports*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-archway">

                            </i>
                            <p>
                                <span>{{ trans('cruds.projectManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('project_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-types.index") }}" class="nav-link {{ request()->is('admin/project-types') || request()->is('admin/project-types/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-bars">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.projectType.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_sub_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-sub-types.index") }}" class="nav-link {{ request()->is('admin/project-sub-types') || request()->is('admin/project-sub-types/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-align-left">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.projectSubType.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.documents.index") }}" class="nav-link {{ request()->is('admin/documents') || request()->is('admin/documents/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-book">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.document.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.projects.index") }}" class="nav-link {{ request()->is('admin/projects') || request()->is('admin/projects/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-blender">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.project.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_comment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-comments.index") }}" class="nav-link {{ request()->is('admin/project-comments') || request()->is('admin/project-comments/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-comment-dots">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.projectComment.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('project_report_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.project-reports.index") }}" class="nav-link {{ request()->is('admin/project-reports') || request()->is('admin/project-reports/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-file">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.projectReport.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/task-portals*') ? 'menu-open' : '' }} {{ request()->is('admin/tast-categories*') ? 'menu-open' : '' }} {{ request()->is('admin/tasks*') ? 'menu-open' : '' }} {{ request()->is('admin/task-statuses*') ? 'menu-open' : '' }} {{ request()->is('admin/task-comments*') ? 'menu-open' : '' }} {{ request()->is('admin/task-comment-replies*') ? 'menu-open' : '' }} {{ request()->is('admin/task-documents*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-thumbtack">

                            </i>
                            <p>
                                <span>{{ trans('cruds.taskManagement.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('task_portal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-portals.index") }}" class="nav-link {{ request()->is('admin/task-portals') || request()->is('admin/task-portals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-bookmark">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskPortal.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tast_category_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tast-categories.index") }}" class="nav-link {{ request()->is('admin/tast-categories') || request()->is('admin/tast-categories/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user-edit">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.tastCategory.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tasks.index") }}" class="nav-link {{ request()->is('admin/tasks') || request()->is('admin/tasks/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user-edit">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.task.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_status_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-statuses.index") }}" class="nav-link {{ request()->is('admin/task-statuses') || request()->is('admin/task-statuses/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-check-double">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskStatus.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_comment_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-comments.index") }}" class="nav-link {{ request()->is('admin/task-comments') || request()->is('admin/task-comments/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-comment">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskComment.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_comment_reply_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-comment-replies.index") }}" class="nav-link {{ request()->is('admin/task-comment-replies') || request()->is('admin/task-comment-replies/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-comments">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskCommentReply.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('task_document_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.task-documents.index") }}" class="nav-link {{ request()->is('admin/task-documents') || request()->is('admin/task-documents/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-file-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.taskDocument.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('letter_mgt_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/letter-types*') ? 'menu-open' : '' }} {{ request()->is('admin/payroll-letters*') ? 'menu-open' : '' }} {{ request()->is('admin/services-fees*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-database">

                            </i>
                            <p>
                                <span>{{ trans('cruds.letterMgt.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('letter_type_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.letter-types.index") }}" class="nav-link {{ request()->is('admin/letter-types') || request()->is('admin/letter-types/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-address-book">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.letterType.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('payroll_letter_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.payroll-letters.index") }}" class="nav-link {{ request()->is('admin/payroll-letters') || request()->is('admin/payroll-letters/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-address-card">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.payrollLetter.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('services_fee_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.services-fees.index") }}" class="nav-link {{ request()->is('admin/services-fees') || request()->is('admin/services-fees/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.servicesFee.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is('admin/system-calendar') || request()->is('admin/system-calendar/*') ? 'active' : '' }}">
                        <i class="fas fa-fw fa-calendar">

                        </i>
                        <p>
                            <span>{{ trans('global.systemCalendar') }}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
