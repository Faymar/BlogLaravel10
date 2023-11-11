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

                @if (Session::has('status'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>Well done!</strong> {{ Session::get('status')}}.
                </div>
                @endif

                <form action="{{'/commentaire/modifier/'.$commentaire->id.'/edit'}}" method="post">
                    {{ method_field('PATCH')}}
                    @csrf
                    <legend>Modifier Commentaire</legend>
                    <div class="form-group">
                        <label class="form-label mt-4">Contenue</label>
                        <textarea class="form-control" name="commentaire" rows="5">{{$commentaire->commentaire}}</textarea>
                    </div><br> 
                    <button type="submit" class="btn btn-primary badge rounded-pill bg-light">Modifier</button>
                    <!-- categories -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection