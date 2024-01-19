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
        $perPage = 10;
        $destinations = Destination::paginate($perPage);

        if (count($destinations->items()) == 0) {
            return response()->json(['error' => 'Data not found'], 404);
        }

        $destinations->loadMissing(['images:imageId,fileName,filePath']);

        return response()->json([
            'data' => $destinations
        ]);
    }

    public function show($id){
        $destination = Destination::with('images:imageId,fileName,filePath')->where('destinationId', $id)->first();
        if(!$destination) {
            return \abort(404);
        }
        return new DestinationResource($destination->loadMissing(['images:imageId,fileName,filePath']));
    }



}
