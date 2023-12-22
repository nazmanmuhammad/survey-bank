<?php

namespace App\Http\Controllers;

use App\Exports\RespondenExport;
use App\Models\Responden;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function print($id)
    {

        $respondens = Responden::with('answers')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.respondens', ['respondens' => $respondens]);
        return $pdf->download('respondens.pdf');
    }

    public function export()
    {
        $data = [];
        $respondens = Responden::with('answers')->get();
        $answers = '';


        foreach ($respondens as $key => $value) {
            foreach ($value->answers as $key => $answer) {
                $count = count($value->answers);
                if($answer->answer==1)
                {
                    $answerResponden = 'Sangat tidak puas';
                }else if($answer->answer==2)
                {
                    $answerResponden = 'Tidak puas';
                }else if($answer->answer==3)
                {
                    $answerResponden = 'Netral';
                }else if($answer->answer==4)
                {
                    $answerResponden = 'Puas';
                }else{
                    $answerResponden = 'Sangat puas';
                }
                $answers .= $key+1 .'.'. $answerResponden .';';
            }
            $temp['Responden IP'] = $value->ip_address;
            $temp['Nama Lengkap Responden'] = $value->name;
            $temp['Jawaban'] = $answers;
            $temp['Skor'] = $value->score;
            $temp['Kritik dan Saran'] = $value->criticism_and_suggestions;

            array_push($data, $temp);
        }

        if(!$data) return response(['message' => 'No Data'], 500);
        return Excel::download(new RespondenExport($data), "Data Responden.xlsx");
    }
}