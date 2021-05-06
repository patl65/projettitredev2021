<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
   //import des utilisateurs
   public function index(){

    // import tous les utilisateurs        
    // $users = User::all();
    $users = User::orderBy('lastName')->get();
    return view('pages.admin.indexUserAdmin', ['users' => $users]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.createUserAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users,email',
            //unique va vérififier dans la bdd s'il y a déjà un mail identique qui existe
            'password' => 'required|string',
            'confirm_password' => 'required|same:password',
            'administrator' => '',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.user.create')->withErrors($validator)->withInput();
        }
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $administrator = (bool) $request->input('administrator');
        //(bool) car la chekbox renvoit un string true ou false et donc on lui que c'est un booléen
       $user = User::create([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
            'administrator' => $administrator,
            // 'remember_token',
            // 'email_verified_at' => 'datetime',
    
        ]);
        return redirect()->route('admin.user')->with('success', "L'administrateur $user->lastName $user->firstName a été créé(e)");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.admin.showUserAdmin', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('pages.admin.updateUserAdmin', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'administrator' => '',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.user.create')->withErrors($validator)->withInput();
        }
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $administrator = (bool) $request->input('administrator');
        //(bool) car la checkbox renvoit un string true ou false et donc on lui que c'est un booléen
       $user->update([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'administrator' => $administrator,
        ]);
        return redirect()->route('admin.user.edit', $user->id)->with('success', "$user->lastName $user->firstName a été mis(e) à jour");
    }


    public function updateEmail(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users,email',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', $user->id)->withErrors($validator)->withInput();
        }
        $user->update([
            'email' => $request->input('email'),
        ]);
        return redirect()->route('admin.user.edit', $user->id)->with('success', "Email mis à jour pour $user->lastName $user->firstName");
    }
 
 
    public function updatePassword(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string',
            'confirm_password' => 'required|same:password'
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', $user->id)->withErrors($validator)->withInput();
        }
        $user->update([
            'password' => Hash::make($request->input('password')),
         ]);
        return redirect()->route('admin.user.edit', $user->id)->with('success', "Mot de passe mis à jour pour $user->lastName $user->firstName");
    }
 








    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user')->with('succes', "L'administrateur $user->lastName $user->firstName a été supprimé");
    }
}
