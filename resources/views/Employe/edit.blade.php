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
            <label class="col-sm-5 col-form-label">Prenom :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->prenom }}" name="prenom"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone* 1 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->telephone1 }}" name="telephone1"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone 2 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->telephone2 }}" name="telephone2"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Email :</label>
            <div class="col-sm-7 text-right">  
              <input type="email" class="form-control" value="{{ $employe->email }}" name="email"/>
            </div> 
          </div>
          @if(isset($societes))
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Societe :</label>
            <div class="col-sm-7 text-right select-bloc">  
              <select class="form-control" name="idSociete">
                <option value="">--------------</option>
                @foreach($societes as $societe)
                  @if($societe->id==$employe->idSociete)
                    <option value="{{$societe->id}}" selected>{{$societe->name}}</option>
                  @else
                  <option value="{{$societe->id}}">{{$societe->name}}</option>
                  @endif
                @endforeach
              </select>
            </div> 
          </div>    
          @endif  
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Adresse* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->adresse }}" name="adresse"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Date naissances :</label>
            <div class="col-sm-7 text-right">  
              <input type="date" class="form-control" value="{{ $employe->birthdate }}" name="birthdate"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nationalité :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->nationalite }}" name="nationalite"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Sexe :</label>
              <div class="col-sm-7 text-left">  
                @if($employe->sexe == 'M')
                <input type="radio" id="male" name="sexe" value="M" checked="checked">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sexe" value="F">
                <label for="female">Female</label><br>
                @elseif ($employe->sexe == 'F')
                <input type="radio" id="male" name="sexe" value="M">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sexe" value="F" checked="checked">
                <label for="female">Female</label><br>
                @else
                <input type="radio" id="male" name="sexe" value="M">
                <label for="male">Male</label><br>
                <input type="radio" id="female" name="sexe" value="F">
                <label for="female">Female</label><br>
                @endif
              </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Situation familial :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->situation }}" name="situation"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Status :</label>
            <div class="col-sm-7 text-right select-bloc">  
              <select class="form-control" name="status">
                <option value="">--------------</option>
                <option value="1" @if($employe->status == 1) selected @endif >Activer</option>
                <option value="0" @if($employe->status == 0) selected @endif >Desactiver</option>
              </select>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Etat covid :</label>
            <div class="col-sm-7 text-right select-bloc">
              <select class="form-control" name="etatcovid">
                <option value="">--------------</option>
                <option value="1" @if($employe->etatcovid == 1) selected @endif >Guérit</option>
                <option value="2" @if($employe->etatcovid == 2) selected @endif >Mort</option>
                <option value="3" @if($employe->etatcovid == 3) selected @endif >Positif</option>
                <option value="4" @if($employe->etatcovid == 4) selected @endif >Négative</option>
              </select>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Raison status :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->raison }}" name="raison"/>
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