<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'branch-list',
            'branch-create',
            'branch-edit',
            'branch-delete',
            'branch-view',
            'branch-report',
            'booking-list',
            'booking-create',
            'booking-edit',
            'booking-delete',
            'booking-view',
            'booking-log',
            'pincode-list',
            'pincode-create',
            'pincode-edit',
            'pincode-delete',
            'pincode-view',
            'roles-list',
            'roles-create',
            'roles-edit',
            'roles-delete',
            'roles-view',
            'staff-list',
            'staff-create',
            'staff-edit',
            'staff-delete',
            'staff-view',
            'consigner-list',
            'consigner-create',
            'consigner-edit',
            'consigner-delete',
            'consigner-view',
            'consignee-list',
            'consignee-create',
            'consignee-edit',
            'consignee-delete',
            'consignee-view',
            'contact-list',
            'mainifestation-list',
            'mainifestation-create',
            'shipment_in_scan-list',
            'shipment_in_scan-create',
            'mainifestation-create',
            'delivery-list',
            'delivery_assign-list',
            'contact_us-list',
            'carrer-list',
            'frenchies-list',
            'user_log-list',
            'c_note-list',
            'c_note-create',
            'c_note-assign',
        ];


        foreach ($permissions as $permission) {
            $data = explode('-', $permission);

            $permissions = Permission::where('name', $permission)->first();
            if (!$permissions) {
                $permissions = new Permission;
            }
            $permissions->name = $permission;
            $permissions->parent_name = $data[0];
            $permissions->guard_name = 'admin';
            $permissions->save();
        }
    }
}
