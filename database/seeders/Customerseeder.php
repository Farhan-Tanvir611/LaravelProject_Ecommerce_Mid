<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Customerseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($x = 0; $x <= 3; $x++){
        DB::table('customers')->insert([
            'C_name'=>Str::random(5),
            'C_email'=>Str::random(5).'@gmail.com',
            'C_phone'=>Str::random(5),
            'C_address'=>Str::random(5),
            'C_password'=>Str::random(5),
        ]);
     }
    }
}
