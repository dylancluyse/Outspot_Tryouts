<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller{

    public function getCookie(Request $request){
        $value = $request->cookie('name');
        return $value;
     }

}

?>