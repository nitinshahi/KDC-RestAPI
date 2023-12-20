<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $menu = Menu::all();
        return response()->json([
            'status' => 200,
            'message' => $menu
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        try {
            //code...
            $imageName = time().$request->image->getClientOriginalName();
            //store image in storage
            $request->image->storeAs('public/uploads',$imageName);
            // Storage::disk('public')->put($imageName, file_get_contents($request->image));

            Menu::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imageName,
                'cook_time' => $request->cook_time,
                'populatiy' => $request->populatiy
            ]);
            

            return response()->json([
                'status' => 200,
                'message' => 'Menu Added Sucessfully!'
            ],200);

        } catch (\Exception $e) {
            //Return Json Response
            return response()->json([
                'status' => 500,
                'messge' => "Something Went Wrong"
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return response()->json([
                'message' => 'Item not found!!'
            ],404);
        }
        
        return response()->json([
                'message' => $menu
            ],200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
