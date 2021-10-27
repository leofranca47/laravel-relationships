<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class OneToManyController extends Controller
{
    public function oneToMany(Country $countryModel)
    {
        $countries = $countryModel->with('states')->get();

        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";

            foreach ($country->states as $state) {
                echo "<br>{$state->initial} - {$state->name}";
            }
            echo "<hr>";
        }
    }

    public function manyToOne(State $stateModel)
    {
        $stateName = 'são paulo';
        $state = $stateModel->with('country')->whereName($stateName)->first();

        echo "<br>País: {$state->country->name}";
    }

    public function oneToManyTwo(Country $countryModel)
    {
        $countries = $countryModel->with('states')->get();

        foreach ($countries as $country) {
            echo "<b>{$country->name}</b>";

            foreach ($country->states as $state) {
                echo "<br>{$state->initial} - {$state->name}: ";
                foreach ($state->cities as $city) {
                    echo "<br>{$city->name}";
                }
            }
            echo "<hr>";
        }
    }
}
