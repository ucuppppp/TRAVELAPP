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
            "location" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        // Cek apakah gambar diunggah
        if ($request->file('image')) {
            // Generate nama unik untuk file gambar
            $imageName = time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

            // Simpan gambar ke dalam storage
            $imagePath = $request->file('image')->storeAs('destination-img', $imageName, 'public');

            // Set URL gambar lengkap
            $validated['image'] = url("storage/{$imagePath}");
        }

        // Periksa apakah destinasi sudah ada
        $existingDestination = Destination::where('destinationName', $request->input('destinationName'))->first();

        if ($existingDestination) {
            return response()->json([
                "message" => "Data destinasi sudah ada!"
            ]);
        }

        // Buat destinasi baru
        $destination = Destination::create($validated);

        return response()->json([
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
