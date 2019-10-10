<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeederUpdate extends Seeder
{
    public function run()
    {
        $permissions = [
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
