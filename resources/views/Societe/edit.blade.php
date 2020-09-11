@extends('layout.back')

@section('content')
<div class="content-page-form">
  <div class="row justify-content-center">
    <div class="col-sm-7">
      <h1 class="titre-page-form">Modifier Societe</h1>
      <div class="bloc-formulaire-page">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div>
          <br />
        @endif
          {{Form::open(['method'=>'patch','route' => ['societe.update',$societe->id]])}}
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Nom Societe :</label>
              <div class="col-sm-7 text-right">  
                <input type="text" class="form-control" value="{{$societe->name}}" name="name"/>
              </div>            
            </div>
            <div class="bloc-btn-page-form">
              <button type="submit" class="btn btn-default">Modifier</button>
            </div>  
          {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection