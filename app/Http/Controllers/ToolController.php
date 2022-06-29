<?php

namespace App\Http\Controllers;

use App\Models\Tools;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    
    public function index()
    {
        $tools=Tools::all();
        return response()->json(["tools"=>$tools],201);
    }

    
    public function store(Request $request)
    {
       
        //401 gérée par SANCTUM

        //Validation 422 si erreur
        $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'categories' => 'required',
            'photo' => 'required'
        ]);

        $tool = Tools::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'categories' => $request->categories,
            'photo' => $request->photo,
            'user_id' => $request->user_id,

        ]);

        return response()->json([
            'id' => $tool->id,
            'created_at' => $tool->created_at,
            'updated_at' => $tool->updated_at,
            'name' => $tool->name,
            'description' => $tool->description,
            'price' => $tool->price,
            'photo' => $tool->photo,
            'user' => [
                'id' => $request->user()->id,
                'created_at' => $request->user()->created_at,
                'updated_at' => $request->user()->updated_at,
                'username' => $request->user()->username,
            ]
        ], 201);

    
    }

   
    public function show($id)
    {
        
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        
    }
}
