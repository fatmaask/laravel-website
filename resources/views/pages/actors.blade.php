@extends('layouts.layout')

@section('title')
  Actors
@stop

@section('container-fluid')
<h3 class="page-header">All Actors</h3>
<div class="col-lg-12 col-md-12">
  @foreach ($actors as $actor)

  <div class="col-lg-3 col-md-3 movie-items">
    <div class="panel panel-primary">
      <a href="/actor/{{$actor->image}}" class="user-list-size">
        <img src="/static/img/{{$actor->image}}.jpg" class="image img-responsive center-block movie-image " alt="{{ $actor->name }}">
        <span class="fixed-title ">{{$actor->name}}</span>
      </a>
    </div>
  </div>
  @endforeach
</div>
<div class="col-md-12 col-lg-12 paginate">
  {!! $actors->render() !!}
</div>

@stop
