@extends('layout.back')

@section('content')
<div class="content-page-form">
  <div class="row justify-content-center">
    <div class="col-sm-7">
      <h1 class="titre-page-form">Employe</h1>
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
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nom :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->name}}" disabled name="name"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">CIN :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->CIN}}" disabled name="cin"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Prenom :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->prenom }}" disabled name="prenom"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone* 1 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->telephone1 }}" disabled name="telephone1"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Téléphone 2 :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->telephone2 }}" disabled name="telephone2"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Email :</label>
            <div class="col-sm-7 text-right">  
              <input type="email" class="form-control" value="{{ $employe->email }}" disabled name="email"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Sexe :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->sexe }}" disabled name="sexe"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Etat covid :</label>
            <div class="col-sm-7 text-right">
                @if($employe->etatcovid == 1)
                  <input type="text" class="form-control" value="Guérit" disabled />
                @endif
                @if($employe->etatcovid == 2)
                  <input type="text" class="form-control" value="Mort" disabled />
                @endif
                @if($employe->etatcovid == 3)
                  <input type="text" class="form-control" value="Positif" disabled />
                @endif
                @if($employe->etatcovid == 4)
                  <input type="text" class="form-control" value="Négative" disabled />
                @endif
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Status :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->status == 1 ? 'Active' : 'Desactiver' }}" disabled name="status"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Raison status :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->raison }}" disabled name="raison"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Societe :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->Societe->name}}" disabled name="societe"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Adresse* :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->adresse }}" disabled name="adresse"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Date naissances :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->birthdate }}" disabled name="birthdate"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Nationalité :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->nationalite }}" disabled name="nationalite"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Situation familial :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{ $employe->situation }}" disabled name="situation"/>
            </div> 
          </div> 
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">QrCode :</label>
            <div class="offset-sm-5 col-sm-7 text-right">  
              <p><img src="/{{$employe->qrcode}}" /></p>
            </div> 
          </div>  
          <div class="bloc-btn-page-form">
            <a href="/{{$employe->qrcode}}" class="btn btn-default"><i class="fas fa-download"></i> Telecharger</a>
          </div>                   
      </div>
    </div>
  </div>
</div>
@endsection