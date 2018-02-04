<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BrewerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breweries')->insert([
            [
                'id'              => 1,
                'name'            => 'Anheuser-Busch InBev',
                'description'     => 'Based in Leuven, Belgium, Anheuser-Busch InBev (AB InBev) is a leading global brewer and one of the world’s top five consumer products companies. Some of its global beer brands include Budweiser, Corona, and Stella Artois. Beck’s, Leffe, and Hoegaarden are its popular international brands.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'id'              => 2,
                'name'            => 'SABMiller',
                'description'     => 'SABMiller is a London-based beverage manufacturing company that offers beers and cold drinks. Its extensive portfolio of brands includes premium international beers such as Pilsner Urquell, Peroni Nastro Azzurro, Miller Genuine Draft and Grolsch, as well as leading local brands such as Aguila (Colombia), Castle (South Africa), Miller Lite (USA), Snow (China), Victoria Bitter (Australia), and Tyskie (Poland).',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'id'              => 3,
                'name'            => 'Heineken',
                'description'     => 'Founded in 1864, Heineken offers beer, soft drinks, cider, and other beverages. With its headquarters in Amsterdam, Netherlands, the company is primarily engaged in the brewing and selling of beer all over the world. Apart from Heineken, Amstel, Sol and Desperados are its other popular brands.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'id'              => 4,
                'name'            => 'Carlsberg Group',
                'description'     => 'The fourth largest global brewer, Carlsberg Group has its headquarters in Copenhagen, Denmark. The company’s brand portfolio is classified in terms of types and flavors. Its flagship brand is Carlsberg Beer. Today Carlsberg Group is the leading beer seller in Russia, with 40% of the market share.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
        ]);
    }
}
