<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use App\Models\Country;
use App\Models\Activity;


class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        return view('auth.login');
    }

    public function registration()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        $countries = Country::orderBy('name')->get();
        $activities = Activity::orderBy('name')->get();

        return view('auth.registration', compact('countries', 'activities'));
    }

    /*
    public function registration()
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        $countries = Country::orderBy('name')->get();

        return view('auth.registration', compact('countries'));
    }
    */
    public function postLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess(__('messages.logged_in_success'));
        }

        return redirect("login")->withSuccess(__('messages.invalid_credentials'));
    }

    public function postRegistration(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('profile');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        $data = $request->all();
        $data['activity'] = implode(',', $request->input('activity'));
        $user = $this->create($data);
        return redirect("dashboard")->with(['success' => __('messages.registration_success')]);

    }

    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess(__('messages.no_access'));
    }

    public function create(array $data)
    {
        $userData = [
            'company' =>  $data['company'],
            'cnpj' =>  $data['cnpj'],
            'nit' =>  $data['nit'],
            'name' =>  $data['name'],
            'business' =>  $data['business'],
            'email' =>  $data['email'],
            'telephone' =>  $data['telephone'],
            'state_province' =>  $data['state_province'],
            'address' =>  $data['address'],
            'activity' =>  $data['activity'],
            'country' =>  $data['country'],
            'city' => $data['city'],
            'privacy_policy' => $data['privacy_policy'],
            'password' => Hash::make($data['password']),
        ];

        User::create($userData);

        return redirect('login')->withSuccess(__('messages.registration_success'));


    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function showResetForm($token)
    {

        if (Auth::check()) {
            return redirect()->route('profile');
        }
        return view('auth.passwords.reset')->with(['token' => $token]);
    }

    public function updatePassword(Request $request, User $user)
    {

        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('messages.current_password_incorrect'));
                }
            }],
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->back()->with('success', __('messages.password_updated'));
    }
}
