@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="display-7">Utilisateurs</h1>   
    <a style="margin: 19px;" href="{{ route('user.create')}}" class="btn btn-primary">New</a> 
    <table class="table table-striped">
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
                    <form action="{{ route('user.destroy', $user->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route('user.edit',$user->id)}}" class="btn btn-primary">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        {!! $users->links() !!}
    <div class="d-flex justify-content-center">
    </div>
<div>

@endsection