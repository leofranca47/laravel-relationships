<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
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

    public function oneToOneInverse()
    {
        $location = Location::with('country')->whereLatitude('123')->first();
        echo $location->country->name;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name' => 'Angola',
            'latitude' => '894',
            'longitude' => '498'
        ];

        $country = Country::create($dataForm);

        $location = $country->location()->create($dataForm);
    }
}
