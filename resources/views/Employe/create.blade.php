@extends('layout.back')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-7">Ajouter Employe</h1>
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
        {{Form::open(['route' => 'employe.store'])}}
          @csrf
          <div class="form-group">    
              <label for="name">Nom :</label>
              <input type="text" class="form-control" name="name"/>
          </div>  
          <div class="form-group">    
              <label for="cin">CIN :</label>
              <input type="text" class="form-control" name="cin"/>
          </div>  
          <div class="form-group">    
              <label for="status">Status :</label>
                <select class="form-control" name="status">
                    <option value="1">Activer</option>
                    <option value="0">Desactiver</option>
                </select>
          </div>  
          @if(isset($societes))
          <div class="form-group">    
                <label for="name">Societe :</label>
                <select class="form-control" name="idSociete">
                    <option value="">--------------</option>
                    @foreach($societes as $societe)
                        <option value="{{$societe->id}}">{{$societe->name}}</option>
                    @endforeach
                </select>
          </div>       
          @endif                        
          <button type="submit" class="btn btn-primary-outline">Ajouter</button>
          {{ Form::close() }}
  </div>
</div>
</div>
@endsection