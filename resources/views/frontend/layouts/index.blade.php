@php
                    $count=0;
                @endphp
<!DOCTYPE html>
<html>
<head>
	<title>Just Chill</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('/assets/frontend') }}/CSS/customize.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<!-- Header Section -->
	<section class="header">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<a href="" class="navbar-brand"><img src="{{ url('/upload/logo').'/'.$logo->logo}}" class="logodesign"></a>
				<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"><span class="navbar-toggler-icon"></span></button>
				<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<div class="navbar-nav font-navbar">
						<a href="{{ route('hmpg') }}" class="nav-item nav-link active">Home</a>
						<div class="nav-item dropdown">
							<a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">About Us</a>
							<div class="dropdown-menu bg-dropdown">
								<a href="{{ route('about') }}" class="dropdown-item">About Us</a>
								<a href="" class="dropdown-item">Mission</a>
								<a href="" class="dropdown-item">Vision</a>
							</div>
						</div>
						<a href="" class="nav-item nav-link active">News & Events</a>
						<a href="{{ route('contact') }}" class="nav-item nav-link active">Contact Us</a>
						<a href="{{ route('login') }}" class="nav-item nav-link active">Login</a>
					</div>
					<div class="navbar-nav">
						<form class="form-inline">
							<div class="input-group">
								<input type="text" name="search" placeholder="Search">
								<div class="input-group-append">
									<button type="button" class="btn btn-secondary">
										Search
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</nav>
		</div>
	</section>
	<!-- Slider Section -->
	<section class="slider_part">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
                @foreach ($sliders as $key => $item)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $key }}" class="{{ ($count==0)?'active':'' }}"></li>
                @endforeach


		    </ol>

            <div class="carousel-inner" role="listbox">
                @foreach ($sliders as $item)
                    <div class="carousel-item {{ ($count==0)?'active':'' }}" style="background-image: url({{ asset('/upload/slider').'/'.$item->slider }}) ">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="display-4">{{ $item->title }}</h2>
                        <p class="lead">{{ $item->description }}</p>
                    </div>
                    </div>
                    @php
                $count=$count+1
                @endphp

                @endforeach
            </div>


		    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		          <span class="sr-only">Previous</span>
		    </a>
		    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		          <span class="carousel-control-next-icon" aria-hidden="true"></span>
		          <span class="sr-only">Next</span>
		    </a>
		</div>
	</section>
	<!-- Mission & Vision Section -->
	<section class="mission_vision" >
		<div class="container" >
			<div class="row">
				<div class="col-md-4">
					<h3 class="msn_vsn">Mission & Vision</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<img src="{{ url('upload/mission') .'/'.$mission->image}}" class="images">
					<p class="damitext">{{ $mission->description }}</p>
				</div>
				<div class="col-md-6">
					<img src="{{ url('upload/vision') .'/'.$vision->image}}" class="images">
					<p class="damitext">{{ $vision->description }}</p>
				</div>
			</div>
		</div>
	</section>
	<!-- News & Event Section -->
	<section class="news_events">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3>News & Events</h3>
				</div>
				<div class="col-md-9">
					<table class="table table-striped table-bordered table-hover table-responsive-lg table-success">
						<thead class="thead-dark">
							<tr>
								<th>SL</th>
								<th>Date</th>
								<th>Image</th>
								<th>Title</th>
								<th>Action</th>
							</tr>
						</thead>
                            <tbody>
                                @foreach ($news as $key=> $item)
                                <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ date('d-m-Y',strtotime($item->date)) }}</td>
                                <td><img src="{{ url('upload/news/'.$item->image) }}" class="newsimage"></td>
                                <td>{{ $item->title }}</td>
                                <td><a href="{{ route('news.detail',$item->id) }}" class="btn btn-info">Details</a></td>
                                </tr>
                                @endforeach
                            </tbody>
					</table>
				</div>
			</div>
		</div>
	</section>

	<!-- Services Tap Section -->
	<section class="our_services">
		<div class="container">
			<!-- nav_Tab -->
            @php
                $count=0;
            @endphp
			<ul class="nav nav-tabs">
                @foreach ($service as $item)
                <li class="nav-item">
					<a href="#{{ $item->id }}" class="nav-link {{ ($count==0)?'active':'' }}" data-toggle="tab">{{$item->title}}</a>
				</li>
                @php
                    $count++;
                @endphp
                @endforeach

			</ul>
			<!-- Tab Content -->

			<div class="tab-content">
                @php
                $counts=0;
                @endphp
                @foreach ($service as $items)
				<div id="{{ $items->id }}" class="container tab-pane {{ ($counts==0)?'active':'' }}"><br>
					<h2>{{ $items->title }}</h2>
					<p>{{ $items->description }}</p>
				</div>
                @php
                    $counts++;
                @endphp
                @endforeach
			</div>
		</div>
	</section>

	<!-- footer Section -->
	<section class="footer_part">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h3 class="footer_h3">
						Contact Us
					</h3>
					<p class="footer_p">Address: {{ $contact->address }}, Mobile: {{ $contact->number }}, Email: {{ $contact->email }}</p>
				</div>
				<div class="col-md-4">
					<h3 class="footer_h3">Follow Us</h3>
					<div class="social">
						<ul>
							<li>
								<a href="{{ $contact->fb_link }}" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="{{ $contact->youtube_link }}" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="{{ $contact->twitter_link }}" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="{{ $contact->linked_in_link }}" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="{{ $contact->gplus_link }}" target="_blank"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<p class="copy_p">Copyright &copy; <script type="text/javascript">document.write(new Date().getFullYear())</script> @Md. Yousuf Hossain</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="gototop">
						<img src="{{ asset('/assets/frontend') }}/image/top1.png">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$(window).scroll(function(){
				if($(this).scrollTop()>450){
					$('.gototop').fadeIn();
				}else{
					$('.gototop').fadeOut();
				}
			});
			$('.gototop').click(function(){
				$('html,body').animate({scrollTop:0},1500);
			});
		});
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>
