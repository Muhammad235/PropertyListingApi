<?php

namespace App\Http\Controllers;

use App\Models\Brokers;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use Illuminate\Routing\Controller;
use App\Http\Resources\BrokersResource;
use App\Http\Requests\StoreBrokersRequest;

class BrokersController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Brokers::all();
        $brokers = BrokersResource::collection(Brokers::all());

        return $this->success([
            "brokers" => $brokers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrokersRequest $request)
    {
        $request->validated();

        $broker = Brokers::create([
            'name' => $request->name,
            'address' => $request->address,
            'city' => $request->city,
            'zip_code' => $request->name,
            'phone_number' => $request->zip_code,
            'logo_path' => $request->logo_path

        ]);

        return new BrokersResource($broker);

    }

    /**
     * Display the specified resource.
     */
    public function show(Brokers $broker)
    {
        $broker = new BrokersResource($broker);

        return $this->success([
            "broker" => $broker,
          ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brokers $broker)
    {
       $updateBroker =  $broker->update($request->only([
             'name', 'address', 'city', 'zip_code', 'phone_number', 'logo_path'
        ]));

        if ($updateBroker) {
            return new BrokersResource($broker);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brokers $broker)
    {
        $broker->delete();

       return $this->success([
            "message" => "Broker deleted successfully"
        ]);
    }
}
