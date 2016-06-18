@extends('layouts.layout')

@section('title')
  Latest Movies
@stop

@section('container-fluid')
<div class="movie-about col-md-9 col-lg-9">

  <h3 class="page-header">{{$actor ->name}}</h3>
  <div class="col-lg-9 col-md-9 video">
    <div class="embed-responsive embed-responsive-16by9 ">
      <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$actor->video}}"></iframe>
    </div>
  </div>

  <!-- 16:9 aspect ratio -->
  <div class="movie-about col-md-12 col-lg-12">
    <div class="col-lg-3 col-md-3">
      <div class="panel panel-primary">
        <img src="/static/img/{{$actor->image}}.jpg" class="img-responsive center-block " alt="{{ $actor->name }}">
      </div>
    </div>

    <div class="col-lg-9 col-md-9">
      <p><b>Date of Birth: </b> {{ $actor->birthdate }}</p>
      <p><b>Country: </b>{{ $actor_country->country }}</p>

    </div>

    <div class="col-lg-12 col-md-12">
      <h4>Biography</h4>
      <p>{{ $actor->bio }}</p>
    </div>
    <div class= "col-lg-9 col-md-9">
      <h3>Filmography</h3>

      @foreach ($actor_movies as $movie)
      <div class="col-lg-3 col-md-3 movie-items">
        <div class="panel panel-primary">
          <a href="/movie/{{$movie->id}}/{{$movie->img}}"><img src="/static/img/{{$movie->img}}.jpg" class="img-responsive center-block movie-image" alt="{{ $movie->title }}"></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>


@stop
