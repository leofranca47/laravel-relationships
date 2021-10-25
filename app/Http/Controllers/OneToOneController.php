<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        $country = Country::with('location')->whereId('1')->first();
        echo $country->name . " <br>";
        echo $country->location->latitude. " <br>";
        echo $country->location->longitude. " <br>";

    }
}
