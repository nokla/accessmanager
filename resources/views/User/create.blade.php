@extends('layout.back')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-7">Ajouter utilisateur</h1>
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
        {{Form::open(['route' => 'user.store'])}}
          @csrf
          <div class="form-group">    
              <label for="name">Nom :</label>
              <input type="text" class="form-control" name="name"/>
          </div>  
          <div class="form-group">    
              <label for="email">email :</label>
              <input type="text" class="form-control" name="email"/>
          </div>  
          <div class="form-group">    
              <label for="password">Password :</label>
              <input type="text" class="form-control" name="password"/>
          </div>  
          <div class="form-group">    
                <label for="name">Societe :</label>
                <select name="idSociete">
                    <option value="">--------------</option>
                    @foreach($societes as $societe)
                        <option value="{{$societe->id}}">{{$societe->name}}</option>
                    @endforeach
                </select>
          </div>                               
          <button type="submit" class="btn btn-primary-outline">Ajouter</button>
          {{ Form::close() }}
  </div>
</div>
</div>
@endsection