<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Exports\HistoryExport;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Excel;

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
            $aData[] = [
                'Nom'=>$item->Employe->name,
                'CIN'=>$item->Employe->CIN,
                'Status'=>(($item->Employe->status == 1 ) ? 'Active' : 'Desactiver'),
                'Societe'=>$item->Employe->Societe->name,
                'Date'=>$item->dScan
            ];
            // dd($item->Employe->status);
        }
        $export = new HistoryExport($aData);

        $filename = now()->timestamp;
        return Excel::download($export,'historique-'.$filename.'.xlsx');
    }
}
