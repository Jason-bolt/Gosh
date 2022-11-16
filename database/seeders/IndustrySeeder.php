<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            [
                'industry' => 'All Industries'
            ],
            [
                'industry' => 'Food services'
            ],
            [
                'industry' => 'Advertisement, media and communication'
            ],
            [
                'industry' => 'Entertainment, events and sports'
            ],
            [
                'industry' => 'Healthcare'
            ],
            [
                'industry' => 'Hospitality, hostel and hotel'
            ],
            [
                'industry' => 'IT and telecoms'
            ],
            [
                'industry' => 'Retail, fashion and FMCG'
            ],
            [
                'industry' => 'Education'
            ],
            [
                'industry' => 'Writing and translation'
            ],
    ]);
    }
}
