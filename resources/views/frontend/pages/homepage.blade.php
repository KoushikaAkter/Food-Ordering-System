@extends('frontend.master')


@section('content')



	<!-- Start slides -->
	<div id="slides" class="cover-slides">
		<ul class="slides-container">
			<li class="text-left">
				<img src="{{url('/frontend/images/slider-01.jpg')}}" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Live Dinner Restaurant</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="{{url('/frontend/images/slider-02.jpg')}}" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Live Dinner Restaurant</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="images/slider-03.jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Yamifood Restaurant</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
							<p><a class="btn btn-lg btn-circle btn-outline-new-white" href="#">Reservation</a></p>
						</div>
					</div>
				</div>
			</li>
		</ul>
		<div class="slides-navigation">
			<a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
		</div>
	</div>
	<!-- End slides -->
	
	<!-- Start QT -->
	<div class="qt-box qt-background">
		<div class="container">
			<div class="row">
				<div class="col-md-8 ml-auto mr-auto text-center">
					<p class="lead ">
						" If you're not the one cooking, stay out of the way and compliment the chef. "
					</p>
					<span class="lead">Michael Strahan</span>
				</div>
			</div>
		</div>
	</div>
	<!-- End QT -->
	
	<!-- Start Menu -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Special Menu</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">
				<div class="col-3">
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">All</a>
						<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Pizza</a>
						<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Burger</</a>
						<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Drinks</a>
					</div>
				</div>
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								@foreach($foods as $food)

								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="{{url('/uploads/food/'.$food->image)}}" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>{{$food->name}}</h4>
											<p>{{$food->description}}</p>
											<h5>BDT {{$food->price}}</h5>
											<h5>Stock {{$food->quantity}}</h5>
											
										</div>
									</div>
									<a href="{{route('add.to.cart',$food->id)}}" class="btn btn-success">Add to Cart</a>
								</div>
								@endforeach
								
							</div>
							
						</div>
						<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/img-01.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Drinks 1</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $7.79</h5>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/img-02.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Drinks 2</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $9.79</h5>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img src="images/img-03.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Drinks 3</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $10.79</h5>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid lunch">
									<div class="gallery-single fix">
										<img src="images/img-04.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Lunch 1</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $15.79</h5>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid lunch">
									<div class="gallery-single fix">
										<img src="images/img-05.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Lunch 2</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $18.79</h5>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid lunch">
									<div class="gallery-single fix">
										<img src="images/img-06.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Lunch 3</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $20.79</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
							<div class="row">
								<div class="col-lg-4 col-md-6 special-grid dinner">
									<div class="gallery-single fix">
										<img src="images/img-07.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Dinner 1</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $25.79</h5>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid dinner">
									<div class="gallery-single fix">
										<img src="images/img-08.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Dinner 2</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $22.79</h5>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-6 special-grid dinner">
									<div class="gallery-single fix">
										<img src="images/img-09.jpg" class="img-fluid" alt="Image">
										<div class="why-text">
											<h4>Special Dinner 3</h4>
											<p>Sed id magna vitae eros sagittis euismod.</p>
											<h5> $24.79</h5>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!-- End Menu -->
	
	<!-- Start Gallery -->
	<div class="gallery-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Gallery</h2>
						<p>Fast food is our specialty. Food that is more accessible. Fresh for your taste buds. Freshness delivered. Good food in minutes. Home food delivery service </p>
					</div>
				</div>
			</div>
			<div class="tz-gallery">
				<div class="row">
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-01.jpg">
							<img class="img-fluid" src="https://scdn.aro.ie/Sites/50/imperialhotels2022/uploads/images/PanelImages/General/156757283_Bedford_Hotel__F_B__Botanica_Restaurant_and_Bar__General_View._4500x3000.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-02.jpg">
							<img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqoLFAa34VtvAMp-crygG8qp6-MQxqgcA84kr8SZ6Usg&s" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-03.jpg">
							<img class="img-fluid" src="https://t4.ftcdn.net/jpg/04/46/73/23/360_F_446732330_sagMrunUavJovxmdQJWZIUWV6HrbdipK.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="https://thumbs.dreamstime.com/b/cozy-restaurant-tables-ready-dinner-39875776.jpg">
							<img class="img-fluid" src="images/gallery-img-04.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-05.jpg">
							<img class="img-fluid" src="https://img.freepik.com/free-photo/close-up-appetizing-ramadan-meal_23-2151182451.jpg" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCOQcdOntdoQYJUUx5VPz2nBHdR7SIOA8USA&s">
							<img class="img-fluid" src="images/gallery-img-06.jpg" alt="Gallery Images">
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Gallery -->
	
	<!-- Start Customer Reviews -->
	<div class="customer-reviews-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Customer Reviews</h2>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="data:image/jpeg;base64,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" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
								<h6 class="text-dark m-0">Web Developer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
								<h6 class="text-dark m-0">Web Designer</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="images/quotations-button.png" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
								<h6 class="text-dark m-0">Seo Analyst</h6>
								<p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
							</div>
						</div>
						<a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
							<i class="fa fa-angle-left" aria-hidden="true"></i>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							<span class="sr-only">Next</span>
						</a>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Customer Reviews -->
	
	<!-- Start Contact info -->
	<div class="contact-imfo-box">
		<div class="container">
			<div class="row">
				<div class="col-md-4 arrow-right">
					<i class="fa fa-volume-control-phone"></i>
					<div class="overflow-hidden">
						<h4>Phone</h4>
						<p class="lead">
							+01 123-456-4590
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							yourmail@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
							800, Lorem Street, US
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	


@endsection