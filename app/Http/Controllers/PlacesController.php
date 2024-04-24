<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Http\Resources\Place as PlaceResource;

class PlacesController extends Controller
{
    public function places(Request $request)
    {
        $places = Place::all();

        $geoJSONdata = $places->map(function ($item) {
            return [
                'type'       => 'Feature',
                'properties' => new PlaceResource($item),
                'geometry'   => [
                    'type'        => 'Point',
                    'coordinates' => [
                        $item->longitude,
                        $item->latitude,
                    ],
                ],
            ];
        });

        return response()->json([
            'type'     => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }
}
