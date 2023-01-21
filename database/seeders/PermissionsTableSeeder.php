<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'user_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'user_create',
            ],
            [
                'id' => 13,
                'title' => 'user_edit',
            ],
            [
                'id' => 14,
                'title' => 'user_show',
            ],
            [
                'id' => 15,
                'title' => 'user_delete',
            ],
            [
                'id' => 16,
                'title' => 'user_access',
            ],
            [
                'id' => 17,
                'title' => 'product_create',
            ],
            [
                'id' => 18,
                'title' => 'product_edit',
            ],
            [
                'id' => 19,
                'title' => 'product_show',
            ],
            [
                'id' => 20,
                'title' => 'product_delete',
            ],
            [
                'id' => 21,
                'title' => 'product_access',
            ],
            [
                'id' => 22,
                'title' => 'customer_create',
            ],
            [
                'id' => 23,
                'title' => 'customer_edit',
            ],
            [
                'id' => 24,
                'title' => 'customer_delete',
            ],
            [
                'id' => 25,
                'title' => 'customer_access',
            ],
            [
                'id' => 26,
                'title' => 'invoice_create',
            ],
            [
                'id' => 27,
                'title' => 'invoice_edit',
            ],
            [
                'id' => 28,
                'title' => 'invoice_show',
            ],
            [
                'id' => 29,
                'title' => 'invoice_delete',
            ],
            [
                'id' => 30,
                'title' => 'invoice_access',
            ],
            [
                'id' => 31,
                'title' => 'payment_create',
            ],
            [
                'id' => 32,
                'title' => 'payment_edit',
            ],
            [
                'id' => 33,
                'title' => 'payment_show',
            ],
            [
                'id' => 34,
                'title' => 'payment_delete',
            ],
            [
                'id' => 35,
                'title' => 'payment_access',
            ],
            [
                'id' => 36,
                'title' => 'plan_create',
            ],
            [
                'id' => 37,
                'title' => 'plan_edit',
            ],
            [
                'id' => 38,
                'title' => 'plan_delete',
            ],
            [
                'id' => 39,
                'title' => 'plan_access',
            ],
            [
                'id' => 40,
                'title' => 'feature_create',
            ],
            [
                'id' => 41,
                'title' => 'feature_edit',
            ],
            [
                'id' => 42,
                'title' => 'feature_delete',
            ],
            [
                'id' => 43,
                'title' => 'feature_access',
            ],
            [
                'id' => 44,
                'title' => 'my_team_create',
            ],
            [
                'id' => 45,
                'title' => 'my_team_edit',
            ],
            [
                'id' => 46,
                'title' => 'my_team_show',
            ],
            [
                'id' => 47,
                'title' => 'my_team_delete',
            ],
            [
                'id' => 48,
                'title' => 'my_team_access',
            ],
            [
                'id' => 49,
                'title' => 'my_plan_create',
            ],
            [
                'id' => 50,
                'title' => 'my_plan_edit',
            ],
            [
                'id' => 51,
                'title' => 'my_plan_show',
            ],
            [
                'id' => 52,
                'title' => 'my_plan_delete',
            ],
            [
                'id' => 53,
                'title' => 'my_plan_access',
            ],
            [
                'id' => 54,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
