@extends('layout.back')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-7">Employe</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
          <div class="form-group">    
              <label for="name">Nom :</label>
              <input type="text" class="form-control" value="{{$employe->name}}" disabled name="name"/>
          </div>  
          <div class="form-group">    
              <label for="cin">CIN :</label>
              <input type="text" class="form-control" value="{{$employe->CIN}}" disabled name="cin"/>
          </div>  
          <div class="form-group">    
              <label for="status">Status :</label>
              <input type="text" class="form-control" value="{{$employe->status === 1 ? 'Active' : 'Desactiver' }}" disabled name="status"/>
          </div>  
          <div class="form-group">    
              <label for="societe">Societe :</label>
              <input type="text" class="form-control" value="{{$employe->Societe->name}}" disabled name="societe"/>
          </div> 
          <div class="form-group">    
              <label for="societe">QrCode :</label><br>
              <img src="/{{$employe->qrcode}}" /><br>
              <a href="/{{$employe->qrcode}}">Telecharger</a>
          </div>                        
  </div>
</div>
</div>
@endsection