<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Movie;
use App\Watch;
use App\Http\Controllers\Controller;
use DB;
class PageControllers extends Controller
{
  public function getIndex()
  {
    $movies = DB::select('select * from movies order by release_date desc limit 14');
    return view('index' , compact('movies'));
  }
  public function getLatest()
  {
    $movies =  DB::select('select * from movies order by release_date desc ');
    return view('pages.latest')->with('movies', $movies);
  }
  public function getMovies()
  {
    $movies =  DB::select('select * from movies ');
    return view('pages.movies')->with('movies', $movies);
  }
  public function getTop20()
  {
    $movies =  DB::select('select * from movies order by rating desc limit 20 ');
    return view('pages.top20')->with('movies', $movies);
  }
  public function getActors()
  {
    $actors = DB::table('actors')->paginate(18);
    return view('pages.actors', ['actors'=> $actors]);
  }
  public function getGenre($id)
  {
    $genres_movie =DB::select('select * from genre, movie_genre, movies where genre.genre_id = movie_genre.genre_id and
                              movies.id = movie_genre.movie_id and genre.genre = :id', ['id'=> $id]);
    return view('pages.genre', compact('genres_movie'));
  }
  public function getAbout()
  {
    return view('pages.about');
  }

  public function getMovie($movie_id, $name){

    $movie =  DB::select('select * from movies where movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name])[0];
    $actors = DB::select('select * from actors, movie_actor, movies where actors.actor_id = movie_actor.actor_id and movies.id=movie_actor.movie_id and  movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name]);
    $directors = DB::select('select * from director, movies where movies.director_id = director.director_id and  movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name]);
    $writers = DB::select('select * from writers, movie_writer, movies where writers.writer_id = movie_writer.writer_id and movies.id = movie_writer.movie_id and  movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name]);
    $countries = DB::select('select * from countries, movie_country, movies where countries.country_id = movie_country.country_id and movies.id=movie_country.movie_id and  movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name]);
    $genres = DB::select('select * from genre, movie_genre, movies where genre.genre_id = movie_genre.genre_id and movies.id=movie_genre.movie_id and  movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name]);
    $productors = DB::select('select * from productors, movie_productor, movies where productors.productor_id = movie_productor.productor_id and movies.id=movie_productor.movie_id and  movies.id = :id and img = :name', ['id' => $movie_id, 'name'=>$name]);
    $similar_movies;
    foreach ($genres as $key => $value) {
      $similar_movies = DB::select('select * from movies, movie_genre where movies.id = movie_genre.movie_id and movie_genre.genre_id = :id',['id'=> $value->genre_id]);
    }
    $similar_movies = array_slice($similar_movies, 0, 6);
    $comments = DB::select('select * from comments, movies, users where comments.movie_id = movies.id and users.id = comments.user_id and movies.id = :id order by comments.created_at desc', ['id'=>$movie_id]);
    return view('pages.movie', compact('movie', 'actors', 'directors', 'writers', 'countries', 'genres', 'productors', 'similar_movies', 'comments'));
  }

  
  public function getActor($id){
    $actor = DB::select('select * from actors where image= :id', ['id' => $id])[0];
    $actor_movies = DB::select('select * from movies, movie_actor, actors where movies.id = movie_actor.movie_id and actors.actor_id=movie_actor.actor_id and image = :id', ['id' =>$id]);
    $actor_country = DB::select('select * from countries, actors where countries.country_id = actors.country_id and image = :id', ['id' =>$id])[0];
    return view('pages.actor', compact('actor', 'actor_movies', 'actor_country'));

  }

  public function getLogin(){
    return view('auth.login');
  }

  public function getUser($id){
    $user =  DB::select("select * from users where id=:id", ['id'=>$id])[0];
    $user_movies = DB::select("select * from watches, movies where  movies.id=watches.movie_id and watches.user_id = :id", ['id'=>$id]);
    $user_comments = DB::select("select * from comments, movies where movies.id = comments.movie_id and comments.user_id=:id", ['id'=>$id]);
    return view('pages.user' , compact('user', 'user_movies', 'user_comments'));
  }

  public function addToWatchlist(Request $request, Movie $movie_id)
  {
    //var_dump(Auth::user());
    $addMovie = new Watch;
    $addMovie->user_id = $request->user_id;
    $movie_id->addToWatchlist()->save($addMovie);
    return back();
  }
}
