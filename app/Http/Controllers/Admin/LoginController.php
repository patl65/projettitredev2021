<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //affiche la page/formulaire login
    public function index()
    {
        return view('pages.admin.login');
    }

    //se connecter
    public function login(LoginRequest $request)
    {
        //le contrôle des champs se fait par la classe loginRequest, on ne fait plus validator
        //voir exemple de validator dans CategoryController.php

        //connection
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($password, $user->password)) { //(mot de passe formlaire, mot de passe haché)
                auth()->login($user);
                // auth()->user()->notify(new NewConnectionNotification); //envoit un mail à la connexion (Notification)
                // return redirect()->route('dashboard');
                return redirect()->route('blog.experience.create');
            } else {
                return redirect()->route('login')->with('error', 'email et mot de passe ne correspondent pas');
            }
        }
        return redirect()->route('login')->with('error', 'Vérifiez votre mail et votre mot de passe');
    }

    //se déconnecter
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
