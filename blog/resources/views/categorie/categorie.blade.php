@extends('layout.master')
@section('contenue')
<div class="container-fluid pt-4 px-4">
    <div class="row d-flex align-items-center justify-content-between mb-2">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="h-100 bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0"><b>Liste Categories</b></h6>
                    <a type="button" class="btn btn-outline-secondary badge rounded-pill bg-light" href="{{'/ajouterCategorie'}}">Ajouter</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid pt-4 px-4">
    <div class="row d-flex align-items-center justify-content-between mb-2">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <table class="table table-hover">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Categories</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $categorie)
                    <tr>
                        <td scope="row">{{$categorie->categorie}}</td>
                        <td><a class="btn btn-primary badge rounded-pill bg-light" href="{{'/categorie/modifier/'.$categorie->id}}">modifier</a></td>
                        <td>
                            <form action="{{'/categorie/supprimer/'.$categorie->id}}" method="post">
                                {{ method_field('DELETE')}}
                                @csrf
                                <button type="submit" class="btn btn-primary badge rounded-pill bg-light">supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection