<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;
use App\Models\Bidding;

class InformationController extends Controller
{
    public function index()
    {
        $information = Information::whereNull('parent_id')->get();
        return view('bidding.details', compact('information'));
    }

    public function show($id)
    {
        $bidding = Bidding::findOrFail($id);
        $information = Information::where('id_bidding', $bidding->id)->get();

        return view('bidding.details', compact('bidding', 'information'));
    }

    public function showDetails($id)
    {
        $information = Information::findOrFail($id);
        return view('bidding.details', compact('information'));
    }
}
