<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Azizul Hasan Web Design And Web Developer</title>

    <!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
  ================================================== -->
    <!-- Bootstrap -->
   	<link rel="icon" href="{{ asset('home/images/azizulhasan.jpg') }}" type="image/gif" sizes="16x16">
    <link href="{{ asset('home/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/prettyPhoto.css') }}">
	
	<link rel="stylesheet" href="{{ asset('home/css/style_2.css') }}">
	<link rel="stylesheet" href="{{ asset('home/css/custom.css') }}">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body data-spy="scroll" data-target=".main-nav">
    <section id="section-banner">
	<div class="pattern-overlay"></div>
    	<div class="container">
    		<div class="row">
    			<div class="banner-content wow fadeInRight">
					@foreach($hometitles as $home)
    				<h2 class="title">
					<span>{{$home->title1}}</span>
					<span>{{$home->title2}}</span>{{$home->title3}}
    				</h2>
					<a href="#section-contact" class="btn btn-default">Contact Me</a>
					@endforeach
    			</div>
    		</div>
    	</div>
    </section>

    <!-- section menu start -->

    <section class="section-menu">
    	<div class="navbar navbar-default main-nav" role="navigation" >
    		<div class="container" >
    			<div class="navbar-header">
    				<button class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse">
    					<span class="sr-only"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    					<span class="icon-bar"></span>
    				</button>
					<a href="{{url('/')}}" class="navbar-brand">Azizul Hasan</a>
    			</div>  <!-- navbar-header end -->
    			<!-- main nav  -->
				<ul class="nav navbar-nav navbar-right">
					<li class="nav-item"><a class="nav-link"  href="{{url('/blog')}}">Blog</a></li>
					</ul>
    			<div class="collapse navbar-collapse navigation"  role="navigation">
    				<ul class="nav navbar-nav navbar-right">
    					<li class="active"><a href="#section-banner">Home </a></li>
    					<li><a href="#section-profile">About me </a></li>
    					<li><a href="#section-skill">Skills </a></li>
    					<li><a href="#section-resume">Resume </a></li>
    					<li><a href="#section-testimonial">Testimonials </a></li>
    					<li><a href="#section-portfolio">Portfolio </a></li>
    					<li><a href="#section-contact">Contact Me </a></li>
    				</ul>
					
    			</div><!-- /.navbar-collapse -->
    		</div><!-- /.container-fluid -->
    	</div>
    </section>
    <!-- section menu end -->
 	<section id="section-overview" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="service-wrapper">
					@foreach($profilecategories as $profile)
					<div class="service-inner col-6 wow fadeInRight" data-wow-delay="{{$profile->fadetime}}">
						<i class="fa {{$profile->icon}}"></i>
						<div class="service-box">
							<h3>{{$profile->title}}</h3>
							<p>{{$profile->description}}</p>
						</div>
					</div> <!-- service -inner  -->
					@endforeach
			</div><!-- row end -->
		</div>
	</section>
	<!-- section overview end -->
	<!-- section profile start -->
	<section id="section-profile" class="section-padding">
		<div class="profile-bg visible-md visible-lg"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-12 pull-right">
					<div class="profile-desc wow fadeInRight">
						 <h2 class="section-title uppercase">Hello, My Name is Azizul Hasan</h2><br/>
						<p>
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
							magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper 
							suscipit lobortis nisl ut aliquip ex ea commodo consequat. enim ad minim veniam, quis nostrud exerci tation ullamcorper 
							suscipit lobortis nisl ut aliquip ex ea commodo consequat.
						</p><br/>
						<p class="text-grey animated bounceInUp" style="opacity: 1;">
						
							Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.
						</p><br/>
						<p class="text-grey animated bounceInUp" style="opacity: 1;">
							Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
								laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation 
								ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.
						</p>

					</div>
				</div>
			</div> <!-- row end -->
		</div><!-- container end -->
	</section>
	<!-- section profile end -->
	<!-- section skill start -->
	<section id="section-skill" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading-title">My skills</h2>
				</div>
				<div class="col-md-6 col-sm-6 wow fadeInLeft">
					<div class="skill-desc">
						<p>{{-- {{$all->skill}}Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri. --}}
						<br>
						<br>
						Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est, eam dicam soluta ei. Vel dicam vivendo accusata ei, cum ne periculis molestiae pri.
						<br>
						<br>
						Lorem ipsum dolor sit amet, ea doming epicuri iudicabit nam, te usu virtute placerat. Purto brute disputando cu est.</p>
					</div>
				</div>
				<div class="col-md-6 col-sm-6 wow fadeInRight" >
           			@foreach ($user as $skills)    
					<div class="skill-box wow fadeInDown" data-wow-delay=".2s">
						<label> {{ $skills->title }}</label>
						<div class="progress">
							<div class="progress-bar" role="progress-bar" aria-valuemin="0" aria-valuenow="70" aria-valuemax="100" style="width: {{ $skills->percentege }}%;" >
								{{ $skills->percentege }}%
							</div>
						</div>
                    </div>
                    @endforeach
					
				</div>
			</div>
		</div>
	</section>
	<!-- section skill End -->

	<!-- Resume start -->

	

