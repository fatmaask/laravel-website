@extends('layouts.layout')

@section('title')
  User Profile
@stop


@section('container-fluid')
<div class="col-lg-9 col-md-9">
    <h3 class="page-header">{{$user->name}}</h3>
</div>
<div class="col-lg-9 col-md-9">
    <h4 >Watched Movies (  {{count($user_movies)}} )</h4>

      @foreach ($user_movies as $movie)

      <div class="col-lg-3 col-md-3 movie-items">
        <div class="panel panel-primary">
          <a href="/movie/{{$movie->id}}/{{$movie->img}}">
            <img src="/static/img/{{$movie->img}}.jpg" class="img-responsive center-block movie-image" alt="{{ $movie->title }}">
          </a>
        </div>
      </div>
      @endforeach
</div>
      @if($user_comments)
      <div class="col-lg-9 col-md-9">
        <hr>
        <h4> Comments (  {{count($user_comments)}} )</h4>
         @foreach ($user_comments as $comment)
      <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $comment->created_at) ?>
      <div class="comment">
        <p class="header"><b class="username" >{{$comment->title}}</b> |  <span class="created_at">{{$comment->created_at}}</span></p>
        

         <p>{{$comment->comment}}</p>

      </div>
       @endforeach
      </div>
      @endif

@stop
