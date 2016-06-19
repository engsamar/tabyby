@extends('layout')
@section('css')
@endsection
@section('content')
<!-- Page Title -->
    <article class="page-title">
    	<div class="auto-box">
        	<div class="row clearfix">
            	
                <div class="col-lg-6 col-xs-6">
                	<h2>Our Blog</h2>
                </div>
                
                <div class="col-lg-6 col-xs-6 text-right">
                	Pages / <span class="page-name">Our Blog</span>
                </div>
                
                
            </div>
        </div>
    </article>
    
    <!-- Sidebar Page -->
    <div class="sidebar-page">
    	<div class="auto-box">
            <div class="row clearfix">
              
                <!-- Left Content -->
                <section class="left-content col-lg-8 col-md-8 col-sm-7 col-xs-12 pull-left">
                	@if($posts->count())
                	@foreach($posts as $post)
                		<!-- Post -->
                    <article class="post anim-3-all animated out" data-delay="0" data-animation="fadeInUp">
                        <div class="post-image">
                            <img class="img-responsive" src="{{URL::asset('/images/posts/'.$post->picture_path )}}"  alt="img">
                            <div class="caption">
                                <div class="date"><span class="day">{{date('d', strtotime($post->created_at))}}</span><span class="month">{{date('M', strtotime($post->created_at))}}</span></div>
                                <div class="comments"><span class="flaticon-speech18"></span> &ensp; 23</div>
                            </div>
                            <a href="/blog-detail/{{$post->id}}" class="overlay"><span class="icon"></span></a>
                        </div>
                        <h2><a href="#">{{$post->title}}</a></h2>
                        <div class="desc"><p>{{$post->content}}</p></div>
                        <div class="more text-right"><a href="/blog-detail/{{$post->id}}">READ MORE &ensp; <span class="glyphicon glyphicon-arrow-right"></span></a></div>
                    </article>

                	@endforeach

                {!! $posts->render() !!}
                @endif
                </section>

                
                <!-- Side Bar -->
                <aside class="side-bar col-lg-4 col-md-4 col-sm-5 col-xs-12 pull-right anim-5-all">
                	
                    <!-- Search Form -->
                	<div class="widget search-form animated out" data-delay="0" data-animation="fadeInUp">
                    	<h2 class="border-line-left">Search</h2>
                        
                        <form method="post" action="http://demo.templatepath.com/medicon/blog.html">
                        	<div class="form-group">
                                <input type="search" name="search" value="" placeholder="search for something">
                                <input type="submit" name="submit" value="">
                            </div>
                        </form>
                        
                    </div>
                    

                    <!-- Twitter Feeds -->

                    
                    <!-- Social / Follow us -->
                    <div class="widget follow-us animated out" data-delay="300" data-animation="fadeInUp">
                    	<h2 class="border-line-left">Contact us on</h2>
                        
                        <a href="https://www.facebook.com/galals2" class="facebook"><span class="flaticon-facebook31"></span></a>
                        <a href="https://twitter.com/dr_agina?s=07" class="twitter"><span class="flaticon-twitter1"></span></a>
                        <a href="aginaclinic@gmail.com" class="google-plus"><span class="flaticon-google116"></span></a>

                    </div>
                
                
                </aside>
            
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection