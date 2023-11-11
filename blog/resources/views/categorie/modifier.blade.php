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

                <form action="{{'/categorie/modifier/'.$categorie->id.'/edit'}}" method="post">
                    {{ method_field('PATCH')}}
                    @csrf
                    <legend>Modifier Categorie</legend>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label mt-4">Categorie</label>
                        <input type="text" class="form-control" name="categorie" value="{{$categorie->categorie}}" placeholder="Entrer le nom de la categorie">
                    </div><br>
                    <button type="submit" class="btn btn-primary badge rounded-pill bg-light">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection