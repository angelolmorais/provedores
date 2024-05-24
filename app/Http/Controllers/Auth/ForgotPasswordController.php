<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Certifique-se de importar o modelo User

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        if (Auth::check()) {
            return redirect()->route('profile'); // Redirecionar usuário autenticado para perfil
        }
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request); // Chama a validação de e-mail do trait

        // Verifica se o e-mail existe antes de enviar o link de recuperação
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Este e-mail não está cadastrado.']);
        }

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        if ($response === Password::RESET_LINK_SENT) {
            return back()->with('status', trans($response)); // Mostrar mensagem de sucesso
        }

        throw ValidationException::withMessages([
            'email' => [trans($response)], // Mostrar mensagem de erro genérica
        ]);
    }
}
