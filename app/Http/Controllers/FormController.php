<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FormController extends Controller
{

    /*
    Formulier aanmaken
    */
    public function create(){
        return view('pages.form');
    }

    /*
    Het meegegeven bedrag controleren. De waarde in de tekstbox moet voldoen aan volgende regels:
    * Het moet een numerieke waarde zijn.
    * De waarde moet tussen 10 en 100 liggen.
    */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'price' => 'required|numeric|min:10|max:100',
        ]);
        
        \App\Form::create($validatedData);

        $mollie = new MollieController();
        $mollie->nieuweBetaling();
    }
}
