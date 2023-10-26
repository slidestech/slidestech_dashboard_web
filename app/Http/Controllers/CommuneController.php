<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommuneStoreRequest;
use App\Models\Commune;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.communes_list');
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
    public function store(CommuneStoreRequest $request)
    {
        $validated = $request->validated();

        $commune = new Commune();
        $commune->name = $request->name;
        $commune->code = $request->code;

        $commune->save();

        // return compact('validated');
        return response()->json([
            'success' => 'Information added with success',
            'commune' => $commune
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
       
        $commune = Commune::findOrFail($id);
        $commune->name = $request->name;
        $commune->code = $request->code;

        $commune->save();

        return response()->json([
            'success' => 'State updated with success',
            'commune' => $commune
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
        
        $commune = Commune::where('id', '=', $id);
        $commune->delete();
        return response()->json(['success' => 'The commune has been deleted']);
    }
    
    public function getCommunes()
    {
        $communes = Commune::all();
        return compact('communes');
    }
}
