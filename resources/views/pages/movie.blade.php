@extends('layouts.layout')

@section('title')
  {{$movie ->title}}
@stop

@section('container-fluid')
<div class="movie-about col-md-9 col-lg-9">

  <h3 class="page-header">{{$movie ->title}}</h3>
  <div class="col-lg-9 col-md-9 video">
    <div class="embed-responsive embed-responsive-16by9 ">
      <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/{{$movie->video}}"></iframe>
    </div>
  </div>
  @if(!Auth::guest())
  <div class="col-lg-3 col-md-3">
    <form method="post" action="/movie/{{$movie->id}}/{{$movie->img}}/addToWatchlist">
      <button type="submit" class="btn btn-default btn-lg pull-right">
        <span class="fa fa-plus" aria-hidden="true" title="Add to Watchlist"></span>
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
      </button>
    </form>
  </div>
  @endif
  <div class="movie-about col-md-12 col-lg-12">
    <div class="col-lg-3 col-md-3">
      <div class="panel panel-primary">
        <a href="#"><img src="/static/img/{{$movie->img}}.jpg" class="img-responsive center-block" alt="{{ $movie->title }}"></a>
      </div>
    </div>
    <div class="col-lg-9 col-md-9">
      <p><b>Rating: </b> {{ round($movie->rating,2) }}</p>
      <p><b>Release Date:</b> {{ $movie->year }}</p>
      <p><b>Country: </b>
      @foreach($countries as $country)
        {{$country->country}}
      @endforeach
      <p><b>Runtime:</b> {{ $movie->runtime }} min.</p>
      <p><b>Genre:</b>
      @foreach($genres as $genre)
        {{$genre->genre}}
      @endforeach
      <p><b>Actors:</b>
      @foreach($actors as $actor)
        <a href='/actor/{{$actor->image}}'> {{$actor->name}} </a>
      @endforeach
      </p>
      <p><b>Directors:</b>
      @foreach($directors as $director)
        {{$director->name}}
      @endforeach
      </p>
      <p><b>Writers:</b>
      @foreach($writers as $writer)
        {{$writer->name}}
      @endforeach
      </p>

      <p><b>Productor:</b>
      @foreach($productors as $productor)
        {{$productor->name}}
      @endforeach
      </p>
    </div>

    <div class="col-lg-12 col-md-12 synopsis">
      <h4>Synopsis</h4>
      <p> {{ $movie->synopsis }}</p>
    </div>
    @if(!Auth::guest())
    <div class="col-lg-12 col-md-12">
      <hr>
      <h4> Write a comment </h4>
      <form method="post" action="/movie/{{$movie->id}}/{{$movie->img}}/comments">
        <div class="form-group">
          <textarea name="comment" class="form-control"></textarea>
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Send</button>
        </div>
      </form>
    </div>
    @endif
    @if($comments)
    <div class="col-lg-12 col-md-12">
      <hr>
      <h4> Comments </h4>
      @foreach ($comments as $comment)
      <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $comment->created_at) ?>
      <div class="comment">
        <p class="header"><b class="username" >{{$comment->name}}</b> |  <span class="created_at">{{$comment->created_at}}</span></p>
        

         <p>{{$comment->comment}}</p>

      </div>
       @endforeach
     
    </div>
    @endif
  </div>

</div>
<div class="col-lg-3 col-md-3 similar">
  <h4 class="page-header">Similar Movies</h4>
  @foreach ($similar_movies as $movie)

  <div class="col-lg-6 col-md-6">
    <div class="panel panel-primary">
      <a href="/movie/{{$movie->id}}/{{$movie->img}}">
        <font title="{{ $movie->title }}"><img src="/static/img/{{$movie->img}}.jpg" class="img-responsive center-block movie-image" alt="{{ $movie->title }}"></font>
      </a>
    </div>
  </div>
  @endforeach

</div>

@stop
