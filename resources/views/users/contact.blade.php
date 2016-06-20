@extends('layout')
@section("scripts")
    <script src="http://maps.googleapis.com/maps/api/js?KEY=AIzaSyD31ckr4GKqf6WcWU8WfIqwTj8zS3BtZZo"></script>
    <script src="/js/map.js"></script>
@endsection
@section('content')

    <article class="page-title zero-margin">
        <div class="auto-box">
            <div class="row clearfix">

                <div class="col-lg-6 col-xs-6">
                    <h2>Contact Us</h2>
                </div>

                <div class="col-lg-6 col-xs-6 text-right">
                    Pages / <span class="page-name">Contact Us</span>
                </div>


            </div>
        </div>
    </article>

    <!-- Location Map -->
    @if(count($addresses)!=0)
        <div id="data" hidden>@foreach($addresses as $address){{$address}},@endforeach</div>
        <section class="our-location-map margin-50" id="googleMap"></section>
    @else
        <section class="our-location-map margin-50" id="googleMap">there is no data</section>
        @endif
                <!-- Sidebar Page -->
        <div class="sidebar-page">
            <div class="auto-box">
                <div class="row clearfix">

                    <!-- Left Content -->
                    <section class="left-content col-lg-8 col-md-8 col-sm-7 col-xs-12 pull-left">

                        <!-- Contact us Form -->
                        <div class="contact-us">

                            <div class="col-lg-12">
                                <h2 class="border-line-left">Contact Us</h2>
                                <br><br>
                            </div>

                            <div class="form-container anim-5-all clearfix animated out" data-delay="200"
                                 data-animation="fadeIn">
                                <form method="post" action=""
                                      id="contact-form">
                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <input type="text" name="subject" required value="" placeholder="Subject">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <input type="text" name="name" required value="" placeholder="Your Name">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-6 col-xs-12">
                                        <input type="email" name="email" required value="" placeholder="Your Email">
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <textarea name="message" required placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="form-group col-xs-12 clearfix">
                                        <input type="submit" class="pull-right" required name="submit" value="Send Message">
                                    </div>

                                </form>
                            </div>
                        </div>

                    </section>

                    <!-- Sidebar -->
                    <aside class="side-bar col-lg-4 col-md-4 col-sm-5 col-xs-12 pull-right anim-5-all">

                        <!-- Contact Info -->

                        <!-- Social / Follow us -->
                        <div class="widget follow-us animated out" data-delay="500" data-animation="fadeInUp">
                            <h2 class="border-line-left">Follow us on</h2>

                            <a href="https://www.facebook.com/galals2" class="facebook"><span class="flaticon-facebook31"></span></a>
                            <a href="https://twitter.com/dr_agina?s=07" class="twitter"><span class="flaticon-twitter1"></span></a>
                            <a href="aginaclinic@gmail.com" class="google-plus"><span class="flaticon-google116"></span></a>
                        </div>


                    </aside>

                </div>
            </div>
        </div>
@endsection