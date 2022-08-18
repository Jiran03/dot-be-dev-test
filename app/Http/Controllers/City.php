<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City as CityModel;
use App\Http\Resources\City as CityResource;

class City extends Controller
{
    public function index()
    {
        $data = CityModel::latest()->get();
        return response()->json([CityResource::collection($data), 'Programs fetched.']);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $city = CityModel::where('city_id', $id)->first();
        if (is_null($city)) {
            return response()->json(new CityResource($city));
        }
        return response()->json(new CityResource($city));
    }
}
