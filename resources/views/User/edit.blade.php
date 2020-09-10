@extends('layout.back')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-7">Modifier Societe</h1>
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
        {{Form::open(['method'=>'patch','route' => ['user.update',$user->id]])}}
            <div class="form-group">    
                <label for="name">Nom :</label>
                <input type="text" class="form-control" value="{{$user->name}}" name="name"/>
            </div>  
            <div class="form-group">    
                <label for="email">email :</label>
                <input type="text" class="form-control" value="{{$user->email}}" name="email"/>
            </div>  
            <div class="form-group">    
                <label for="password">Password :</label>
                <input type="text" class="form-control" name="password"/>
            </div>  
            <div class="form-group">    
                    <label for="name">Societe :</label>
                    <select name="idSociete" value="">
                        <option value="">--------------</option>
                        @foreach($societes as $societe)
                            <option value="{{$societe->id}}">{{$societe->name}}</option>
                        @endforeach
                    </select>
            </div>                              
          <button type="submit" class="btn btn-primary-outline">Modifier</button>
          {{ Form::close() }}
  </div>
</div>
</div>
@endsection