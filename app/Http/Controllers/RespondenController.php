<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;

class RespondenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $respondens = Responden::with('answers')->get();
        confirmDelete('Warning', 'Are you sure want to delete this Responden?');
        return view('responden.index', compact('respondens'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Responden $responden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responden $responden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responden $responden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responden $responden)
    {
        $responden->delete();
        return redirect()->route('responden.index');
    }

    public function answers($id)
    {
        $responden = Responden::with('answers')->findOrFail($id);
        return view('responden.view-answers', compact('responden'));
    }
}
