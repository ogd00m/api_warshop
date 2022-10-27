<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeasonRequest;
use App\Models\Season;

class SeasonController extends Controller
{
    public function index()
    {
        $season = Season::all();

        return response()->json([
            'seasons' => $season
        ]);
    }


    public function create()
    {
        //
    }


    public function store(SeasonRequest $request)
    {
        $season = Season::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'season added',
            'season' => $season,
        ], 200);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(SeasonRequest $request, Season $season)
    {
        $season->update($request->all());

        return response()->json([
            'message' => 'season updated',
            'season' => $season,
        ]);
    }



    public function destroy(Season $season)
    {
        $season->delete();
        return response()->json([
            'message' => 'season deleted',
            'season' => $season,
        ]);
    }
}
