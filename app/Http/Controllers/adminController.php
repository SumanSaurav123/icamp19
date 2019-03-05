<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    ##########################################################
    #        FUNCTION FOR PASSING VIEW TO DASHBOARD PAGE
    ##########################################################
    function showLandingPage() {
        return view('icamp19.inc.landingPage');
    }
}
