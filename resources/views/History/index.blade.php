@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">History</h1>   
    <div class="d-flex align-items-center header-top-search">
        <!-- <div class="bloc-form-search">
            {{Form::open(['route' => ['searchsociete']])}}
                <input name="search" class="form-control" type="text" placeholder="Search..." />
                <button type="submit" class="btn btn-default"> <i class="fa fa-1x fa-search"></i></button>
            {{ Form::close() }}
        </div> -->
    </div>
    <table class="table table-striped table-defaults">
        <thead>
            <tr>
                <td>Nom</td>
                <td>CIN</td>
                <td>Date Scan</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($oHistory as $history)
            <tr>
                <td>{{$history->Employe->name}}</td>
                <td>{{$history->Employe->CIN}}</td>
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