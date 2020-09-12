<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Redirect;

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
            $user->name = $oInputs['name'];
            $user->email = $oInputs['email'];
            $user->password = Hash::make($oInputs['password']);
            $user->idSociete = $oInputs['idSociete'];
            $user->save();
            return Redirect::route('user.index');
        }
        return Redirect::back();
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
    public function edit(Societe $user)
    {
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
            $user->email = $oInputs['email'];
            if ($oInputs['password']!="") {
                $user->password = Hash::make($oInputs['password']);
            }
            if ($oInputs['idSociete']!="") {
                $user->idSociete = $oInputs['idSociete'];
            }
            $user->update();
            return Redirect::route('user.index');
        }
        return Redirect::back();
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
}
