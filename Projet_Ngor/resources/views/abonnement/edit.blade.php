@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update abonnement</h1>

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
        <form method="post" action="{{ route('abonnement.update', $abonnement->id) }}">
            @method('PATCH') 
            @csrf
           
            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" name="date" value={{ $abonnement->date }} />
            </div>

            <div class="form-group">
                <label for="cumulanc">Cummule Ancienne:</label>
                <input type="text" class="form-control" name="cumulanc" value={{ $abonnement->cumulanc }} />
            </div>
            <div class="form-group">
                <label for="cumulnouv">Cummule Nouvelle:</label>
                <input type="text" class="form-control" name="cumulnouv" value={{ $abonnement->cumulnouv }} />
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection