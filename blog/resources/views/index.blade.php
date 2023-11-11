@extends('layout.master')
@section('contenue')
<div class="container-fluid pt-4 px-4">
    <div class="row d-flex align-items-center justify-content-between mb-2">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0"><b>Nos Articles</b></h6>
                    <a type="button" class="btn btn-outline-secondary badge rounded-pill bg-light" href="{{'/ajouterArticle'}}">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid pt-4 px-4">
    <div class="row d-flex align-items-center justify-content-center mb-2">
        @foreach ($articles as $article)
        <div class="col-md-3 m-2">
            <div class="card mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
                </svg>
                <div class="card-body">
                    <h4 class="card-title">{{$article->titre}}</h4>
                    <h6 class="card-subtitle text-muted">categorie(s): {{$article->categorie}}</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">{{$article->contenue}}</p>
                    <a href="{{'/article/'.$article->id}}" type="button" class="btn btn-outline-light badge rounded-pill bg-light">Voir plus</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection