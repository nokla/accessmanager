@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">History Societe</h1>   
    <div class="d-flex align-items-center header-top-search">
        <div class="bloc-form-search">
            {{Form::open(['route' => ['posthistorysociete']])}}
                <div class="form-group row align-items-center">
                    <label class="col-sm-5 col-form-label">Societe :</label>
                    <div class="col-sm-7 text-right select-bloc">  
                        <select class="form-control" name="idSociete" onclick="setupPrint(this.value);">
                            <option value="">--------------</option>
                            @foreach($oSocietes as $societe)
                                <option value="{{$societe->id}}">{{$societe->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div> 
                <button type="submit" class="btn btn-default"> <i class="fa fa-1x fa-search"></i></button>
                <a href="" id="lnkPrintSocieteHistory" class="btn btn-default add-btn top-btn-add">Imprimer</a> 
            {{ Form::close() }}
        </div>
    </div>
    <table class="table table-striped table-defaults">
        <thead>
            <tr>
                <td>Nom</td>
                <td>CIN</td>
                <td>Societe</td>
                <td>Date Scan</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @if(isset($oHistory))
                    @foreach($oHistory as $history)
                    <tr>
                        <td>{{$history->Employe->name}}</td>
                        <td>{{$history->Employe->CIN}}</td>
                        <td>{{$history->Employe->Societe->name}}</td>
                        <td>{{$history->dScan}}</td>
                    </tr>
                    @endforeach
            @endif
        </tbody>
    </table>
    @if(isset($oHistory))
    <div class="d-flex justify-content-end">
        {!! $oHistory->links() !!}
    </div>
    @endif
<div>

@endsection