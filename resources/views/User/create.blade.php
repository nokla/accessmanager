@extends('layout.back')

@section('content')
<div class="content-page-form">
  <div class="row justify-content-center">
    <div class="col-sm-7">
      <h1 class="titre-page-form">Ajouter utilisateur</h1>
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
        {{Form::open(['route' => 'user.store'])}}
          @csrf
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nom :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" name="name"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Email :</label>
            <div class="col-sm-7 text-right">  
              <input type="email" class="form-control" name="email"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Password :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" name="password"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Societe :</label>
            <div class="col-sm-7 text-right">  
              <select name="idSociete" class="form-control">
                <option value="">--------------</option>
                @foreach($societes as $societe)
                <option value="{{$societe->id}}">{{$societe->name}}</option>
                @endforeach
              </select>
            </div> 
          </div>
          <div class="bloc-btn-page-form">
            <button type="submit" class="btn btn-default">Ajouter</button>
          </div>  
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>
@endsection