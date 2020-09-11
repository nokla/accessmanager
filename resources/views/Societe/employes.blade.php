@extends('layout.back')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-7">Ajouter Employes pour societe</h1>
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
        {{Form::open(['route' => 'postaddemployes', 'files' => true])}}
            <input type="hidden" name="idSociete" value="{{$id}}" />
          <div class="form-group">    
              <label for="name">Nom Societe:</label>
              <input type="file" class="form-control" name="FileEmployes"/>
          </div>                               
          <button type="submit" class="btn btn-primary-outline">Ajouter</button>
          {{ Form::close() }}
  </div>
</div>
</div>
@endsection