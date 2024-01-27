<?php

namespace App\Http\Controllers;

use App\Http\Resources\DestinationResource;
use App\Models\Destination;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class DestinationController extends Controller
{
    //

    public function index()
    {

        $destinations = Destination::all();


        return DestinationResource::collection($destinations);
    }

    public function show($id)
    {
        $destination = Destination::with('images:imageId,fileName,filePath')->where('destinationId', $id)->first();
        if (!$destination) {
            return \abort(404);
        }
        return new DestinationResource($destination);
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            "destinationName" => "required",
            "description" => "required",
            "location" => "required"
        ]);

        if ($request->file('image')) {
            dd($request->file());
        }

        dd($validated);

        $destination = Destination::create($request->all());

        return new DestinationResource([
            "message" => "Berhasil Menambahkan Data!",
            "data" => $destination
        ]);
    }


    public function update(Request $request, $id)
    {


        $dataDestination = Destination::findOrFail($id);
        if (!$dataDestination) {
            return abort(404);
        }

        $dataDestination->update($request->all());

        return new DestinationResource([
            "message" => "Berhasil Update!",
            "data" => $dataDestination
        ]);
    }

    public function destroy($id)
    {
        $dataDestination = Destination::findOrFail($id);
        if (!$dataDestination) {
            return abort(404);
        }
        $dataBefore = $dataDestination;
        $dataDestination->delete();
        return response()->json([
            "message" => "Data Berhasil DiHapus",
            "dataYangTerhapus" => $dataBefore
        ]);
    }

    public function query($query)
    {
        $destination = Destination::where('destinationName', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->orWhere('location', 'like', '%' . $query . '%')
            ->get();

        return DestinationResource::collection($destination);
    }
}
