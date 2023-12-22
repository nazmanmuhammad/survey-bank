<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function submit(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'criticism_and_suggestions' => 'required'
        ]);
        $answers = collect($request->all())->splice(2, count($request->all()) - 3);
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
