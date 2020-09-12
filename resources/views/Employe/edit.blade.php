@extends('layout.back')

@section('content')
<div class="content-page-form">
  <div class="row justify-content-center">
    <div class="col-sm-7">
      <h1 class="titre-page-form">Modifier Employe</h1>
      <div class="bloc-formulaire-page">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
          </div><br />
        @endif
        {{Form::open(['method'=>'patch','route' => ['employe.update',$employe->id]])}}
          @csrf
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nom :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->name}}" name="name"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">CIN :</label>
            <div class="col-sm-7 text-right">  
            <input type="text" class="form-control" value="{{$employe->CIN}}" name="cin"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Status :</label>
            <div class="col-sm-7 text-right select-bloc">  
              <select class="form-control" name="status">
                <option value="1">Activer</option>
                <option value="0">Desactiver</option>
              </select>
            </div> 
          </div>
          @if(isset($societes))
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Societe :</label>
            <div class="col-sm-7 text-right select-bloc">  
              <select class="form-control" name="idSociete">
                <option value="">--------------</option>
                @foreach($societes as $societe)
                <option value="{{$societe->id}}">{{$societe->name}}</option>
                @endforeach
              </select>
            </div> 
          </div>    
          @endif    
          <div class="bloc-btn-page-form">
            <button type="submit" class="btn btn-default">Modifier</button>
          </div>
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection