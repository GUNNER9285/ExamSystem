<?php

use Illuminate\Database\Seeder;

class ExamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exams')->insert([
            'question'     => '1+1 = ?',
            'answer'    => '2',
            'score' => 5
            ]);
        DB::table('exams')->insert([
                'question'     => '2+2 = ?',
                'answer'    => '4',
                'score' => 5
            ]);
        DB::table('exams')->insert([
                'question'     => '3*3 = ?',
                'answer'    => '9',
                'score' => 10
            ]);
        DB::table('exams')->insert([
                'question'     => '10/2 = ?',
                'answer'    => '5',
                'score' => 15
            ]);
        DB::table('exams')->insert([
                'question'     => '5*10 = ?',
                'answer'    => '50',
                'score' => 15
            ]);
        DB::table('exams')->insert([
                'question'     => '1+1*0 = ?',
                'answer'    => '1',
                'score' => 20
            ]);

    }
}
