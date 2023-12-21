<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function submit(Request $request)
    {
        $answers = collect($request->all())->splice(1, count($request->all()));
        $responden = Responden::create([
            'ip_address' => $request->ip()
        ]);

        foreach($answers as $key => $answer)
        {
            $responden->answers()->create([
                'question_id' => $key,
                'answer' => $answer,
                'answer_date' => now(),
                'status' => true
            ]);
        }

        $dataResponden = Responden::findOrFail($responden->id);
        alert()->success('Success','Survey has been submitted.');
        return view('guest.thankyou', compact('dataResponden'));
    }
}
