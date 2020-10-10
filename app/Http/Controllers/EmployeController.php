<?php

namespace App\Http\Controllers;

use App\Models\Societe;
use App\Models\Employe;
use App\Models\History;
use App\Exports\EmployeExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Excel;
use Redirect;
use Auth;
use PDF;

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

        return View('Employe.index',compact('employes'));
    }

    public function SearchEmploye(Request $request){
        $text = $request->input('search');
        $employes = Employe::where('name','LIKE', '%'.$text.'%')
        ->orWhere('CIN','LIKE', '%'.$text.'%')
        ->paginate(8);
        return View('Employe.index',compact('employes'));
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
        return View('Employe.create',compact('societes'));
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
            $employe = new Employe;
            $employe->name = $oInputs['name'];
            $employe->cin = $oInputs['cin'];
            if(Auth::user()->super == 1){
                $employe->idSociete = $oInputs['idSociete'];
            }
            else{
                $employe->idSociete = Auth::user()->idSociete;
            }
            $employe->prenom = $oInputs['prenom'];
            $employe->telephone1 = $oInputs['telephone1'];
            $employe->telephone2 = $oInputs['telephone2'];
            $employe->email = $oInputs['email'];
            $employe->adresse = $oInputs['adresse'];
            $employe->birthdate = $oInputs['birthdate'];
            $employe->nationalite = $oInputs['nationalite'];
            if ($request->sexe) {
                $employe->sexe = $oInputs['sexe'];
            }
            $employe->situation = $oInputs['situation'];

            $employe->etatcovid = $oInputs['etatcovid'];

            if($oInputs['etatcovid'] == "3"){
                $employe->status = 0;
                $employe->raison = "positives au covid";
            }
            else{
                $employe->status = $oInputs['status'];
                $employe->raison = $oInputs['raison'];
            }

            $filename = 'qrcodes/'.$oInputs['cin'].'_'.strtotime(date("Y-m-d H:i:s")).'.png';
            // \QrCode::size(200)->format('png')->generate($employe->cin, base_path('public/'.$filename));
            $employe->qrcode=$filename;
            
            $employe->save();
            return Redirect::route('employe.index');
        }
        return Redirect::back()->withInput($oInputs)->withErrors($validation);
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

        return View('Employe.show',compact('employe'));
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
        return View('Employe.edit',compact('employe','societes'));
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
        $validation = Validator::make($oInputs,Employe::$rules);
        if ($validation->passes()) {
            $employe = Employe::find($id);
            
            $employe->name = $oInputs['name'];
            if(Auth::user()->super == 1){
                $employe->idSociete = $oInputs['idSociete'];
            }
            else{
                $employe->idSociete = Auth::user()->idSociete;
            }
            $employe->prenom = $oInputs['prenom'];
            $employe->telephone1 = $oInputs['telephone1'];
            $employe->telephone2 = $oInputs['telephone2'];
            $employe->email = $oInputs['email'];
            $employe->adresse = $oInputs['adresse'];
            $employe->birthdate = $oInputs['birthdate'];
            $employe->nationalite = $oInputs['nationalite'];
            if ($request->sexe) {
                $employe->sexe = $oInputs['sexe'];
            }
            $employe->situation = $oInputs['situation'];
            $employe->etatcovid = $oInputs['etatcovid'];

            if($oInputs['etatcovid'] == "3"){
                $employe->status = 0;
                $employe->raison = "positives au covid";
            }
            else{
                $employe->status = $oInputs['status'];
                $employe->raison = $oInputs['raison'];
            }
            if ($employe->CIN != $oInputs['cin']) {
                $employe->CIN = $oInputs['cin'];
                $filename = 'qrcodes/'.$oInputs['cin'].'_'.strtotime(date("Y-m-d H:i:s")).'.png';
                \QrCode::size(200)->format('png')->generate($oInputs['cin'], base_path('public/'.$filename));
                Storage::delete(base_path('public/'.$employe->qrcode));
                $employe->qrcode=$filename;
            }

            $employe->update();
            return Redirect::route('employe.index');
        }
        return Redirect::back()->withInput($oInputs)->withErrors($validation);
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
        History::where('idEmploye',$id)->delete();
        return Redirect::route('employe.index');
    }

    public function getEmploye(string $cin){
        $user = Employe::where('CIN',$cin)->first();

        if (!$user) {
            return '';
        }

        $oHistory = new History;
        $oHistory->idEmploye=$user->id;
        $oHistory->dScan = Carbon::now();
        $oHistory->save();

        $return = [
            'name'=>$user->name,
            'cin'=>$user->CIN,
            'status'=>$user->status,
            'qrcode'=>$user->qrcode,
            'idSociete'=>$user->idSociete,
            'Societe'=>$user->Societe->name
        ];
        
        return response()->json($return);
    }

    public function PrintEmploye(int $id){
        $employe = Employe::find($id);

        if ($employe==null) {
            return Redirect::back();
        }

        $oData = [
            'name'=>$employe->name,
            'prenom'=>$employe->prenom,
            'cin'=>$employe->cin,
            'adresse'=>$employe->adresse,
            'telephone1'=>$employe->telephone1,
            'email'=>$employe->email,
            'qrcode'=>$employe->qrcode
        ];

        $qrcode = $employe->qrcode;

        $oPdf = PDF::loadview('reports.employe',$oData);
        return $oPdf->download('invoice.pdf');
        // return view('reports.employe',compact('qrcode'));
    }

    public function PrintEmployes(){
        
        if (Auth::user()->super == 1) {
            $oEmployes = Employe::all();
        }
        else{
            $oEmployes = Employe::where('idSociete',Auth::user()->idSociete)->get();
        }

        $aData[] = ['Nom','Prenom','CIN','Status','Societe','Telephone1','Telephone2','Email','Adresse','DateNaissance','Nationalite','Sexe','Situation','EtatCovid','Raison'];

        foreach ($oEmployes as $item ) {
            if ($item->etatcovid==1) {
                $etatCovid = "Guérit";
            }
            if ($item->etatcovid==2) {
                $etatCovid = "Mort";
            }
            if ($item->etatcovid==3) {
                $etatCovid = "Positif";
            }
            if ($item->etatcovid==4) {
                $etatCovid = "Négative";
            }

            $aData[] = [
                'Nom'=>$item->name,
                'Prenom'=>$item->prenom,
                'CIN'=>$item->CIN,
                'Status'=>($item->status == 1 ) ? 'Active' : 'Desactiver',
                'Societe'=> $item->Societe ? $item->Societe->name : "",
                'Telephone1'=>$item->telephone1,
                'Telephone2'=>$item->telephone2,
                'Email'=>$item->email,
                'Adresse'=>$item->adresse,
                'DateNaissance'=>$item->birthdate,
                'Nationalite'=>$item->nationalite,
                'Sexe'=>$item->sexe,
                'Situation'=>$item->situation,
                'EtatCovid'=>$etatCovid,
                'Raison'=>$item->raison
            ];
        }

        $export = new EmployeExport($aData);

        $filename = now()->timestamp;
        return Excel::download($export,'personel-'.$filename.'.xlsx');
    }
}
