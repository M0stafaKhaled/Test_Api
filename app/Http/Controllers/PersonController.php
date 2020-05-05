<?php

namespace App\Http\Controllers;

use App\Http\Resources\PersonRescource;
use App\Http\Resources\PersonRescourceCollection;
use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function show(Person $person): PersonRescource
    {

        return new PersonRescource($person);
    }
    public function index(): PersonRescourceCollection
    {

        return new PersonRescourceCollection(Person::paginate());
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'city' => 'required',

        ]);
        $person = Person::create($request->all());
        return new PersonRescource($person);
    }
}
