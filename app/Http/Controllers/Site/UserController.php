<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.userAccountCreate');
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
            'userName' => 'required|string|unique:users,userName',
            'email' => 'required|email|unique:users,email',
            //unique va vérififier dans la bdd s'il y a déjà un mail identique qui existe
            'password' => 'required|string',
            'confirm_password' => 'required|same:password',
            'phoneNumber' => 'required|string',
            'streetAddress' => 'required|string',
            'postcode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'gtc' => 'required|in:true',
            //checkbox obligatoirement cochée
        ]);
        if ($validator->fails()) {
            return redirect()->route('user.create')->with('error', "Vous devez accepter les conditions générales d'utilisation")->withErrors($validator)->withInput();
            //ppour la checkbox obligatoirement cochée : j'ai du ajouter with('error',"Vous devez accepter les conditions générales d'utilisation"), sans je n'avais aucun message
        }
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $userName = $request->input('userName');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $phoneNumber = $request->input('phoneNumber');
        $streetAddress = $request->input('streetAddress');
        $postcode = $request->input('postcode');
        $city = $request->input('city');
        $country = $request->input('country');
        $gtc = (bool) $request->input('gtc');
        //(bool) car la chekbox renvoit un string true ou false et donc on lui que c'est un booléen

        $user = User::create([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'userName' => $userName,
            'email' => $email,
            'password' => $password,
            'phoneNumber' => $phoneNumber,
            'streetAddress' => $streetAddress,
            'postcode' => $postcode,
            'city' => $city,
            'country' => $country,
            'administrator' => 0,
            'gtc' => $gtc,
            // 'remember_token',
            // 'email_verified_at' => 'datetime',
        ]);
        return redirect()->route('blog.experience.create')->with('success', "Bienvenue !");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.userAccountShow', ['user' => $user]);
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
            'userName' => 'required|string|unique:users,userName',
            'phoneNumber' => 'required|string',
            'streetAddress' => 'required|string',
            'postcode' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'administrator' => '',
            'gtc' => '',
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.user.edit', $user->id)->withErrors($validator)->withInput();
        }
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $userName = $request->input('userName');
        $phoneNumber = $request->input('phoneNumber');
        $streetAddress = $request->input('streetAddress');
        $postcode = $request->input('postcode');
        $city = $request->input('city');
        $country = $request->input('country');
        $administrator = (bool) $request->input('administrator');
        //(bool) car la chekbox renvoit un string true ou false et donc on lui que c'est un booléen

        $user->update([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'userName' => $userName,
            'phoneNumber' => $phoneNumber,
            'streetAddress' => $streetAddress,
            'postcode' => $postcode,
            'city' => $city,
            'country' => $country,
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
        return redirect()->route('admin.user')->with('succes', "L'utilisateur $user->lastName $user->firstName a été supprimé");
    }
}
