<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class BeerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('beers')->insert([
            [
                'brewery_id'      => 1,
                'type_id'         => 1,
                'name'            => 'Budweiser',
                'description'     => 'Budweiser (/bʌdˈwaɪzər/) is an American-style pale lager produced by Anheuser-Busch, currently part of the transnational corporation Anheuser-Busch InBev.[1] Introduced in 1876 by Carl Conrad & Co. of St. Louis, Missouri,[2] it has grown to become one of the largest selling beers in the United States, and is available in over 80 markets worldwide—though, due to a trademark dispute, not necessarily under the Budweiser name. It is made with up to 30% rice in addition to hops and barley malt.[3] Produced in various breweries around the world, Budweiser is a filtered beer available in draft and packaged forms.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'brewery_id'      => 1,
                'type_id'         => 1,
                'name'            => 'Corona',
                'description'     => 'Corona Extra is a pale lager produced by Cervecería Modelo in Mexico for domestic distribution and export to all other countries besides the United States, and by Constellation Brands in Mexico for export to the United States. The Corona brand is one of the top-selling beers worldwide.[2] Outside Mexico, Corona is commonly served with a wedge of lime or lemon in the neck of the bottle to add tartness and flavor.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'brewery_id'      => 2,
                'type_id'         => 1,
                'name'            => 'Miller Lite',
                'description'     => 'Miller Lite, also known simply as Lite, is an 4.2% ABV American light pale lager sold by MillerCoors of Milwaukee, Wisconsin,[2] United States.[1] Miller Lite competes with Anheuser-Busch\'s Bud Light beer. The company also produces Miller Genuine Draft and Miller High Life.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'brewery_id'      => 1,
                'type_id'         => 2,
                'name'            => 'Stella Artois',
                'description'     => 'Stella Artois (/ˈstɛlə ɑːrˈtwɑː/, stella-arr-TWAH) is a Belgian pilsner[1] of between 4.8 and 5.2% ABV which was first brewed by Brouwerij Artois (the Artois Brewery) in Leuven, Belgium, in 1926. Since 2008, a 4% ABV version is also sold in Britain, Ireland, Canada and New Zealand.[3] Stella Artois is now owned by Interbrew International B.V. which is a subsidiary of the world\'s largest brewer, Anheuser-Busch InBev SA/NV.[4]',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
            [
                'brewery_id'      => 3,
                'type_id'         => 3,
                'name'            => 'Jacobsen Original',
                'description'     => 'Jacobsen is an upscale brand of specialty beers owned by Carlsberg. Named after Carlsberg\'s founder, J.C. Jacobsen, it is housed in the original Carlsberg brewery in Valby in Copenhagen, Denmark and is currently headed by brewmaster Morten Ibsen.',
                'created_at'      => Carbon::now(),
                'updated_at'      => Carbon::now(),
            ],
        ]);
    }
}
