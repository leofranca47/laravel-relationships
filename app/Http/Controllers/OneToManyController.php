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

    public function onToManyInsert()
    {
        $dataForm = [
            'name' => 'espirito santo',
            'initial' => 'ES',
        ];

        $country = Country::find(1);

        $state = $country->states()->create($dataForm);

        echo $state;
    }

    public function hasmanyThrough()
    {
        $country = Country::find(1);
        echo "<b>{$country->name}:</b><br>";

        $cities = $country->cities;

        foreach ($cities as $city) {
            echo $city->name .", ";
        }
    }
}
