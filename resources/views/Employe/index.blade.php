@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="display-7">Personels</h1>   
    <a style="margin: 19px;" href="{{ route('employe.create')}}" class="btn btn-primary">New</a> 
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Name</td>
                <td>Cin</td>
                <td>Status</td>
                <td>Societe</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            @foreach($employes as $employe)
            <tr>
                <td>{{$employe->name}}</td>
                <td>{{$employe->CIN}}</td>
                <td>
                    @if($employe->status==1)
                        active
                    @else
                        desactiver
                    @endif
                </td>
                <td>{{$employe->Societe->name}}</td>
                <td>
                    {{Form::open(['method'=>'delete','route' => ['employe.destroy',$employe->id]])}}
                    <a href="{{ route('employe.edit',$employe->id)}}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('employe.show',$employe->id)}}" class="btn btn-primary">Detail</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        {!! $employes->links() !!}
    <div class="d-flex justify-content-center">
    </div>
<div>

@endsection