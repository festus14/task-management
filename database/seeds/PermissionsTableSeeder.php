<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
//            [
//            'id'         => '1',
//            'title'      => 'user_management_access',
//            'created_at' => '2019-07-09 13:06:13',
//            'updated_at' => '2019-07-09 13:06:13',
//        ],
//            [
//                'id'         => '2',
//                'title'      => 'permission_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '3',
//                'title'      => 'permission_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '4',
//                'title'      => 'permission_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '5',
//                'title'      => 'permission_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '6',
//                'title'      => 'permission_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '7',
//                'title'      => 'role_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '8',
//                'title'      => 'role_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '9',
//                'title'      => 'role_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '10',
//                'title'      => 'role_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '11',
//                'title'      => 'role_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '12',
//                'title'      => 'user_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '13',
//                'title'      => 'user_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '14',
//                'title'      => 'user_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '15',
//                'title'      => 'user_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '16',
//                'title'      => 'user_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '17',
//                'title'      => 'audit_log_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '18',
//                'title'      => 'audit_log_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '19',
//                'title'      => 'project_management_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '20',
//                'title'      => 'client_management_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '21',
//                'title'      => 'project_type_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '22',
//                'title'      => 'project_type_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '23',
//                'title'      => 'project_type_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '24',
//                'title'      => 'project_type_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '25',
//                'title'      => 'project_type_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '26',
//                'title'      => 'project_sub_type_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '27',
//                'title'      => 'project_sub_type_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '28',
//                'title'      => 'project_sub_type_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '29',
//                'title'      => 'project_sub_type_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '30',
//                'title'      => 'project_sub_type_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '31',
//                'title'      => 'task_management_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '32',
//                'title'      => 'document_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '33',
//                'title'      => 'document_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '34',
//                'title'      => 'document_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '35',
//                'title'      => 'document_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '36',
//                'title'      => 'document_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '37',
//                'title'      => 'client_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '38',
//                'title'      => 'client_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '39',
//                'title'      => 'client_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '40',
//                'title'      => 'client_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '41',
//                'title'      => 'client_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '42',
//                'title'      => 'project_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '43',
//                'title'      => 'project_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '44',
//                'title'      => 'project_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '45',
//                'title'      => 'project_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '46',
//                'title'      => 'project_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '47',
//                'title'      => 'project_comment_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '48',
//                'title'      => 'project_comment_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '49',
//                'title'      => 'project_comment_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '50',
//                'title'      => 'project_comment_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '51',
//                'title'      => 'project_comment_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '52',
//                'title'      => 'tast_category_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '53',
//                'title'      => 'tast_category_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '54',
//                'title'      => 'tast_category_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '55',
//                'title'      => 'tast_category_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '56',
//                'title'      => 'tast_category_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '57',
//                'title'      => 'client_portal_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '58',
//                'title'      => 'task_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '59',
//                'title'      => 'task_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '60',
//                'title'      => 'task_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '61',
//                'title'      => 'task_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '62',
//                'title'      => 'task_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '63',
//                'title'      => 'task_status_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '64',
//                'title'      => 'task_status_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '65',
//                'title'      => 'task_status_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '66',
//                'title'      => 'task_status_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '67',
//                'title'      => 'task_status_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '68',
//                'title'      => 'task_comment_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '69',
//                'title'      => 'task_comment_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '70',
//                'title'      => 'task_comment_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '71',
//                'title'      => 'task_comment_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '72',
//                'title'      => 'task_comment_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '73',
//                'title'      => 'task_comment_reply_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '74',
//                'title'      => 'task_comment_reply_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '75',
//                'title'      => 'task_comment_reply_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '76',
//                'title'      => 'task_comment_reply_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '77',
//                'title'      => 'task_comment_reply_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '78',
//                'title'      => 'task_portal_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '79',
//                'title'      => 'task_document_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '80',
//                'title'      => 'task_document_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '81',
//                'title'      => 'task_document_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '82',
//                'title'      => 'task_document_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '83',
//                'title'      => 'task_document_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '84',
//                'title'      => 'project_report_create',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '85',
//                'title'      => 'project_report_edit',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '86',
//                'title'      => 'project_report_show',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '87',
//                'title'      => 'project_report_delete',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
//            [
//                'id'         => '88',
//                'title'      => 'project_report_access',
//                'created_at' => '2019-07-09 13:06:13',
//                'updated_at' => '2019-07-09 13:06:13',
//            ],
            [
                'id'         => '89',
                'title'      => 'letter_mgt_access',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '90',
                'title'      => 'letter_type_create',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '91',
                'title'      => 'letter_type_edit',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '92',
                'title'      => 'letter_type_show',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '93',
                'title'      => 'letter_type_delete',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '94',
                'title'      => 'letter_type_access',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '95',
                'title'      => 'payroll_letter_create',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '96',
                'title'      => 'payroll_letter_edit',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '97',
                'title'      => 'payroll_letter_show',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '98',
                'title'      => 'payroll_letter_delete',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '99',
                'title'      => 'payroll_letter_access',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '100',
                'title'      => 'services_fee_create',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '101',
                'title'      => 'services_fee_edit',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '102',
                'title'      => 'services_fee_show',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '103',
                'title'      => 'services_fee_delete',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
            [
                'id'         => '104',
                'title'      => 'services_fee_access',
                'created_at' => '2019-10-10 13:31:52',
                'updated_at' => '2019-10-10 13:31:52',
            ],
        ];

        Permission::insert($permissions);
    }
}
