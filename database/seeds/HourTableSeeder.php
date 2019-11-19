<?php

use Illuminate\Database\Seeder;

class HourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('hours')->insert([
            'description' => '01:00 AM',
            'value' => '01:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '02:00 AM',
            'value' => '02:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '03:00 AM',
            'value' => '03:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '04:00 AM',
            'value' => '04:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '05:00 AM',
            'value' => '05:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '06:00 AM',
            'value' => '06:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '07:00 AM',
            'value' => '07:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '08:00 AM',
            'value' => '08:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '09:00 AM',
            'value' => '09:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '10:00 AM',
            'value' => '10:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '11:00 AM',
            'value' => '11:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '12:00 PM',
            'value' => '12:00:00',
            'status'      => true,
        ]);


        DB::table('hours')->insert([
            'description' => '1:00 PM',
            'value' => '13:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '2:00 PM',
            'value'       => '14:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '3:00 PM',
            'value' => '15:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '4:00 PM',
            'value' => '16:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '5:00 PM',
            'value' => '17:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '6:00 PM',
            'value'       => '18:00:00',
            'status'      => true,
        ]);

        DB::table('hours')->insert([
            'description' => '7:00 PM',
            'value'       => '19:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '8:00 PM',
            'value' => '20:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '9:00 PM',
            'value' => '21:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '10:00 PM',
            'value' => '22:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '11:00 PM',
            'value' => '23:00:00',
            'status'      => false,
        ]);

        DB::table('hours')->insert([
            'description' => '12:00 AM',
            'value' => '00:00:00',
            'status'      => false,
        ]);
    }
}
