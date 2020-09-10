@extends('layout.back')

@section('content')
<div class="container">
<div class="row">
<div class="col-sm-12">
    <h1 class="display-7">Societe</h1>   
    <a style="margin: 19px;" href="{{ route('societe.create')}}" class="btn btn-primary">New</a> 
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
                    <a href="{{ route('societe.edit',$societe->id)}}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('societe.destroy', $societe->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<div>
</div>
</div>

@endsection