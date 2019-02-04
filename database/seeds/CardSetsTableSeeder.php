<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Carsdy\CardSet;

class CardSetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('card_sets')->delete();
        CardSet::create([
            'user_id' => 1,
            'title' => 'german lesson coffe break',
            'description' => 'some words i deemed important when listening to the podcast',
            'access' => 'public'
        ]);

    }
}
