<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beer_types')->insert([
            [
                'id'              => 1,
//                'name'            => 'Anheuser-Busch InBev',
                'name'            => 'pale lager',// Budweiser,Corona,Miller Lite, Amstel
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'id'              => 2,
                'name'            => 'pilsner', //Stella Artois,
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'id'              => 3,
                'name'            => 'Dark Lager',//Jacobsen Original
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
        ]);
    }
}
