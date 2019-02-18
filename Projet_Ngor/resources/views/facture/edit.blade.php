@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Modifier Facture</h1>

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
        <form method="post" action="{{ route('facture.update', $facture->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="mois">Mois:</label>
                <input type="text" class="form-control" name="mois" value={{ $facture->mois }} />
            </div>

            <div class="form-group">
                <label for="consommation">Consommation:</label>
                <input type="text" class="form-control" name="consommation" value={{ $facture->consommation}} />
            </div>

            <div class="form-group">
                <label for="prix">Prix:</label>
                <input type="text" class="form-control" name="prix" value={{ $facture->prix }} />
            </div>
            <div class="form-group">
                <label for="reglement">Réglement:</label>
                <input type="text" class="form-control" name="reglement" value={{ $facture->reglement }} />
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</div>
@endsection