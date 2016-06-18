@extends('layouts.layout')

@section('title')
  Latest Movies
@stop

@section('container-fluid')
<h3 class="page-header">Latest Movies</h3>

  @foreach ($movies as $movie)
  <div class="col-lg-3 col-md-3 movie-items">
    <div class="panel panel-primary">
      <a href="/movie/{{$movie->id}}/{{$movie->img}}" class="user-list-size"><img src="static/img/{{$movie->img}}.jpg" class="img-responsive center-block movie-image" alt="{{ $movie->title }}"><span class="fixed-title ">{{$movie->title}}</span></a>

    </div>
  </div>
  @endforeach

@stop
