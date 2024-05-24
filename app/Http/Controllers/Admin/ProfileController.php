<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Country;
use App\Models\Activity;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $countries = Country::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();

        return view('profile', compact('user', 'countries', 'activities'));
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'business' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,

        ]);

        $user->name = $request->input('name');
        $user->business = $request->input('business');
        $user->email = $request->input('email');
        $user->activity = implode(',', $request->input('activity'));
        $user->country = $request->input('country');
        $user->city = $request->input('city');
        $user->telephone = $request->input('telephone');
        $user->state_province = $request->input('state_province');
        $user->address = $request->input('address');



        if ($request->input('company') === 'N') {
            $user->cnpj = $request->input('cnpj');
            $user->nit = null;
        } elseif ($request->input('company') === 'I') {
            $user->cnpj = null;
            $user->nit = $request->input('nit');
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        return redirect()->back()->with('success', __('messages.profile_updated'));
    }


    public function showChangePasswordModal()
    {
        return view('change_password_modal');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => __('messages.invalid_current_password')]);
        }

        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return back()->with('success', __('messages.password_updated'));
    }
}
