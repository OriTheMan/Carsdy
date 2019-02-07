<?php

namespace Carsdy\Http\Controllers\AppLogic;

use Carsdy\Http\Controllers\Controller;
use Carsdy\Card;
use Carsdy\CardSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CardSetController extends Controller
{

    public function processForm(Request $request){
        $data = $request->only('title', 'description', 'access');

        // Create card set and grab its id for use on the cards
        $cset_id = $this->createCardSet($data)->id;

        // Get all the card info
        $cards = $request->only('cards');

        foreach ($cards as $card){
            // Create the card
            $this->createCard(array_values($card)[0], $cset_id);
        }

        return redirect('/home');
    }



    /**
     * Create a new CardSet instance
     *
     * @param  array  $data
     * @return \Carsdy\CardSet
     */
    protected function createCardSet(array $data)
    {
        return CardSet::create([
            'user_id' => Auth::user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'access' => $data['access']
        ]);
    }
    
    /**
     * Create a new Card instance
     *
     * @param  array  $data
     * @return \Carsdy\Card
     */
    protected function createCard(array $data, int $cset_id)
    {
        return Card::create([
            'cset_id' => $cset_id,
            'front' => $data['front'],
            'back' => $data['back'],
            'alt' => $data['alt'],
            'comment' => $data['comment']
        ]);
    }
}