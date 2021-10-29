<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use Illuminate\Http\Request;

class ManyToManyController extends Controller
{
    public function manyToMany()
    {
        $city = City::with('companies')->whereId(1)->first();
        echo $city->name.'<br>';
        foreach ($city->companies as $company) {
            echo $company->name .'<br>';
        }
    }

    public function manyToManyInverse()
    {
        $company = Company::with('cities')->whereId(1)->first();
        echo $company->name .'<br>';

        foreach ($company->cities as $city) {
            echo $city->name .'<br>';
        }

    }

    public function manyToManyInsert()
    {
        $company = Company::whereId(1)->first();
        echo $company->name .'<br>';

        // insere sempre que passar mesmo que já exista
        // $company->cities()->attach([1,2,3]);
        // sync sincroniza os dados passados
        $company->cities()->sync([1,2,3]);
        // apaga os dados
        // $company->cities()->detach([1,2,3]);

        foreach ($company->cities as $city) {
            echo $city->name .'<br>';
        }
    }
}
