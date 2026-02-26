<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'kasat'],
            ['name' => 'tu'],
            ['name' => 'pengawas']
        ];

        foreach ($roles as $each){
            Role::create([
                'name' => $each['name']
            ]);
        }
    }
}
