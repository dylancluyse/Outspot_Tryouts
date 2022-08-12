<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MollieController extends Controller
{
    
    /*
    public function initialize(){
        $mollie = new \Mollie\Api\MollieApiClient();
        $mollie->setApiKey("test_djMStRFvKuTbamgd6s9HzrJE2jPDTJ");
        return $mollie;
    }
    */

    /*
    @$prijs is de prijs uit het formulier.
    */
    public function nieuweBetaling($prijs){
        
        /*
        Nieuw Mollie-object om een betalingsobject aan te maken. 
        De meegegeven api-sleutel wordt ingesteld.
        */
        try{
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey("test_djMStRFvKuTbamgd6s9HzrJE2jPDTJ");    
        } catch(Throwable $e) {
            header();
            exit;
        }

        /*
        Betaling aanmaken met de prijs uit het formulier.
        */
        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $prijs
            ],
            "description" => "Outspot Trial",
            "redirectUrl" => "/order/1234/"
        ]);

        /*
        Gebruiker naar de checkout doorverwijzen.
        */
        header("Location: " . $payment->getCheckoutUrl(), true, 303);
    }

    public function toonStatus(){

    }

}
