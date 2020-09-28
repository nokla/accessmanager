<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Societe;
use App\Models\Employe;
use App\Exports\HistoryExport;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Excel;
use Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->super==1) {
            $oHistory = History::whereNull('bRetard')->paginate(10);
        }
        else{
            $idSociete=Auth::user()->idSociete;
            $oHistory = History::whereHas('employe', function (Builder $query) use ($idSociete) {
                $query->where('idSociete',$idSociete);
            })->whereNull('bRetard')->paginate(10);
        }
        
        return View('History.index',compact('oHistory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $aHistories = History::all();
        $aData[] = ['Nom','CIN','Status','Societe','Date scan'];
        if(Auth::user()->super == 1){
            foreach ($aHistories as $item ) {
                $aData[] = [
                    'Nom'=>$item->Employe->name,
                    'CIN'=>$item->Employe->CIN,
                    'Status'=>(($item->Employe->status == 1 ) ? 'Active' : 'Desactiver'),
                    'Societe'=>$item->Employe->Societe->name,
                    'Date'=>$item->dScan
                ];
            }
        }
        else {
            foreach ($aHistories as $item ) {
                if( Auth::user()->idSociete == $item->Employe->idSociete){
                    $aData[] = [
                        'Nom'=>$item->Employe->name,
                        'CIN'=>$item->Employe->CIN,
                        'Status'=>(($item->Employe->status == 1 ) ? 'Active' : 'Desactiver'),
                        'Societe'=>$item->Employe->Societe->name,
                        'Date'=>$item->dScan
                    ];
                }
            }
        }
        
        $export = new HistoryExport($aData);

        $filename = now()->timestamp;
        return Excel::download($export,'historique-'.$filename.'.xlsx');
    }

    public function HistorySociete(){
        $oSocietes = Societe::all();

        return view('History.societe',compact('oSocietes'));
    }

    public function GetHistorySociete(Request $request){
        $iDraw = $request['draw'];
        $iRow = $request['start'];
        $iRowPerPage = $request['length'];
        $idSociete = $request["idSociete"];
        // $aColumns = ['id','c_name','c_type','c_cin','c_registre'];

        if($idSociete){
            $oHistories = History::whereHas('employe', function (Builder $query) use ($idSociete) {
                $query->where('idSociete',$idSociete);
            })->whereNotNull('bRetard')->limit($iRowPerPage)->offset($iRow)->get()->toArray();
        }
        else{
            $oHistories = History::whereHas('employe', function (Builder $query) use ($idSociete) {
                $query->where('idSociete',$idSociete);
            })->whereNotNull('bRetard')->limit(10);
        }

        $iTotalDisplayRecords = count($oHistories);
        $iTotalRecords = count($oHistories);
        // dd($oHistories);
        $response = [
            "draw"=>intval($iDraw),
            "iTotalRecords" => $iTotalDisplayRecords,
            "iTotalDisplayRecords" => $iTotalRecords,
            "data" => $oHistories
        ];

        return $response;
    }

    public function PostHistorySociete(Request $request){

        $idSociete = $request->idSociete;

        $oHistory = History::whereHas('employe', function (Builder $query) use ($idSociete) {
            $query->where('idSociete',$idSociete);
        })->whereNotNull('bRetard')->paginate(10);
        $oSocietes = Societe::all();

        return view('History.societe',compact('oHistory','oSocietes'));
    }

    public function PrintHistorySociete(int $id)
    {
        $aHistories = History::whereHas('employe', function (Builder $query) use ($id) {
            $query->where('idSociete',$id);
        })->get();

        $aData[] = ['Nom','CIN','Status','Societe','Date scan'];
        foreach ($aHistories as $item ) {
                $aData[] = [
                    'Nom'=>$item->Employe->name,
                    'CIN'=>$item->Employe->CIN,
                    'Status'=>(($item->Employe->status == 1 ) ? 'Active' : 'Desactiver'),
                    'Societe'=>$item->Employe->Societe->name,
                    'Date'=>$item->dScan
                ];
        }
        $export = new HistoryExport($aData);

        $filename = now()->timestamp;
        return Excel::download($export,'historique-'.$filename.'.xlsx');
    }

    public function Checkin(string $cin,int $idSociete){
        $oEmploye = Employe::where('cin',$cin)->first();
        $oSociete = Societe::find($idSociete);
        
        if(!$oEmploye || !$oSociete){
            return "";
        }

        if($oEmploye->idSociete != $idSociete){
            return [
                'code'=>1,
                'body'=>'employe dont belong to this societe'
            ];
        }
        $oHistory = new History;
        $oHistory->idEmploye = $oEmploye->id;
        $oHistory->dScan = Carbon::now();

        $tStart = $oSociete->tStarts;

        $time = strtotime($tStart);
        $endTime = strtotime('+30 minutes', $time);
        
        if ($endTime>time()) {
            $oHistory->bRetard = true;
        }
        else
            $oHistory->bRetard = false;
        $oHistory->save();

        $etatCovid = "";
        
        if ($oEmploye->etatcovid==1) {
            $etatCovid = "Guérit";
        }
        if ($oEmploye->etatcovid==2) {
            $etatCovid = "Mort";
        }
        if ($oEmploye->etatcovid==3) {
            $etatCovid = "Positif";
        }
        if ($oEmploye->etatcovid==4) {
            $etatCovid = "Négative";
        }

        $return  = [
                "code"=>2,
                'name'=>$oEmploye->name,
                'prenom'=>$oEmploye->prenom,
                'cin'=>$oEmploye->CIN,
                'telephone1'=>$oEmploye->telephone1,
                'status'=>$oEmploye->status,
                'qrcode'=>$oEmploye->qrcode,
                'etatcovid'=>$etatCovid,
                'societe'=>$oEmploye->Societe->name
            ];

        return response()->json($return);
    }
}
