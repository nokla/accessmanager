@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">History</h1>   
    <a href="{{ route('PrintHistory')}}" class="btn btn-default add-btn top-btn-add">Imprimer</a> 
    <div class="d-flex align-items-center header-top-search">
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
            @foreach($oHistory as $history)
            <tr>
                <td>{{$history->Employe->name}}</td>
                <td>{{$history->Employe->CIN}}</td>
                <td>{{$history->Employe->Societe->name}}</td>
                <td>{{$history->dScan}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {!! $oHistory->links() !!}
    </div>
<div>

@endsection