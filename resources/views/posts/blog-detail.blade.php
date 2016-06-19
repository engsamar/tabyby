@extends('homeViewLayout')
@section('css')
	<link href="/css/blog/style.css" rel="stylesheet">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link href="/css/blog/responsive.css" rel="stylesheet">
@endsection
@section('content')
<!-- Page Title -->
    <article class="page-title">
    	<div class="auto-box">
        	<div class="row clearfix">
            	
                <div class="col-lg-6 col-xs-6">
                	<h2>Blog Detail</h2>
                </div>
                
                <div class="col-lg-6 col-xs-6 text-right">
                	Pages / <span class="page-name">Blog Detail</span>
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
                    <!-- Post Detail -->
                    <article class="post post-detail anim-3-all animated out" data-delay="0" data-animation="fadeInUp">
                    	<h2>{{$post->title}}</h2>
                        <figure class="post-image">
                            <img class="img-responsive" src="{{URL::asset('/images/posts/'.$post->picture_path )}}"  alt="img">
                            <figcaption class="caption">
                                <div class="date"><span class="day">{{date('d', strtotime($post->created_at))}}</span><span class="month">{{date('M', strtotime($post->created_at))}}</span></div>
                                <div class="comments"><span class="flaticon-speech18"></span> &ensp; 45</div>
                            </figcaption>
                        </figure>
                        <div class="desc">
                        	<p>{{$post->content}} </p>
                        </div>
                    </article>
                    <!-- Comment Form -->
                    <div class="comment-form anim-5-all clearfix">
                    	<h2 class="border-line-left">Comment Here</h2>
                        <form method="post" action="http://demo.templatepath.com/medicon/index.html">
                            
                            <div class="form-group col-md-7 col-xs-12">
                                <input type="text" name="name" value="" placeholder="Your Name">
                            </div>
                            
                            <div class="form-group col-md-7 col-xs-12">
                                <input type="email" name="email" value="" placeholder="Your Email">
                            </div>
                            
                            <div class="form-group col-md-7 col-xs-12">
                                <input type="text" name="subject" value="" placeholder="Subject">
                            </div>
                            
                            <div class="form-group col-md-9 col-xs-12">
                                <textarea placeholder="Your Message"></textarea>
                            </div>
                            <div class="form-group col-md-9 col-xs-12 clearfix">
                                <input type="submit" class="pull-right btn-theme" name="submit" value="Send Message">
                            </div>
                            
                        </form>
                    </div>
                    
                
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
<script src="/js/blog/jquery.js"></script> 
<script src="/js/blog/bootstrap.min.js"></script>
<script src="/js/blog/jquery.appear.js"></script>
<script src="/js/blog/script.js"></script>
@endsection