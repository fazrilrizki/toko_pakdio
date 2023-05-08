<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     *     */
    public function run()
    {   
        $data = [
            'name' => 'Pak Dio',
            'username' => 'admin123',
            'password' => 'admin123'
        ];
        Admin::create($data);
    }
}
