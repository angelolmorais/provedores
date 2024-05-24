<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\Question;

class ParticipationController extends Controller
{
    public function participate(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_bidding' => 'required',
            'status' => 'required',
        ]);

        $userId = $validatedData['id_user'];
        $biddingId = $validatedData['id_bidding'];

        $existingParticipation = Register::where('id_user', $userId)
            ->where('id_bidding', $biddingId)
            ->first();

        if ($existingParticipation) {
            $existingParticipation->delete();
            return redirect()->route('bidding.details', ['id' => $biddingId])
                ->with('success', trans('messages.participation_cancelled'))
                ->with('createdAt', $existingParticipation->created_at);
        } else {
            $register = new Register();
            $register->id_user = $userId;
            $register->id_bidding = $biddingId;
            $register->status = $validatedData['status'];
            $register->save();

            return redirect()->route('bidding.details', ['id' => $biddingId])
                ->with('success', trans('messages.participation_registered_success'))
                ->with('createdAt', $register->created_at);
        }
    }

    public function sendQuestion(Request $request)
    {
        $validatedData = $request->validate([
            'id_user' => 'required',
            'id_bidding' => 'required',
            'question' => 'required',
        ]);

        Question::create($validatedData);

        return back()->with('success', trans('messages.question_sent_success'));
    }
}
