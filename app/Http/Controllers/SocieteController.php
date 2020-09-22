<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\Employe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Redirect;
use File;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societes = Societe::paginate(10);
        return View('Societe.index',compact('societes'));
    }

    public function SearchSociete(Request $request){
        $text = $request->input('search');
        $societes = Societe::where('name','LIKE', '%'.$text.'%')->paginate(8);
        return View('Societe.index',compact('societes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Societe.create');
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
        $validation = Validator::make($oInputs,Societe::$rules);
        if ($validation->passes()) {
            $societe = new Societe;
            $societe->fill($oInputs);
            $societe->save();
            return Redirect::route('societe.index');
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
    public function edit(Societe $societe)
    {
        return View('Societe.edit',compact('societe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Societe $societe)
    {
        $oInputs = $request->all();
        $validation = Validator::make($oInputs,Societe::$rules);
        if ($validation->passes()) {
            $societe->update($oInputs);
            return Redirect::route('societe.index');
        }
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Societe  $societe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Societe $societe)
    {
        $societe->delete();
        return Redirect::route('societe.index');
    }

    public function AddEmployes($id){
        return View('Societe.employes',compact('id'));
    }

    public function PostAddEmployes(Request $request){
        $file = $request->file('FileEmployes');
        $idSociete = $request->input('idSociete');

        $tempPath = $file->path();
        $fileReader = fopen($tempPath,'r');

        while ($line = fgets($fileReader)) {
            $employe = new Employe;
            $lineParts = explode(';',$line);
            $employe->name = $lineParts[2];
            $employe->cin = trim($lineParts[3]);
            $filename = 'qrcodes/'.$employe->cin.'_'.strtotime(date("Y-m-d H:i:s")).'.png';
            \QrCode::size(200)->format('png')->generate($lineParts[3], base_path('public/'.$filename));
            $employe->qrcode=$filename;
            $employe->idSociete = $idSociete;
            $employe->status = 1;
            try {
                $employe->save();
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        fclose($fileReader);

        return Redirect::back();
    }
}
