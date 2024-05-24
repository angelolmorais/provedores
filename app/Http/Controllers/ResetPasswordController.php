<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function forgotPasswordForm()
    {

        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('status', __('passwords.sent'));
        } elseif ($status === Password::RESET_THROTTLED) {
            return back()->withErrors(['email' => __('passwords.throttled')]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function resetPasswordForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => bcrypt($password),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
