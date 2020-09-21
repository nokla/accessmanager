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
          </div><br />
        @endif
        {{Form::open(['method'=>'patch','route' => ['user.update',$user->id]])}}
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nom* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$user->name}}" name="name"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Prenom* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $user->prenom }}" name="prenom"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Email* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$user->email}}" name="email"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone 1 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $user->telephone1 }}" name="telephone1"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone 2 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $user->telephone2 }}" name="telephone2"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Password :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" name="password"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Societe* :</label>
            <div class="col-sm-7 text-right select-bloc">  
              <select name="idSociete" value="" class="form-control">
                <option value="">--------------</option>
                @foreach($societes as $societe)
                  @if($societe->id==$user->idSociete)
                    <option value="{{$societe->id}}" selected>{{$societe->name}}</option>
                  @else
                  <option value="{{$societe->id}}">{{$societe->name}}</option>
                  @endif
                @endforeach
              </select>
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