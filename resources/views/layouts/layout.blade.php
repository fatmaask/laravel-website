<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::asset('assets/css/static/img/favicon.ico') }}">
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/css/plugins/morris.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">DWP Project</a>
            </div>
            <!-- Top Menu Items -->

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <li {{ (Request::is('latest') ? 'class=active' : '') }}>
                        <a href="/latest"><i class="fa fa-fw fa-film"></i> Latest </a>
                    </li>
                    <li {{ (Request::is('movies') ? 'class=active' : '') }}>
                        <a href="/movies"><i class="fa fa-fw fa-film"></i> Movies</a>
                    </li>
                    <li {{ (Request::is('top20') ? 'class=active' : '') }}>
                        <a href="/top20"><i class="fa fa-fw fa-star"></i> Top 20 </a>
                    </li>
                    <li {{ (Request::is('actors') ? 'class=active' : '') }}>
                        <a href="/actors"><i class="fa fa-fw fa-heart"></i> Actors </a>
                    </li>
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-list fa-fw"></i> Genres <i class="fa fa-caret-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                        @foreach ($genres as $genre)
                          <li><a href="/genre/{{$genre->genre}}"><i class="fa fa-fw"></i> {{$genre->genre}} </a></li>
                        @endforeach
                      </ul>
                    </li>
                    <li {{ (Request::is('about') ? 'class=active' : '') }}>
                        <a href="/about"><i class="fa fa-fw fa-user"></i> About </a>
                    </li>


                </ul>

                <ul class="nav navbar-nav navbar-right">
                  @if (Auth::guest())

                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Sign <i class="fa fa-caret-down"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li ><a href="{{url('/register')}}"><i class="fa fa-user fa-fw"></i> Sign Up </a>
                        </li>
                        <li><a href="{{url('/login')}}"><i class="fa fa-sign-in fa-fw"></i> Sign In </a>
                        </li>
                      </ul>
                    </li>
                  @else
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/user/{{ Auth::user()->id }}"><i class="fa fa-user fa-fw"></i> User Profile </a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="{{url('/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Sign out </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                  @endif
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
              <div class="row">
                @yield('container-fluid')
              </div>
            </div>
            <!-- /.container-fluid -->

          </div>
          <!-- /#page-wrapper -->


      </div>
        <!-- /#wrapper -->
        <footer class="footer">
          <div class="container">
          <p class="text-muted">© 2016 Dynamic Web Programming Project - Fatma Aşık</p>
          </div>
        </footer>
        <!-- jQuery -->
        <script src="{{ URL::asset('assets/js/jquery.js') }}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{ URL::asset('assets/js/plugins/morris/raphael.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ URL::asset('assets/js/plugins/morris/morris-data.js') }}"></script>

</body>

</html>
