@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Nouveau Abonnement</h1>
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
      <form method="post" action="{{ route('abonnement.store') }}">
          @csrf
          <div class="form-group">    
              <label for="contrat">Contrat:</label>
              <input type="text" class="form-control" name="contrat"/>
          </div>

          <div class="form-group">
              <label for="date">Date:</label>
              <input type="date" class="form-control" name="date"/>
          </div>

          <div class="form-group">
              <label for="cumulanc">Cummul Ancien:</label>
              <input type="text" class="form-control" name="cumulanc"/>
          </div>
          <div class="form-group">
              <label for="cumulnouv">Cummul Nouveau:</label>
              <input type="text" class="form-control" name="cumulnouv"/>
          </div>

          <div class="form-group">
              <label for="compteur_id">compteur:</label>
              <select name="compteur_id"  class="form-control" id="compteur_id">
               @foreach($compteurs as $key => $value)
                <option value="{{ $key }}"> {{ $value }} </option>
               @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary-outline">Abonner</button>
      </form>
  </div>
</div>
</div>
@endsection