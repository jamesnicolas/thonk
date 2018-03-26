<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thonk;

class ThonkController extends Controller
{
    public function index()
    {
        return Thonk::all();
    }

    public function show(Thonk $thonk)
    {	
        return $thonk;
    }

    public function store(Request $request)
    {
        $thonk = Thonk::create($request->all());

        return response()->json($thonk, 201);
    }

    public function update(Request $request, Thonk $thonk)
    {
        $thonk->update($request->all());

        return response()->json($thonk, 200);
    }

    public function delete(Thonk $thonk)
    {
        $thonk->delete();

        return response()->json(null, 204);
    }
} 
