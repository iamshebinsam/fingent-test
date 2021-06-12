<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TermSeeder extends Seeder
{
    public function run()
    {
        DB::table('terms')->insert(
            [
                [
                    'name' => 'Term 1',
                ],
                [
                    'name' => 'Term 2',
                ],
                [
                    'name' => 'Term 3',
                ],
            ]
        );
    }
}
