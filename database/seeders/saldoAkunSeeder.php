<?php

namespace Database\Seeders;

use App\Models\saldoUser;
use Illuminate\Database\Seeder;

class saldoAkunSeeder extends Seeder
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
            'user_id' =>1,
            'saldo_elektronik' => 100000
        ];
        saldoUser::create($data);
    }
}
