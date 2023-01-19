<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Http\Requests\StorePersonRequest;
use App\Http\Requests\UpdatePersonRequest;

class PersonController extends Controller
{

    public function index()
    {
        $person = Person::all();
        return response()->json($person);
    }

    public function store(StorePersonRequest $request)
    {
        $data = $request->validated();
        $person = Person::create($data);
        return response()->json($person);
    }

    public function show(Person $person)
    {
        return response()->json($person);
    }

    public function update(UpdatePersonRequest $request, Person $person)
    {
        $data = $request->validated();
        $person->update($data);
        return response()->json($person);
    }

    public function destroy(Person $person)
    {
        $person->delete();
        response()->noContent();
    }
}
