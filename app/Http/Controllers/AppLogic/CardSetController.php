<?php

namespace Carsdy\Http\Controllers\AppLogic;

use Carsdy\Http\Controllers\Controller;

class CardSetController extends Controller
{


    public function showForm(){
        return View('create_set');
    }

    
}