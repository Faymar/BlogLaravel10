@extends('layout.master')
@section('contenue')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="d-flex align-items-center justify-content-center mb-2">
            <div class="col-sm-12 col-md-4 col-xl-4">
                @if(count($errors) > 0)
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    @foreach($errors->all() as $error)
                    <p> {{$error}} </p>
                    @endforeach
                </div><br>
                @endif

                <form action="{{'/articles/ajouter'}}" method="post">
                    {{ method_field('post')}}
                    @csrf
                    <legend>Ajouter Article</legend>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label mt-4">Article</label>
                        <input type="text" class="form-control" name="titre" placeholder="Entrer le nom de l'article">
                    </div>
                    <div class="form-group">
                        <label class="form-label mt-4">Contenue</label>
                        <textarea class="form-control" name="contenue" rows="5"></textarea>
                    </div>
                    <label class="form-label mt-4">categories</label>
                    <div class="row">
                        @foreach ($categories as $categorie)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" name="categorie[]" type="checkbox" value="{{$categorie->categorie}}" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{$categorie->categorie}}
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary badge rounded-pill bg-light">Ajouter</button>
                    <!-- categories -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection