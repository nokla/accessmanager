@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">Societe</h1>   
    <div class="d-flex align-items-center header-top-search">
        <a href="{{ route('societe.create')}}" class="btn btn-default add-btn">New</a> 
        <div class="bloc-form-search">
            {{Form::open(['route' => ['searchsociete']])}}
                <input name="search" class="form-control" type="text" placeholder="search..." />
                <button type="submit" class="btn btn-default"> <i class="fa fa-1x fa-search"></i></button>
            {{ Form::close() }}
        </div>
    </div>
    <table class="table table-striped table-defaults">
        <thead>
            <tr>
                <td>Nom</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($societes as $societe)
            <tr>
                <td>{{$societe->name}}</td>
                <td>
                    <form action="{{ route('societe.destroy', $societe->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('societe.edit',$societe->id)}}" class="btn btn-default">Edit</a>
                    <a href="{{ route('addemployes',$societe->id)}}" class="btn btn-default">Ajouter Employes</a>
                    <button class="btn btn-default btn-supp" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $societes->links() !!}
    </div>
<div>

@endsection