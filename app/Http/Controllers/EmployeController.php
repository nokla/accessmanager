<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Auth;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->super==0) {
            $employes = Employe::where('idSociete',Auth::user()->idSociete)->paginate(10);
        }
        else{
            $employes = Employe::paginate(10);
        }

        return View('employe.index',compact('employes'));
    }

    public function SearchEmploye(Request $request){
        $text = $request->input('search');
        $employes = Employe::where('name','LIKE', '%'.$text.'%')
        ->orWhere('CIN','LIKE', '%'.$text.'%')
        ->paginate(8);
        return View('employe.index',compact('employes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $societes=null;
        if(Auth::user()->super==1){
            $societes = Societe::all();
        }
        // dd($societes);
        return View('employe.create',compact('societes'));
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
        $validation = Validator::make($oInputs,Employe::$rules);
        // dd($oInputs);
        if ($validation->passes()) {
            $filename = 'qrcodes/'.$oInputs['cin'].'_'.strtotime(date("Y-m-d H:i:s")).'.png';
            
            $employe = new Employe;
            $employe->name = $oInputs['name'];
            $employe->cin = $oInputs['cin'];
            $employe->status = $oInputs['status'];
            \QrCode::size(200)->format('png')->generate($employe->cin, base_path('public/'.$filename));
            $employe->qrcode=$filename;
            if(Auth::user()->super==1){
                $employe->idSociete = $oInputs['idSociete'];
            }
            else{
                $employe->idSociete = Auth::user()->idSociete;
            }
            $employe->save();
            return Redirect::route('employe.index');
        }
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::find($id);

        return View('employe.show',compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $societes=null;
        $employe = Employe::find($id);
        if(Auth::user()->super==1){
            $societes = Societe::all();
        }
        return View('employe.edit',compact('employe','societes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oInputs = $request->all();
        $validation = Validator::make($oInputs,Employe::$updateRules);
        if ($validation->passes()) {
            $employe = Employe::find($id);
            
            $employe->name = $oInputs['name'];
            if ($employe->CIN != $oInputs['cin']) {
                $employe->CIN = $oInputs['cin'];
                $filename = 'qrcodes/'.$oInputs['cin'].'_'.strtotime(date("Y-m-d H:i:s")).'.png';
                \QrCode::size(200)->format('png')->generate($oInputs['cin'], base_path('public/'.$filename));
                Storage::delete(base_path('public/'.$employe->qrcode));
                $employe->qrcode=$filename;
            }

            if ($oInputs['status']!="") {
                $employe->status = $oInputs['status'];
            }
            if ($oInputs['idSociete']!="") {
                $employe->idSociete = $oInputs['idSociete'];
            }
            $employe->update();
            return Redirect::route('employe.index');
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::find($id)->delete();
        return Redirect::route('employe.index');
    }

    public function getEmploye(string $cin){
        $user = Employe::where('CIN',$cin)->first();
        $return = [
            'name'=>$user->name,
             'cin'=>$user->CIN,
             'status'=>$user->status,
             'qrcode'=>$user->qrcode,
             'Societe'=>$user->Societe->name
        ];
        if (!$user) {
            return '';
        }
        return response()->json($return);
    }
}
