@extends('layouts.layout')

@section('title')
  About Me
@stop


@section('container-fluid')

   <div class="card card-block ">
        
        <img class="image img-responsive center-block " src="/static/img/top250.jpg">
        <h3 class="about-header">CENG 3502 - Dynamic Web Programming Project</h3>
        <div class="about-content">
        	<p>This project was built with </p>
       		<ul class="list-group about-page">
	            <li  class="list-group-item"> Laravel</li>
	            <li class="list-group-item">  Bootstrap</li>
	            <li class="list-group-item">  PhpMyAdmin</li>
        	</ul>
        	<p>by <b>Fatma Aşık.</b></p>
        </div>
        
    </div>
@stop
