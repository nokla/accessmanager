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
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Activité principale  :</label>
              <div class="col-sm-7 text-right">  
                <input type="text" class="form-control" value="{{ $societe->activite }}" name="activite"/>
              </div> 
            </div> 
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Téléphone 1 :</label>
              <div class="col-sm-7 text-right">  
                <input type="text" class="form-control" value="{{ $societe->telephone1 }}" name="telephone1"/>
              </div> 
            </div> 
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Téléphone 2 :</label>
              <div class="col-sm-7 text-right">  
                <input type="text" class="form-control" value="{{ $societe->telephone2 }}" name="telephone2"/>
              </div> 
            </div> 
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Adresse :</label>
              <div class="col-sm-7 text-right">  
                <input type="text" class="form-control" value="{{ $societe->adresse }}" name="adresse"/>
              </div> 
            </div> 
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Interlocuteur :</label>
              <div class="col-sm-7 text-right">  
                <input type="text" class="form-control" value="{{ $societe->interlocuteur }}" name="interlocuteur"/>
              </div> 
            </div> 
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Starts :</label>
              <div class="col-sm-7 text-right">  
                <input type="time" class="form-control" value="{{ Str::substr($societe->tStarts, 0, 5) }}" name="tStarts"/>
              </div> 
            </div> 
            <div class="form-group row align-items-center">
              <label class="col-sm-5 col-form-label">Remarques :</label>
              <div class="col-sm-7 text-right">  
                <textarea name="remarque" class="form-control" id="" cols="30" rows="10">{{ $societe->remarque }}</textarea>
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