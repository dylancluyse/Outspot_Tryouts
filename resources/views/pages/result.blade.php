@extends('layouts.app')

<?php
$id = PageController::getCookie();

if(if_null($id)){
    echo "Geen status gevonden.";
} else {
    echo MollieController::toonStatus($id);
}
    
?>