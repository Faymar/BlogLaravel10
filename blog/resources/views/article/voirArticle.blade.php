@extends('layout.master')
@section('contenue')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="d-flex align-items-center justify-content-center mb-2">
            <div class="col-sm-12 col-md-12 col-xl-12">
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
                        <div class="row">
                            <div class="col-md-1">
                                <a href="{{'/article/modifier/'.$article->id}}" type="button" class="btn btn-primary badge rounded-pill bg-light m-1">modifier</a>
                            </div>
                            <div class="col-md-2">
                                <form action="{{'/article/supprimer/'.$article->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button href="" type="submit" class="btn btn-primary badge rounded-pill bg-light m-1">Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <h4 class="card-title">Commentaires</h4>
                        <ul class="nav nav-pills flex-column">
                            @foreach ($commentaires as $commentaire)
                            <li class="nav-item">
                                <div class="row">
                                    <div class="col-md-10">
                                        <a class="nav-link" href="#">{{$commentaire->commentaire}}</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a href="{{'/commentaire/modifier/'.$commentaire->id}}" type="button" class="btn btn-primary badge rounded-pill bg-light m-1">modifier</a>
                                    </div>
                                    <div class="col-md-1">
                                        <form action="{{'/commentaire/supprimer/'.$commentaire->id}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button href="" type="submit" class="btn btn-primary badge rounded-pill bg-light m-1">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="d-flex align-items-center justify-content-center mb-2">
                <div class="col-sm-12 col-md-12 col-xl-12">
                    <form action="{{'/ajouterCommentaire'}}" method="post">
                        <input type="hidden" name="articles_id" value="{{$article->id}}">
                        <div class="input-group mb-3">
                            {{ method_field('post')}}
                            @csrf
                            <input type="text" name="commentaire" class="form-control" placeholder="ajouter un commentaire" aria-label="Recipient's username" aria-describedby="button-addon2">

                            <button class="btn btn-primary" type="submit" id="button-addon2">Commenter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection