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
            <label class="col-sm-5 col-form-label">Status :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->status === 1 ? 'Active' : 'Desactiver' }}" disabled name="status"/>
            </div> 
          </div>
          <div class="form-group row align-items-center">
            <label class="col-sm-5 col-form-label">Status :</label>
            <div class="col-sm-7 text-right">  
              <input type="text" class="form-control" value="{{$employe->Societe->name}}" disabled name="societe"/>
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