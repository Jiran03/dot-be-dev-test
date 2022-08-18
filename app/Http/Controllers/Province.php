<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province as ProvinceModel;
use App\Http\Resources\Province as ProvinceResource;

class Province extends Controller
{
    public function index()
    {
        $data = ProvinceModel::latest()->get();
        return response()->json([ProvinceResource::collection($data), 'Programs fetched.']);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $city = ProvinceModel::where('province_id', $id)->first();
        if (is_null($city)) {
            return response()->json(new ProvinceResource($city));
        }
        return response()->json(new ProvinceResource($city));
    }
}
