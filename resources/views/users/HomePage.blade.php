@extends('layout')
@section('css')
    {{--<link rel="stylesheet" href="/css/bootstrap-rtl.css">--}}


@endsection
@section('content')
    <section class="main-slider-wrapper">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500">
                        <img src="/resource/male-doctor-2.jpg" alt="slide 4">
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="220"
                             data-speed="700"
                             data-start="600"
                             data-easing="easeOutExpo">
                            <h4>EXCELLENT HEALLTH CARE SERVICES</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="270"
                             data-speed="700"
                             data-start="1100"
                             data-easing="easeOutExpo">
                            <h2>WE TOTALLY CARE ABOUT EVERYONE</h2>
                        </div>
                        <div class="caption lfl stl"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            <h5>We also work very closely with our Community Healthcare Team who <br>provide antenatal,
                                postnatal and nursing services and other specialist provision<br> such as the Quitters
                                scheme.</h5>
                        </div>
                        <div class="caption lfb stb"
                             data-x="left"
                             data-y="top"
                             data-hoffset="15"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo">
                            <a href="#" class="btn-theme"><span class="icon flaticon-angle2"></span> &ensp; GET IN TOUCH</a>
                        </div>
                    </li>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500"><img
                                src="/resource/doctor-patient.jpg" alt="slide 4">
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="220"
                             data-speed="700"
                             data-start="600"
                             data-easing="easeOutExpo">
                            <h4>EXCELLENT HEALLTH CARE SERVICES</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="270"
                             data-speed="700"
                             data-start="1100"
                             data-easing="easeOutExpo">
                            <h2>WE TOTALLY CARE ABOUT EVERYONE</h2>
                        </div>
                        <div class="caption lfb stb"
                             data-x="center"
                             data-y="top"
                             data-hoffset="0"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            <h5 class="text-center">We also work very closely with our Community Healthcare Team who
                                provide antenatal, postnatal and nursing services <br>and other specialist provision
                                such as the Quitters scheme.</h5>
                        </div>

                        <div class="caption lfl stl"
                             data-x="center"
                             data-y="top"
                             data-hoffset="-100"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo"><a href="#" class="btn-theme left"><span
                                        class="icon flaticon-angle2"></span> &ensp; GET IN TOUCH</a>
                        </div>

                        <div class="caption lfr str"
                             data-x="center"
                             data-y="top"
                             data-hoffset="100"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                        </div>

                    </li>

                    <li data-transition="fade" data-slotamount="10" data-masterspeed="1500"><img
                                src="/resource/family-doctor-fm.jpg" alt="slide 4">
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="220"
                             data-speed="700"
                             data-start="600"
                             data-easing="easeOutExpo">
                            <h4>EXCELLENT HEALLTH CARE SERVICES</h4>
                        </div>
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="270"
                             data-speed="700"
                             data-start="1100"
                             data-easing="easeOutExpo">
                            <h2>WE TOTALLY CARE ABOUT EVERYONE</h2>
                        </div>
                        <div class="caption lfr str"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="340"
                             data-speed="700"
                             data-start="1800"
                             data-easing="easeOutExpo">
                            <h5 class="text-right">We also work very closely with our Community Healthcare Team who <br>provide
                                antenatal, postnatal and nursing services and other specialist provision<br> such as the
                                Quitters scheme.</h5>
                        </div>
                        <div class="caption lfb stb"
                             data-x="right"
                             data-y="top"
                             data-hoffset="-15"
                             data-voffset="460"
                             data-speed="700"
                             data-start="2500"
                             data-easing="easeOutExpo"><a href="#" class="btn-theme"><span
                                        class="icon flaticon-angle2"></span> &ensp; GET IN TOUCH</a></div>
                    </li>
                </ul><!-- end ul -->
            </div><!-- end tp-banner -->
        </div><!-- end banner-container -->
    </section>

    <!-- Services -->
    <!-- How We Help -->
    <!-- Combo Section -->
    <section class="combo">
        <div class="auto-box">
            <div class="row clearfix">

                <!-- Departments -->
                <div class="departments col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <h2 class="border-line-left">Why choose us?</h2>
                    <!-- Accordion box / Style Two-->
                    <div class="accordion-box style-two">

                        <!-- Accordion -->
                        <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn active"><span class="toggle-icon"></span> We work clean and try to help
                                everyone
                            </div>
                            <div class="acc-content clearfix collapsed">
                                <p>Our teams are up to date with the latest technologies, media trends and are keen to
                                    prove themselves in this industry and that’s what you want from an advertising
                                    agency.</p>
                            </div>
                        </article>
                        <!-- Accordion -->
                        <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn"><span class="toggle-icon"></span> Our teams work together to heal
                                people
                            </div>
                            <div class="acc-content clearfix">
                                <p>Our teams are up to date with the latest technologies, media trends and are keen to
                                    prove themselves in this industry and that’s what you want from an advertising
                                    agency.</p>
                            </div>
                        </article>
                        <!-- Accordion -->
                        <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                            <div class="acc-btn"><span class="toggle-icon"></span> We try to work for young, old and
                                teens
                            </div>
                            <div class="acc-content clearfix">
                                <p>Our teams are up to date with the latest technologies, media trends and are keen to
                                    prove themselves in this industry and that’s what you want from an advertising
                                    agency.</p>
                            </div>
                        </article>

                    </div>
                </div>

                <!-- Our Services -->
                <div class="our-services col-lg-4 col-md-4 col-sm-6 col-xs-12 animated out" data-delay="100"
                     data-animation="fadeInUp">
                    <h2 class="border-line-left">Awesome Features</h2>
                    <!-- Square Listing -->
                    <ul class="square-listing anim-3-all">
                        <li><a href="#">Health &amp; Medical Care</a></li>
                        <li><a href="#">Medical Treatment</a></li>
                        <li><a href="#">Emergency Help</a></li>
                        <li><a href="#">Rehabilation Therapy</a></li>
                        <li><a href="#">Medical Counseling</a></li>
                    </ul>
                </div>

                <!-- Work Hours -->
                <div class="work-hours col-lg-4 col-md-4 col-sm-12 col-xs-12 animated out" data-delay="200"
                     data-animation="fadeInUp">
                    <h2 class="border-line-left">Opening Hours</h2>
                    <div class="accordion-box style-two">
                        @foreach($clinics as $clinic)
                            <article class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn active"><span class="toggle-icon"></span> {{$clinic->name}} </div>
                                    @foreach($workingHours as $hour)
                                        <?php
