<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap-5.0.0-alpha-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/LineIcons.2.0.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
</head>
<body>
<div class=preloader>
    <div class=loader>
        <div class=ytp-spinner>
            <div class=ytp-spinner-container>
                <div class=ytp-spinner-rotator>
                    <div class=ytp-spinner-left>
                        <div class=ytp-spinner-circle></div>
                    </div>
                    <div class=ytp-spinner-right>
                        <div class=ytp-spinner-circle></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<header class="header">
    <div class="navbar-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="./">
                            <img src="{{ asset('assets/img/logo/logo.svg')}}" alt="Logo"/>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="page-scroll" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#features">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#pricing">Pricing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#contact">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<section id=home class=hero-section>
    <div class=container>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class=hero-content>
                    <h1 class="wow fadeInUp" data-wow-delay=.2s>{{ config('app.name') }}, your invoicing and CRM in one
                        place.</h1>
                    <p class="wow fadeInUp" data-wow-delay=.4s>
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                    </p>
                    <a href="{{ route('register') }}" class="main-btn btn-hover wow fadeInUp" data-wow-delay=.6s>Try for free</a>
                </div>
            </div>
            <div class=col-lg-12>
                <div class="hero-img wow fadeInUp" data-wow-delay=.5s>
                    <img src="{{ asset('assets/img/hero/hero-img.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="features" class="service-section pt-150">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-9">
                <div class="service-content">
                    <div class="section-title">
                        <h1 class="mb-30 wow fadeInUp" data-wow-delay=".2s">Our Cool Features and Services</h1>
                        <p class="mb-40 wow fadeInUp" data-wow-delay=".4s">Lorem ipsum dolor sit amet, consetetur
                            sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam
                            era.Lorem ipsum dolor sisert amet, consetetur sadipscing sed diam.</p>
                        <a href="{{ route('login')}}" class="main-btn btn-hover border-btn wow fadeInUp"
                           data-wow-delay=".6s">Get Started</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-xl-6">
                <div class="row">
                    @forelse($features as $feature)
                    <div class="col-xl-6 col-md-6">
                        <div class="single-service">
                            <div class="content">
                                <h3>{{ $feature->name}}</h3>
                            </div>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    
                </div>
            </div>
        </div>

    </div>
</section>

