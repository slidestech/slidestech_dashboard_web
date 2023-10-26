<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\StateStoreRequest;
use App\Http\Requests\StateUpdateRequest;

class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:superadmin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.states_list');
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
    public function store(StateStoreRequest $request)
    {
        $validated = $request->validated();


        $state = new State();
        $state->name = $request->name;
        $state->code = $request->code;

        $state->save();

        // return compact('validated');
        return response()->json([
            'success' => 'Information added with success',
            'state' => $state
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
        // $validated = $request->validated();


        $state = State::with("communes")->findOrFail($id);
        $state->name = $request->name;
        $state->code = $request->code;

        $state->save();

        return response()->json([
            'success' => 'State updated with success',
            'state' => $state
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
        $state = State::where('id', '=', $id);
        $state->delete();
        return response()->json(['success' => 'The state has been deleted']);
    }

    public function getStates()
    {
        $states = State::with('communes')->get();
        return compact('states');
    }

    public function addCommunes(Request $request, $id)
    {

        $validated = $this->validate($request, [
            'communes' => 'required',
        ]);



        $state = State::where("id", "=", $id)->with("communes")->firstOrFail();


        $state->communes()->update(['state_id' => null]);
        $communes = $request->communes;
        $communes = Commune::find($communes);
        // $communes->update(['state_id' => $state->id]);
        for ($i = 0; $i < sizeof($communes); $i++) {
            // $state->communes->associate($communes);
            $communes[$i]->state_id =  $id;
            $communes[$i]->save();
        }

        

        $states = State::with('communes')->get();
        return response()->json([
            'success' => 'Information modifée avec succès',
            'communes' => $communes,
            'communesResult' => $state,
            'states' => $states,
            '$id' => $id,
            'state_id' => $state->id,
        ]);
    }
}
