@extends('layout.back')

@section('content')
<div class="content-page-form">
  <div class="row justify-content-center">
    <div class="col-sm-7">
      <h1 class="titre-page-form">Ajouter Employe</h1>
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
        {{Form::open(['route' => 'employe.store'])}}
          @csrf
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nom* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('name') }}" name="name"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">CIN* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('cin') }}" name="cin"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Prenom :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('prenom') }}" name="prenom"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone* 1 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('telephone1') }}" name="telephone1"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone 2 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('telephone2') }}" name="telephone2"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Email :</label>
            <div class="col-sm-7 text-right">  
              <input type="email" class="form-control" value="{{ old('email') }}" name="email"/>
            </div> 
          </div>
          @if(isset($societes))
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Societe* :</label>
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
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Adresse* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('adresse') }}" name="adresse"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Date naissances :</label>
            <div class="col-sm-7 text-right">  
              <input type="date" class="form-control" value="{{ old('birthdate') }}" name="birthdate"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nationalité :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('nationalite') }}" name="nationalite"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Sexe :</label>
              <div class="col-sm-7 text-left">  
                <input type="radio" id="male" name="sexe" value="M">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sexe" value="F">
                <label for="female">Female</label><br>
              </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Situation familial :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('situation') }}" name="situation"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Status :</label>
            <div class="col-sm-7 text-right select-bloc">  
              <select class="form-control" name="status">
                <option value="">--------------</option>
                <option value="1">Activer</option>
                <option value="0">Desactiver</option>
              </select>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Raison status :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ old('raison') }}" name="raison"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Etat covid :</label>
            <div class="col-sm-7 text-right select-bloc">
              <select class="form-control" name="etatcovid">
                <option value="">--------------</option>
                <option value="1">Guérit</option>
                <option value="2">Mort</option>
                <option value="3">Positif</option>
                <option value="4">Négative</option>
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