<section id="about" class="about-section pt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-img wow fadeInUp" data-wow-delay=".5s">
                    <img src="{{ asset('assets/img/about/about-img.svg')}}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="section-title">
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">Learn More About Us</h1>
                        <p class="wow fadeInUp" data-wow-delay=".4s">Lorem ipsum dolor sit amet, consetetur sadipscing
                            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam era.Lorem
                            ipsum dolor sit</p>
                    </div>

                    <div class="counter-up wow fadeInUp" data-wow-delay=".8s">
                        <div class="single-counter">
                            <h3 id="secondo1" class="countup" cup-end="1" cup-append="M+">1 </h3>
                            <h5>Downloads</h5>
                        </div>
                        <div class="single-counter position-relative">
                            <h3 id="secondo2" class="countup" cup-end="234" cup-append="K+">234 </h3>
                            <h5>Happy Users</h5>
                        </div>
                        <div class="single-counter">
                            <h3 id="secondo3" class="countup" cup-end="34" cup-append="K+">34 </h3>
                            <h5>Reviews</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="testimonial-section img-bg mt-130 pt-60 pb-60">
    <div class=container>
        <div class="row justify-content-center">
            <div class=col-lg-7>
                <div class="section-title mb-70 text-center">
                    <h1 class="text-white wow fadeInUp" data-wow-delay=.2s>What Our Users Says</h1>
                </div>
            </div>
        </div>
        <div class=testimonial-active-wrapper>
            <div class="row testimonial-active">
                <div class=col-lg-6>
                    <div class=single-testimonial>
                        <div class=image>
                            <img src="{{ asset('assets/img/testimonial/xtestimonial-1.png')}}" alt="">
                        </div>
                        <div class=content>
                            <p>Lorem ipsum dolor sit amet, conseta dipscing elitr, sed diam nonumy eirmod temp invidunt
                                ut laboreet dolore magna aliquyamera. Lorem ipsum dolor sitamet.</p>
                            <div class=info>
                                <h5>Ena Shah</h5>
                                <p>Businessman</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=col-lg-6>
                    <div class=single-testimonial>
                        <div class=image>
                            <img src="{{ asset('assets/img/testimonial/xtestimonial-2.png')}}" alt="">
                        </div>
                        <div class=content>
                            <p>Lorem ipsum dolor sit amet, conseta dipscing elitr, sed diam nonumy eirmod temp invidunt
                                ut laboreet dolore magna aliquyamera. Lorem ipsum dolor sitamet.</p>
                            <div class=info>
                                <h5>Jonathon Smith</h5>
                                <p>Founder Food fanda</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=col-lg-6>
                    <div class=single-testimonial>
                        <div class=image>
                            <img src="{{ asset('assets/img/testimonial/xtestimonial-3.png')}}">
                        </div>
                        <div class=content>
                            <p>Lorem ipsum dolor sit amet, conseta dipscing elitr, sed diam nonumy eirmod temp invidunt
                                ut laboreet dolore magna aliquyamera. Lorem ipsum dolor sitamet.</p>
                            <div class=info>
                                <h5>Dev Ed</h5>
                                <p>Teacher at Udemy</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section id=pricing class="pricing-section pt-130">
    <div class=container>
        <div class="row align-items-end">
            <div class="col-lg-7 col-xl-5">
                <div class="section-title mb-60">
                    <h1 class="mb-35 wow fadeInUp" data-wow-delay=.2s>Choose Your Plan</h1>
                    <p class="wow fadeInUp" data-wow-delay=.4s>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor invidunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-5 col-xl-7">
                <ul class="nav nav-pills pricing-tab mb-60" id=pills-tab role=tablist>
                    <li role=presentation>
                        <a class="pricing-tab-link active" id=pills-monthly-tab data-toggle=pill href="#pills-monthly"
                           role=tab aria-controls=pills-monthly aria-selected=true>
                            Monthly
                        </a>
                    </li>
                    <li role=presentation>
                        <a class=pricing-tab-link id=pills-yearly-tab data-toggle=pill href="#pills-yearly" role=tab
                           aria-controls=pills-yearly aria-selected=false>
                            Yearly
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class=tab-content id=pills-tabContent>
            <div class="tab-pane fade show active" id=pills-monthly role=tabpanel aria-labelledby=pills-monthly-tab>
                <div class=row>
                    @forelse($monthlyPlans as $monthly)
                    <div class="col-lg-4 col-md-6">
                        <div class=single-pricing>
                            <h3 class=package-name>{{ $monthly->name }}</h3>
                            <span class=price>${{ number_format($monthly->price/100,2)}}</span>
                            <ul>
                                <li>Extra features</li>
                                <li>Lifetime free support</li>
                                <li>Upgrade options</li>
                                <li>Full access</li>
                            </ul>
                            <a href="javascript:void(0)" class="main-btn border-btn btn-hover">Get Started</a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    
                </div>
            </div>
            <div class="tab-pane fade" id=pills-yearly role=tabpanel aria-labelledby=pills-yearly-tab>
                <div class=row>
                    @forelse($yearlyPlans as $year)
                    <div class="col-lg-4 col-md-6">
                        <div class=single-pricing>
                            
                            <h3 class=package-name>{{ $year->name}}</h3>
                            <span class=price>${{ number_format($year->price/100,2)}}</span>
                            <ul>
                                <li>Extra features</li>
                                <li>Lifetime free support</li>
                                <li>Upgrade options</li>
                                <li>Full access</li>
                            </ul>
                            <a href="javascript:void(0)" class="main-btn border-btn btn-hover">Get Started</a>
                        </div>
                    </div>
                    @empty
                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</section>


