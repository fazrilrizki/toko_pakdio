<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'id' => 1,
            'username' => 'fazril123',
            'name' => 'Fazril Rizki',
            'email' => 'fazrilrizkitantoadji@gmail.com',
            'password' => bcrypt('fazril123')
        ];
        User::create($data);
    }
}
