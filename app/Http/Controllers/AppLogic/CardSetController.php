<?php

namespace Carsdy\Http\Controllers\AppLogic;

use Carsdy\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carsdy\Card;
use Carsdy\CardSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;


class CardSetController extends Controller
{

    public function processForm(Request $request){
        $data = $request->only('cards', 'title', 'description', 'access');
        $cards = $request->only('cards'); // Get all the card info

        $setValidator = $this->setValidator($data);
        $cardValidator = $this->cardValidator($cards);

        if($setValidator->fails() || $cardValidator->fails()){
            $errors = $setValidator->messages()->merge($cardValidator->messages());
            return back()->withInput($request->all)->withErrors($errors);
        }

        // Create card set and grab its id for use on the cards
        $cset_id = $this->createCardSet($data)->id;


        foreach ($cards as $card){
            // Create the card
            $this->createCard(array_values($card)[0], $cset_id);
        }

        return redirect('/home');
    }

    public function viewSet(Request $request){
        $user_id = $request->id;
        $set_id = $request->set_id;

        $card_set = DB::table('card_sets')->where('user_id', $user_id)->where('id', $set_id)->get();
        $cards = DB::table('cards')->where('cset_id', $set_id)->get();

        return view('view_set')->with([
            'card_set' => $card_set,
            'cards' => $cards
            ]);   

    }


    protected function setValidator(array $data)
    {
        $rules =  [
            'cards' => 'required|array|min:1',
            'title' => 'required|max:50',
            'description' => 'nullable|alpha_dash|string|max:300',
            'access' => 'required|string',
        ];

        $messages = [
            'cards.required' => "You can't have an empty set!"
        ];

        return Validator::make($data, $rules, $messages);
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

    protected function cardValidator(array $data)
    {
        $rules =  [
            'cards.*.front' => 'required|alphaNum|max:100',
            'cards.*.back' => 'required|alphaNum|max:100',
        ];

        $messages = [
            'cards.*.front.required' => 'Front side is required.',
            'cards.*.back.required' => 'Back side is required.'
        ];

        return Validator::make($data, $rules, $messages);
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