<section id=contact class="contact-section pt-130">
    <div class=container>
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <div class="section-title text-center mb-60">
                    <h1 class="mb-25 wow fadeInUp" data-wow-delay=.2s>Get In Touch</h1>
                    <p class="wow fadeInUp" data-wow-delay=.4s>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                        sed diam nonumy eirmod tempor</p>
                </div>
            </div>
        </div>
        <div class=row>
            <div class=col-lg-7>
                <div class="contact-wrapper wow fadeInUp" data-wow-delay=.2s>
                    <form action="#" method=POST id=contact-form class=contact-form>
                        <div class=row>
                            <div class=col-md-6>
                                <div class=single-form>
                                    <input type=text name=name id=name class=form-input placeholder="Your Name">
                                </div>
                            </div>
                            <div class=col-md-6>
                                <div class=single-form>
                                    <input type=email name=email id=email class=form-input placeholder="Your E-mail">
                                </div>
                            </div>
                            <div class=col-md-6>
                                <div class=single-form>
                                    <input type=text name=subject id=subject class=form-input placeholder=Subject>
                                </div>
                            </div>
                            <div class=col-md-6>
                                <div class=single-form>
                                    <input type=text name=number id=number class=form-input placeholder=Number>
                                </div>
                            </div>
                            <div class=col-md-12>
                                <div class=single-form>
                                    <textarea name=message id=message class=form-input rows=7
                                              placeholder=Message></textarea>
                                </div>
                            </div>
                            <div class=col-md-12>
                                <div class=submit-btn>
                                    <button class="main-btn btn-hover" type=submit>Submit Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class=col-lg-5>
                <div class="contact-img wow fadeInUp" data-wow-delay=.5s>
                    <img src="{{ asset('assets/img/contact/contact-img.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>


<footer class="footer mt-150 pt-90">
    <div class=container>
        <div class=subscribe-wrapper>
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-9">
                    <div class="section-title text-center mb-45">
                        <h1 class="mb-25 text-white wow fadeInUp" data-wow-delay=.2s>Subscribe Our Newsletter</h1>
                        <p class="text-white wow fadeInUp" data-wow-delay=.4s>Lorem ipsum dolor sit amet, consetetur
                            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore</p>
                    </div>
                    <form action="#" class="subscribe-form wow fadeInUp" data-wow-delay=.6s>
                        <input type=email name=subs-email id=subs-email placeholder="Your email">
                        <button type=submit class="main-btn btn-hover">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
        <div class=widget-wrapper>
            <div class=row>
                <div class="col-lg-3 col-sm-6">
                    <div class=footer-widget>
                        <div class=logo>
                            <a href="./"> <img src="{{ asset('assets/img/logo/logo.svg')}}" alt=logo">
                            </a>
                        </div>
                        <ul class=socials>
                            <li>
                                <a href="javascript:void(0)"> <i class="lni lni-facebook-filled"></i> </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"> <i class="lni lni-twitter-filled"></i> </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"> <i class="lni lni-instagram-filled"></i> </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"> <i class="lni lni-linkedin-original"></i> </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class=footer-widget>
                        <h3 class=text-white>Explore</h3>
                        <ul class=links>
                            <li>
                                <a href="javascript:void(0)">About </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Our Team </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Features </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class=footer-widget>
                        <h3 class=text-white>Terms</h3>
                        <ul class=links>
                            <li>
                                <a href="javascript:void(0)">Refund Policy</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Terms of Service</a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Support Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class=footer-widget>
                        <h3 class=text-white>Links</h3>
                        <ul class=links>
                            <li>
                                <a href="javascript:void(0)">Help </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Support </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Contact </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="text-center pb-30" style="color: #fff">&copy; {{ date('Y') }} Right Reserved {{ config('app.name') }}</a></p>
            </div>
        </div>
    </div>
</footer>


<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>


<script src="{{ asset('assets/js/bootstrap.5.0.0.alpha-2-min.js') }}"></script>
<script src="{{ asset('assets/js/count-up.min.js')}}"></script>
<script src="{{ asset('assets/js/wow.min.js')}}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>
</body>
</html>