//                                            var_dump($hour->clinic_id);
//                                            die();
                                    ?>
                                        @if($hour->clinic_id==$clinic->id)
                                    <div class="acc-content clearfix collapsed">
                                        <div class="day clearfix">
                                        <span class="day-title pull-left">{{$hour->day}}</span><span
                                                class="day-timing pull-right">{{$hour->fromTime}} - {{$hour->toTime}}</span>
                                    </div>
                                        @endif
                                        @endforeach
                                </div>
                            </article>
                        @endforeach
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- Client Testimonials -->
    <section class="client-testimonials margin-50">
        <div class="auto-box">
            <h1 class="border-line-center">What our patients said</h1>

            <div class="slider">
                <article class="slide">
                    <figure><img class="img-circle" src="/resource/testimonial-image-1.png" alt=""></figure>
                    <div class="text">"Our teams are up to date with the latest technologies, media trends and are keen
                        to prove themselves in this industry and that’s what you want from an advertising agency, not
                        someone who is relying on the same way of doing things."
                    </div>
                </article>
                <article class="slide">
                    <figure><img class="img-circle" src="/resource/testimonial-image-2.png" alt=""></figure>
                    <div class="text">"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s."
                    </div>
                </article>
                <article class="slide">
                    <figure><img class="img-circle" src="/resource/team-2.jpg" alt=""></figure>
                    <div class="text">"It is a long established fact that a reader will be distracted by the readable
                        content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                        more-or-less normal distribution of letters."
                    </div>
                </article>
            </div>

        </div>
    </section>

    <!-- Meet The Team -->
    <section class="meet-the-team">
        <div class="auto-box">
            <h1 class="border-line-center text-center">Meet our doctor</h1>
            <div class="row clearfix">

                <!-- Member -->
                <article class="member col-lg-4 col-md-3 col-sm-6 col-xs-12 animated out" data-delay="0"
                         data-animation="fadeInUp">
                    <figure><img src="/images/doctor.jpg" alt=""><a class="overlay" href="about-us.html"></a></figure>
                    <div class="member-info " id="info">
                        <h4>{{ $doctorRole->user->username }}</h4>
                        <h5><a>Consultant Ophthalmology</a></h5>
                    </div>
                    <ul class="social clearfix anim-3-all">
                        <li class="hvr-ripple-out"><a href="https://www.facebook.com/galals2"><span class="flaticon-facebook31"></span></a></li>&nbsp;
                        <li class="hvr-ripple-out"><a href="https://twitter.com/dr_agina?s=07"><span class="flaticon-twitter1"></span></a></li>&nbsp;
                        <li class="hvr-ripple-out"><a href="aginaclinic@gmail.com"><span class="flaticon-google116"></span></a></li>&nbsp;
                        {{--<li class="hvr-ripple-out"><a href=""><span class="flaticon-instagram12"></span></a></li>&nbsp;--}}
                    </ul>
                </article>
                <div class="member col-lg-8 col-md-8 col-sm-6 col-xs-12 animated out" data-delay="100" data-animation="fadeInUp">
                        <h2 class="border-line-left">{{ $doctorRole->user->username }}</h2>
                        <!-- Square Listing -->
                        <ul class="square-listing anim-3-all">
                            @foreach($doctorDegree as $degree)
                            <li><a >In:{{$degree->graduate_date}} &nbsp; {{$degree->degree}}&nbsp;from&nbsp;{{$degree->university}}</a></li>
                            @endforeach
                        </ul>
                </div>

            </div>
        </div>
    </section>

    <!-- Latest Blog -->
    <section class="latest-blog">
        <div class="auto-box">
            <h1 class="border-line-center">Latest from the Blog</h1>
            <div class="row clearfix">

                <!-- Post -->
                @foreach($posts as $post)
                    <article class="blog-post col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="image">
                            <img class="img-responsive" src="{{URL::asset('/images/posts/'.$post->picture_path )}}"  alt="img">
                            <div class="caption">
                                <div class="date"><span class="day">{{date('d', strtotime($post->created_at))}}</span><span class="month">{{date('M', strtotime($post->created_at))}}</span></div>
                                {{--<div class="comments"><span class="flaticon-speech18"></span> &ensp; 23</div>--}}
                            </div>
                            <a href="/blog-detail/{{$post->id}}" class="overlay"><span class="icon"></span></a>
                        </div>
                        <h2><a href="">{{$post->title}}</a></h2>
{{--                        <div class="desc"><p>{{$post->content}}</p></div>--}}
                        <div class="more text-right"><a href="/blog-detail/{{$post->id}}">READ MORE &ensp; <span class="glyphicon glyphicon-arrow-right"></span></a></div>
                    </article>

                @endforeach
            </div>
        </div>
    </section>
@endsection