<section id="resume-details" class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-md-12 wow fadeInLeft">
				<div class="resume-inner">
				<h2 class="heading-title">My Education</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="timeline-centered">
				@foreach( $certifications as $educations)	
				<article class="timeline-entry">
					<div class="timeline-entry-inner">
						<div class="timeline-icon bg-success">
							<i class="entypo-feather"></i>
						</div>
						<div class="timeline-label">
							<h3 class="resume-title">{{ $educations->title }}</h3>
						<p>Subject : {{$educations->group}}</p>
						<p>YEAR : {{$educations->year}}</p>
						<p>Topic : {{$educations->board}}</p>
						</div>
					</div>
				</article>
			@endforeach
			<!-- <article class="timeline-entry begin">
				<div class="timeline-entry-inner">
					<div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
						<i class="entypo-flight"></i> +
					</div>
				</div>
			</article> -->
    </div>
	</div>
</div>

<div class="container">
<div class="row">
    <div class="col-md-12 wow fadeInLeft">
			<div class="resume-inner">
			<h2 class="heading-title">Work Experience</h2>
			
			</div>
		</div>
	</div>
	<div class="row">
        <div class="timeline-centered">
	@foreach($experiences as $exp)
        <article class="timeline-entry">
            <div class="timeline-entry-inner">
                <div class="timeline-icon bg-success">
                    <i class="entypo-feather"></i>
                </div>
                <div class="timeline-label">
					<h3 class="resume-title">{{ $exp->title }}</h3>
					<p>{{ $exp->designation }}</p>
					<p>{{ $exp->year }}</p>
					<p>{{ $exp->description }}</p>
                </div>
            </div>
        </article>
		@endforeach
        <article class="timeline-entry begin">
            <div class="timeline-entry-inner">
                <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                    <i class="entypo-flight"></i> +
                </div>
            </div>
        </article>
    </div>
	<a href="{{ asset('home/images/portfolio/azizulhasan.pdf') }}" class="btn btn-default featured" download>Download Resume</a>
	</div>
</div>

	</section>
	<!-- Resume end -->

	<!-- section testimonial start -->

	<section id="section-testimonial" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center wow fadeInUp">
					<div class="section-heading">
						<h2 class="heading-title">portfolio</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="carousel slide text-center" id="testimonial-carousel">
						 <ol class="carousel-indicators">
							<li data-target="#testimonial-carousel" data-slide-to="1" class="active"></li>
							@foreach ($testimonials as $test)
						  <li data-target="#testimonial-carousel" data-slide-to="{{$test->id}}"></li>
						 @endforeach
						  </ol>
						<div class="carousel-inner">
							<div class="item active">
								<p>“Azizul is a rising talent. Expert in Responsive Web Design and Custom PHP. I hired him for PSD To HTML and my WordPress Plugin Development. Great experience. I'll hire him again. ”</p>
								<h4 class="client-name">Sk. Abul Hasan<br/><span style="padding: 0px">Senior Laravel Developer </span></h4>
							</div>
							@foreach ($testimonials as $test)
							<div class="item">
							<p>“ {{$test->description}}”</p>
							<h4 class="client-name">{{$test->name}}<br/><span style="padding: 0px">{{$test->designation}} </span></h4>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- section testimonial end -->

	<!-- section portfolio start -->


