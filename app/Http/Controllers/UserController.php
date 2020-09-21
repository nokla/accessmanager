<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('super',0)->paginate(8);
        return View('User.Index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $societes = Societe::all();
        return View('User.create',compact('societes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oInputs = $request->all();
        $validation = Validator::make($oInputs,User::$rules);
        // dd($oInputs);
        if ($validation->passes()) {
            $user = new User;
            $user->fill($oInputs);
            $user->password = Hash::make($oInputs['password']);
            $user->save();
            return Redirect::route('user.index');
        }
        return Redirect::back()->withInput($oInputs)->withErrors($validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function show(Societe $societe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $user = User::find($id);
        $societes = Societe::all();
        return View('User.edit',compact('user','societes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $oInputs = $request->all();
        $validation = Validator::make($oInputs,User::$updateRules);
        if ($validation->passes()) {
            $user->name = $oInputs['name'];
            $user->prenom = $oInputs['prenom'];
            $user->email = $oInputs['email'];
            $user->telephone1 = $oInputs['telephone1'];
            $user->telephone2 = $oInputs['telephone2'];
            if ($oInputs['password']!="") {
                $user->password = Hash::make($oInputs['password']);
            }
            $user->update();
            return Redirect::route('user.index');
        }
        return Redirect::back()->withInput($oInputs)->withErrors($validation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return Redirect::route('user.index');
    }

    public function checklogin(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $return = [
                'id'=>$user->id,
                'Name'=>$user->name,
                'Email'=>$user->email,
                'idSociete'=>$user->idSociete,
                'Societe'=>$user->Societe->name
            ];
            return $return;
        }
        else{
            return "";
        }
    }
}
