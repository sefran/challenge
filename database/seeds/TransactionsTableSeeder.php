<?php

use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//TODO read from csv
        DB::table('transactions')->insert([
        	'customer_id' => 1,
            'date' => "2015-04-01",
            'value' => "£50.00"
        ]);

        DB::table('transactions')->insert([
        	'customer_id' => 2,
            'date' => "2015-04-01",
            'value' => "$66.10"
        ]);

        DB::table('transactions')->insert([
        	'customer_id' => 2,
            'date' => "2015-04-02",
            'value' => "€12.00"
        ]);

        DB::table('transactions')->insert([
        	'customer_id' => 2,
            'date' => "2015-04-02",
            'value' => "£6.50"
        ]);

		DB::table('transactions')->insert([
        	'customer_id' => 1,
            'date' => "2015-04-02",
            'value' => "£11.04"
        ]);

        DB::table('transactions')->insert([
        	'customer_id' => 1,
            'date' => "2015-04-02",
            'value' => "€1.00"
        ]);

        DB::table('transactions')->insert([
        	'customer_id' => 1,
            'date' => "2015-04-03",
            'value' => "$23.05"
        ]);

        DB::table('transactions')->insert([
        	'customer_id' => 2,
            'date' => "2015-04-04",
            'value' => "€6.50"
        ]);

    }
}
