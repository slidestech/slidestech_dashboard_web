<?php

namespace App\Http\Controllers;

use App\Models\StructureType;
use Illuminate\Http\Request;

class StructureTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.structuretypes_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $structuretype = new StructureType();
        $structuretype->name = $request->name;

        $structuretype->save();

        // return compact('validated');
        return response()->json([
            'success' => 'Information added with success',
            'structuretype' => $structuretype
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $structuretype = StructureType::findOrFail($id);
        $structuretype->name = $request->name;

        $structuretype->save();

        return response()->json([
            'success' => 'Structure updated with success',
            'structuretype' => $structuretype
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $structuretype = StructureType::where('id', '=', $id);
        $structuretype->delete();
        return response()->json(['success' => 'The structure type has been deleted']);
    }

    public function getTypes()
    {
        $structuretypes = StructureType::all();
        return compact('structuretypes');
    }
}
