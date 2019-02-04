<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carsdy\Card;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->delete();
        Card::create([
            'cset_id' => 1,
            'front' => 'lass uns anfangen',
            'back' => "let's begin",
            'alt' => '',
            'comment' => 'simple phrase'
        ]);

        Card::create([
            'cset_id' => 1,
            'front' => 'bis zum nächsten mal',
            'back' => "till next time",
            'alt' => '',
            'comment' => 'simple phrase'
        ]);
    }
}
