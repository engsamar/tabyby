@extends('homeViewLayout')
@section('css')
	    <!-- Bootstrap css file-->
    <link href="/css/error/bootstrap.min.css" rel="stylesheet">
    <!-- Font awesome css file-->
    <link href="/css/error/font-awesome.min.css" rel="stylesheet">
    <!-- Superslide css file-->
    <link rel="stylesheet" href="/css/error/superslides.css">
    <!-- Slick slider css file -->
    <link href="/css/error/slick.css" rel="stylesheet"> 
    <!-- Circle counter cdn css file -->
    <link rel='stylesheet prefetch' href='https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master//css/jquery.circliful.css'>  
    <!-- smooth animate css file -->
    <link rel="stylesheet" href="/css/error/animate.css"> 
    <!-- preloader -->
    <link rel="stylesheet" href="/css/error/queryLoader.css" type="text/css" />
    <!-- gallery slider css -->
    <link type="text/css" media="all" rel="stylesheet" href="/css/error/jquery.tosrus.all.css" />    
    <!-- Default Theme css file -->
    <link id="switcher" href="/css/error/themes/default-theme.css" rel="stylesheet">
   <link href="/css/error/style.css" rel="stylesheet">
@endsection
@section('content')
    <section id="errorpage">
      <div class="container">
        <div class="error_page_content">
             <h1>404</h1>
             <h2>Sorry :(</h2>
             <h3>This page doesn't exist or You don't allow to show it </h3>
             <p class="wow fadeInLeftBig animated" style="visibility: visible; animation-name: fadeInLeftBig;">Please, continue to our <a href="/">Home page</a></p>
           </div>
      </div>
    </section>
@endsection
