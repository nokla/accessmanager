@extends('layout.back')

@section('content')
<div class="container mt-5">
    <h1 class="titre-page-default">Personels</h1>   
    <div class="d-flex align-items-center header-top-search">
        <a href="{{ route('employe.create')}}" class="btn btn-default add-btn">New</a> 
        <div class="bloc-form-search">
        {{Form::open(['route' => ['searchemploye']])}}
            <input name="search" class="form-control" type="text" placeholder="search..." />
            <button type="submit" class="btn btn-default"> <i class="fa fa-1x fa-search"></i></button>
        {{ Form::close() }}
        </div>
    </div>
    <table class="table table-striped table-defaults">
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
                    <a href="{{ route('employe.edit',$employe->id)}}" class="btn btn-default">Edit</a>
                    <a href="{{ route('employe.show',$employe->id)}}" class="btn btn-default">Detail</a>
                    <button class="btn btn-default btn-supp" type="submit">Delete</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $employes->links() }}
    </div>
<div>

@endsection