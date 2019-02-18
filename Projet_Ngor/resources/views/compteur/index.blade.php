@extends('base')

@section('main')
<ul class="nav nav-tabs">
<li class="nav-item">
    <a class="nav-link active" href="{{route('home')}}">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{route('compteur.index')}}">Compteur</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('abonnement.index')}}">Abonnement</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{route('facture.index')}}">Facture</a>
  </li>
  
</ul>



<div class="row">


<div class="col-sm-12">

    <h1 class="display-3">Compteur</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Numero</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($compteur as $compteur)
        <tr>
            <td>{{$compteur->id}}</td>
            <td>{{$compteur->numero}} </td>
            <td>
                <a href="{{ route('compteur.edit',$compteur->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('compteur.destroy', $compteur->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>

<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>

<div>
    <a style="margin: 19px;" href="{{ route('compteur.create')}}" class="btn btn-primary">New Compteur</a>
</div> 


@endsection