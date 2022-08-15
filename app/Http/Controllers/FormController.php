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
    public function valideer($prijs)
    {
        return [
            'price' => 'numeric|min:10|max:100|boolean'
        ];


        /*
        Alternatieve manier met Request.

        $validatedData = $request->validate([
            'price' => 'required|numeric|min:10|max:100',
        ]);

        \App\Form::create($validatedData);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator)->withInput();
        */
    }



    /*
    De waarde wordt vooraf gevalideerd met behulp van de valideer-functie. 
    Als de waarde gepast is zal er een mollie-object aangemaakt worden om de betaling op te starten.
    Als de waarde niet gepast is wordt de gebruiker terug naar de index-pagina gestuurd.
    */
    public function store($prijs)
    {

        if ($this->valideer($prijs)){
            $mollie = new MollieController();
            $mollie->nieuweBetaling();
        } else {
            header('');
        }
        
    }

}