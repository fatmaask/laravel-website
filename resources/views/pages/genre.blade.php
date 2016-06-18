@extends('layouts.layout')

@section('title')
@if($genres_movie)
  {{$genres_movie[0]->genre}}
@endif
@stop
@section('container-fluid')
@if($genres_movie)
<h3 class="page-header">{{$genres_movie[0]->genre}}</h3>

  @foreach ($genres_movie as $movie)
  <div class="col-lg-3 col-md-3 movie-items">
    <div class="panel panel-primary">
      <a href="/movie/{{$movie->id}}/{{$movie->img}}" class="user-list-size">
        <img src="/static/img/{{$movie->img}}.jpg" class="img-responsive center-block movie-image" alt="{{ $movie->title }}">
        <span class="fixed-title ">{{$movie->title}}</span>
      </a>
    </div>
  </div>
  @endforeach
@else
  <h4 class="page-header">No movies found</h4>
@endif
@stop
