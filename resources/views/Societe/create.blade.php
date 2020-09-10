@extends('layout.back')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-7">Ajouter Societe</h1>
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
        {{Form::open(['route' => 'societe.store'])}}
          @csrf
          <div class="form-group">    
              <label for="name">Nom Societe:</label>
              <input type="text" class="form-control" name="name"/>
          </div>                               
          <button type="submit" class="btn btn-primary-outline">Ajouter</button>
          {{ Form::close() }}
  </div>
</div>
</div>
@endsection