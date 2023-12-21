<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::orderBy('serial_number', 'asc')->get();
        confirmDelete('Warning', 'Are you sure want to delete this Question?');
        return view('question.index', compact('questions'));
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
    public function store(Request $request)
    {
        $this->validate($request,[
            'question' => 'required',
        ]);

        Question::create($request->all());
        alert()->success('Success','Question has been added.');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        $question->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->back();
    }
}
