@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">Utilisateurs</h1>   
    <a href="{{ route('user.create')}}" class="btn btn-default add-btn top-btn-add">New</a> 
    <table class="table table-striped table-defaults">
        <thead>
            <tr>
            <td>Nom</td>
            <td>email</td>
            <td>Societe</td>
            <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->Societe->name}}</td>
                <td>
                    <a href="{{ route('user.edit',$user->id)}}" class="btn btn-default"><i class="fas fa-pen"></i></a>
                    <button class="btn btn-default btn-supp" onclick="DeleteRecord('{{Route('user.destroy',$user->id)}}')">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        {!! $users->links() !!}
    <div class="d-flex justify-content-end">
    </div>
<div>

@endsection