<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createPermissions();
        $this->createRoles();
    }

    private function createPermissions()
    {
        $array = Permission::defaultPermissions();

        $percorrerArray = function ($array) use (&$percorrerArray) {
            foreach ($array as $value) {
                if (is_array($value) && !array_key_exists('name', $value)) {
                    $percorrerArray($value);
                }
                if (is_array($value) && array_key_exists('name', $value)) {
                    Permission::updateOrCreate(
                        ['name' => $value["name"]],
                        $value
                    );
                }
            }
        };

        $percorrerArray($array);

        $this->command->info('Default Permissions added.');
    }

    private function createRoles()
    {

        $admin = Role::firstOrCreate(
            ['name' => 'administrador'],
            ['description' => 'Administrador']
        );

        $admin->permissions()->sync(Permission::all());

        $this->command->info('Admin will have full rights');
    }
}
