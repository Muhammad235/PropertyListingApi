<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Routing\Controller;
use App\Http\Resources\PropertiesResource;
use App\Http\Requests\StorePropertyRequest;

class PropertiesController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return PropertiesResource::collection(Property::all());
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $request->validated();

        $property = Property::create([
            'broker_id' => $request->broker_id,
            'address' => $request->address,
            'listing_type' => $request->listing_type,
            'city' => $request->city,
            'zip_code' => $request->zip_code,
            'description' => $request->description,
            'build_year' => $request->build_year
        ]);

        $property->characteristic()->create([
            'property_id' => $property->id,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'sqrt' => $request->sqrt,
            'price_sqrt' => $request->price_sqrt,
            'property_type' => $request->property_type,
            'status' => $request->status
        ]);

       $newProperty = new PropertiesResource($property);

        return $this->success([
            "property details" => $newProperty,
          ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
