<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questioning;

class QuestioningController extends Controller
{
    public function sendQuestion(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_bidding' => 'required',
            'question' => 'required|max:500',
        ]);

        Questioning::create($validatedData);

        return redirect()->back()->with('success', trans('messages.question_sent_success'));
    }
}
