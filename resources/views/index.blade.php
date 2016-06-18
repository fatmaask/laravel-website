@extends('layouts.layout')

@section('title')
  DWP Project
@stop

@section('container-fluid')

  <h3 class="page-header">Movies in Theaters</h3>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[0]->id}}/{{$movies[0]->img}}"><img src="static/img/{{$movies[0]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[1]->id}}/{{$movies[1]->img}}"><img src="static/img/{{$movies[1]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[2]->id}}/{{$movies[2]->img}}"><img src="static/img/{{$movies[2]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[3]->id}}/{{$movies[3]->img}}"><img src="static/img/{{$movies[3]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[4]->id}}/{{$movies[4]->img}}"><img src="static/img/{{$movies[4]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[5]->id}}/{{$movies[5]->img}}"><img src="static/img/{{$movies[5]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[6]->id}}/{{$movies[6]->img}}"><img src="static/img/{{$movies[6]->img}}.jpg" alt="..."></a>
    </div>
    <div class="item">
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[7]->id}}/{{$movies[7]->img}}"><img src="static/img/{{$movies[7]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[8]->id}}/{{$movies[8]->img}}"><img src="static/img/{{$movies[8]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[9]->id}}/{{$movies[9]->img}}"><img src="static/img/{{$movies[9]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[10]->id}}/{{$movies[10]->img}}"><img src="static/img/{{$movies[10]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[11]->id}}/{{$movies[11]->img}}"><img src="static/img/{{$movies[11]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[12]->id}}/{{$movies[12]->img}}"><img src="static/img/{{$movies[12]->img}}.jpg" alt="..."></a>
      <a class="movie-item col-md-3 col-lg-3" href="/movie/{{$movies[13]->id}}/{{$movies[13]->img}}"><img src="static/img/{{$movies[13]->img}}.jpg" alt="..."></a>
    </div>

  </div>

  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!--
<div class="searchform">
  <h3 class="page-header">Search a Movie</h3>
<form action="/search" method="get">
    <label for="query"></label>
    <input type="text" class="form-control search" placeholder="search a movie"  name="query">
    <button type="submit" class="btn btn-default"><i class="fa fa-search fa-fw"></i> Search</button>
 </form>
</div> -->


@stop
