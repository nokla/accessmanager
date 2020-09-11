@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="display-7">Societe</h1>   
    <a style="margin: 19px;" href="{{ route('societe.create')}}" class="btn btn-primary">New</a> 
    {{Form::open(['route' => ['searchsociete']])}}
        <input name="search" type="text" placeholder="search :" />
          <button type="submit" class="btn btn-primary-outline"> <i class="fa fa-1x fa-search"></i></button>
    {{ Form::close() }}
    <table class="table table-striped">
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
                    <a href="{{ route('societe.edit',$societe->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('addemployes',$societe->id)}}" class="btn btn-primary">Ajouter Employes</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
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