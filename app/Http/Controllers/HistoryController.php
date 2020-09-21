<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Societe;
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
        $oHistory = History::paginate(10);
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
        $export = new HistoryExport($aData);

        $filename = now()->timestamp;
        return Excel::download($export,'historique-'.$filename.'.xlsx');
    }

    public function HistorySociete(){
        $oSocietes = Societe::all();

        return view('History.societe',compact('oSocietes'));
    }

    public function PostHistorySociete(Request $request){

        $idSociete = $request->idSociete;

        $oHistory = History::whereHas('employe', function (Builder $query) use ($idSociete) {
            $query->where('idSociete',$idSociete);
        })->paginate(10);
        $oSocietes = Societe::all();

        return view('History.societe',compact('oHistory','oSocietes'));
    }
}