<!-- azizul hasan isotop -->
	<section id="section-portfolio" class="section-padding">
		<div class="container my-0 py-0">
			<div class="row my-0 py-0">
				<div class="col-md-12 my-0 py-0  text-center wow fadeInUp">
					<div class="section-heading ">
						<h2 class="heading-title">portfolio</h2>
					</div>
				</div>
			</div>
			<div class="big-demo row  text-center wow fadeInUp" data-js="hero-demo">
				<div class="ui-group">
					<div class="filters mx-2  button-group js-radio-button-group">
						<button class="button is-checked" data-filter="*">
							Show all
						</button>
						@foreach($portfolioisotopes as $isotopes)
						<button class="button" data-filter=".{{$isotopes->filtername}}">{{$isotopes->title}}</button>
						@endforeach
						
					</div>
				</div>
				<div class="grid ">
					@foreach($portfolios as $port)
					<div class="col-6 col-sm-6 my-3 my-md-5  col-md-4 element-item  {{$port->filtername}}" data-category="{{$port->filtername}}">
					<div class="portfolio-box">
						<img src="{{ $port->images }}" alt="" class="img-responsive" >
						<div class="image-overlay text-center">
							<a href="{{ $port->hoverimages }}" data-rel="prettyPhoto"><i class="fa fa-arrows-alt"></i></a>
						</div>
					</div>
					<a href="{{ $port->website }}" target="_blank" style="margin-top:40px">{{ $port->website }}</a>
					</div>
					@endforeach
					
				</div>
			</div>
		</div>
	</section>
	<!-- section portfolio endt -->

	<!-- section contact start -->

	<section id="section-contact" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="heading-title">Contact me</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-sm-6 wow fadeInRight">
					<div class="contact-form">
                        <form class="contact-box" action="{{ route('store.usercontacts') }}" method="post" >
                            @csrf
							<div class="form-group">
								<label>Name*</label>
								<input type="text" name="name" class="form-control">
							</div>

							<div class="form-group">
								<label>Email address*</label>
								<input type="text"  name="email" class="form-control">
							</div>

							<div class="form-group">
								<label>Message*</label>
								<input type="text"  name="message" class="form-control">
                            </div>
						<div class="row">
							<div class="col-md-12">
								<input type="submit" value="Contact me"  class="btn btn-default">
							</div>
                        </div>
                    </form>
					</div>
				</div>
					<div class="col-md-6 col-sm-6 wow fadeInLeft">
					<div class="contact-left">
						@foreach($contacts as $cont)
							
						<!-- <p>
						{{$cont->description}}</p> -->
						<div class="location">
							<p>{{$cont->address}}</p>
							<p>{{$cont->city}}</p>
							<p>{{$cont->country}}</p>
						</div>
						<ul>
							<li><span>Email :</span> <a href='mailto:{{$cont->email}}'>{{$cont->email}}</a></li>
							<li><span>Phone :</span> <a href='tel:{{$cont->phone}}'>{{$cont->phone}}</a></li>
						</ul>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		{{-- @endforeach --}}
	</section>
	<!-- section contact end -->
<a class="scroll-to-top" href="#page-top" >
        <i class="fa fa-angle-up"></i>
    </a>
	<footer id="section-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="socail-link list-inline">
						@foreach ($socialicons as $social)	
				    	<li><a href="{{$social->url}}"><i class="{{$social->iconclass}}"></i></a></li>
						@endforeach
					</ul>
				@foreach($rightnames as $right)
				<h4>{{$right->title}}All Rights Reserved By  <a href="https://www.linkedin.com/in/azizulhasan1995/" target="_blank" title="LinkedIn Profile">{{$right->owner}}</a> </h4>
				@endforeach
				</div>
			</div>
		</div>
	</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- initialize jQuery Library -->
    <script type="text/javascript" src="{{ asset('home/js/jquery.js') }}"></script>
    <!-- Bootstrap jQuery -->
    <script type="text/javascript" src="{{ asset('home/assets/js/bootstrap.min.js') }}"></script>
    <!-- PrettyPhoto -->
    <script type="text/javascript" src="{{ asset('home/js/jquery.prettyPhoto.js') }}"></script>
    <!-- Wow Animation -->
    <script type="text/javascript" src="{{ asset('home/js/wow.min.js') }}"></script>
    <!-- singlepagenav -->
    <script src="{{ asset('home/js/jquery.singlePageNav.js') }}"></script>
    <!-- Eeasing -->
    <script type="text/javascript" src="{{ asset('home/js/jquery.easing.1.3.js') }}"></script>
    <!-- Sticky Menu -->
    <script src="{{ ('home/js/jquery.sticky.js') }}"></script>
    <script src="{{ ('home/js/isotope-docs.min.js') }}"></script>
	<!-- <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script> -->
    <script type="text/javascript" src="{{ asset('home/js/custom.js') }}"></script>
	<script>
		 $(".main-nav").sticky();
	</script>

	<script>
		// Scroll to top button appear
		$(document).on('scroll', function() {
		var scrollDistance = $(this).scrollTop();
		if (scrollDistance > 100) {
			$('.scroll-to-top').fadeIn();
			
		} else {
			$('.scroll-to-top').fadeOut();
		}
		});

		// Smooth scrolling using jQuery easing
		$(document).on('click', 'a.scroll-to-top', function(event) {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		event.preventDefault();
		});
		new WOW().init();
    </script>
  </body>
</html>
