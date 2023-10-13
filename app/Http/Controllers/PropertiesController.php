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
             $newProperty,
          ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $allProperty = new PropertiesResource($property);

        return $this->success([
             $allProperty,
          ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        $property->update($request->only([
            'name', 'address', 'listing_type', 'city', 'zip_code', 'description', 'build_year'
       ]));

       $property->characteristic()->where('property_id', $property->id)->update($request->only(['property_id', 'price', 'bedrooms', 'bathrooms', 'sqrt', 'price_sqrt', 'property_type', 'status']));

       return $this->success([
        "message" => "property updated successfully"
       ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $id)
    {
        Property::delete();

       return $this->success([
        "message" => "Property deleted successfully"
    ]);
    }
}
