<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MollieController extends Controller
{
    
    /*
    Mollie-object aanmaken via aparte functie.
    */
    public function initialize(){
        try{
            $mollie = new \Mollie\Api\MollieApiClient();
            $mollie->setApiKey("test_djMStRFvKuTbamgd6s9HzrJE2jPDTJ");
            return $mollie;
        } catch (Throwable $e){
            header();
            exit;
        }
    }

    /*
    @$prijs is de prijs uit het formulier.
    */
    public function nieuweBetaling($prijs){
        
        /*
        Nieuw Mollie-object om een betalingsobject aan te maken. 
        De meegegeven api-sleutel wordt ingesteld.
        */
        $mollie = $this->initialize();
        
        /*
        Betaling aanmaken met de prijs uit het formulier. De huidige tijd wordt bewaard als unieke waarde.
        */
        $orderid = time();
        $description = "Outspot Trial {$orderid}";

        try{
            $payment = $mollie->payments->create([
                "amount" => [
                    "currency" => "EUR",
                    "value" => "{$prijs}"
                ],
                "description" => $description,
                "redirectUrl" => "/order/{$orderid}/",
                "webhookUrl" => "/order/mollie-webhook/"
            ]);

            $this->setCookieOrderID($description);
    
            /*
            Gebruiker naar de checkout doorverwijzen.
            */
            header("Location: " . $payment->getCheckoutUrl(), true, 303);
        } catch (\Mollie\Api\Exceptions\ApiException $e) {
            echo "API call failed: " . htmlspecialchars($e->getMessage());
        }
    }

    /*
    Cookie bijhouden van de unieke omschrijving. Deze blijft maar twee uur geldig. 
    */
    public function setCookieOrderID($description){
        try{
            $minutes = 120;
            $response = new Response('Set Cookie');
            $response->withCookie(cookie('Payment ID', $description, $minutes));
            return $response;
        } catch (Throwable $e) {
            report($e);
        }
        
    }

    /*
    
    $description = de unieke waarde (vb.: Outspot Trial ...) van een bestelling
    
    De omschrijving van de betaling wordt opgeslaan nadat de betaling werd aangemaakt.
    Alle betalingen worden doorlopen en de betaling met de juiste omschrijving wordt behouden.
    Alternatieve methode: de nieuwste komt bovenaan dus eventueel moet enkel de eerste betaling aangesproken worden.
    */
    public function toonStatus($description){
        $mollie = $this->initialize();

        $betalingen = $mollie->payments->page();

        if (count($betalingen) === 0) {
            echo "Geen betalingen gevonden.";
        } else {
            foreach($betalingen as $betaling){
                if ($betaling->description == $description) {
                    echo "<h1>Status: " . htmlspecialchars($betaling->status) . "</h1>";
                  }
            }
        }
    }
}
