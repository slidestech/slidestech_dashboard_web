<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('superadmin.questions_list');
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
        $question = new Question();
        $question->content = $request->content;
        $question->service_id = $request->service_id;
        $question->question_id = $request->question_id;

        $question->save();

        // return compact('validated');
        return response()->json([
            'success' => 'Information added with success',
            'question' => $question
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getQuestions()
    {
        $questions = Question::whereNull('question_id')
            ->with('childrenQuestions')
            ->get();
        return  compact('questions');



        // $questions = Question::with('')->get();
        // return compact('questions');
    }

    public function attachDocuments(Request $request, $id)
    {

        $validated = $this->validate($request, [
            'documents' => 'required',
        ]);



        $question = Question::where("id", "=", $id)->with("documents")->firstOrFail();
        $documents = $request->documents;
        $question->documents()->sync($documents);





        $questions = Question::with('documents')->get();
        return response()->json([
            'success' => 'Information modifée avec succès',
            'questions' => $questions,
        ]);
    }

    public function getDocuments($id)
    {
        $question = Question::with('documents')->findOrFail($id);
        return response()->json([
            'question' => $question
        ]);
    }
}
