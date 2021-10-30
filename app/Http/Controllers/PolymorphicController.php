<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;

class PolymorphicController extends Controller
{
    public function polymorphic()
    {
        $city = City::with('comments')->whereId(1)->first();

        foreach ($city->comments as $comment) {
            echo $comment->description .'<br>';
        }

        $company = Company::with('comments')->whereId(1)->first();

        foreach ($company->comments as $comment) {
            echo $comment->description .'<br>';
        }

    }

    public function polymorphicInsert()
    {
        // $city = City::find(1);

        // $comment = $city->comments()->create([
        //     'description' => "{$city->name} é uma cidade maravilhosa ".date('YmdHis')
        // ]);
        // echo $comment->description;

        // $country = Country::find(1);

        // $comment = $country->comments()->create([
        //     'description' => "{$country->name} é um país maravilhoso ".date('YmdHis')
        // ]);
        // echo $comment->description;

        $company = Company::find(1);

        $comment = $company->comments()->create([
            'description' => "{$company->name} é uma empresa maravilhosa ".date('YmdHis')
        ]);
        echo $comment->description;
    }
}
