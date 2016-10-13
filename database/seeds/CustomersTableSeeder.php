<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'fullname' => "Francis Fuchsia"
        ]);

        DB::table('customers')->insert([
            'fullname' => "George Green"
        ]);
    }
}
