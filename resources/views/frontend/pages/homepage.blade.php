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
							<h1 class="m-b-20"><strong>Welcome To <br>Koushika's Online Food Ordering System</strong></h1>
							<p class="m-b-40">See how your users experience your website in realtime or view  <br> 
							trends to see any changes in performance over time.</p>
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="{{url('/frontend/images/slider-02.jpg')}}" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Koushika's Online Food Ordering System</strong></h1>
							<p class="m-b-40">Explore the ever-evolving journey of user experience on our website, where every interaction is a chapter in real-time. <br> 
							trends to see any changes in performance over time.</p>
							
						</div>
					</div>
				</div>
			</li>
			<li class="text-left">
				<img src="https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?cs=srgb&dl=pexels-ella-olsson-572949-1640772.jpg&fm=jpg" alt="">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h1 class="m-b-20"><strong>Welcome To <br> Koushika's Online Food Ordering System</strong></h1>
							<p class="m-b-40">Taste the live excitement of user interaction on our food website, where every recipe click is a step towards culinary delight <br> 
							trends to see any changes in performance over time.</p>
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
						" With a flick of the wrist and a dash of spice,
                          We turn ingredients into something nice. "
					</p>
					<span class="lead">Koushika Akter</span>
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
						<h2>All Foods</h2>
						<p>Savor our chef's special menu, a delightful mix of flavors made just for you. Enjoy our top picks, where each dish is a tasty tale of culinary mastery. Treat yourself to our handpicked specials, each one a delicious work of art. </p>
					</div>
				</div>
			</div>
			
			<div class="row inner-menu-box">
				
				<div class="col-9">
					<div class="tab-content" id="v-pills-tabContent">
						<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
							<div class="row">
								@foreach($foods as $food)

								<div class="col-lg-4 col-md-6 special-grid drinks">
									<div class="gallery-single fix">
										<img style="height: 200px; width:max-content;" src="{{url('/uploads/food/'.$food->image)}}" class="img-fluid" alt="Image">
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
							<img class="img-fluid" src="https://st2.depositphotos.com/1001855/7085/i/450/depositphotos_70854583-stock-photo-homemade-food-preparation.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-02.jpg">
							<img class="img-fluid" src="https://img.freepik.com/free-photo/close-up-view-dinner-cooking-with-eggs-fresh-vegetables-spices-eggs-fallen-oil-bottle-green-bundles-fallen-oil-bottle_140725-138975.jpg" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-03.jpg">
							<img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAndL289IkyXp5VdjGiXO3tKTBHIbN3oKBeg&s" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-12 col-md-4 col-lg-4">
						<a class="lightbox" href="https://thumbs.dreamstime.com/b/cozy-restaurant-tables-ready-dinner-39875776.jpg">
							<img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlvSuxY1SomtJEBPXGtD43ckcksIlmVk-D1w&s" alt="Gallery Images">
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="images/gallery-img-05.jpg">
							<img class="img-fluid" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7LFuviPM6nObF5WwI3BtNNW-QoPcf5ecI9g&s" alt="Gallery Images">
						</a>
					</div> 
					<div class="col-sm-6 col-md-4 col-lg-4">
						<a class="lightbox" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQCOQcdOntdoQYJUUx5VPz2nBHdR7SIOA8USA&s">
							<img class="img-fluid" src="data:image/jpeg;base64,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"  alt="Gallery Images">
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
						<h2>Our Special Chefs</h2>
						<p> It's not just about cooking. It's also about showing that we have something special to offer through online to you.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8 mr-auto ml-auto text-center">
					<div id="reviews" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner mt-4">
							<div class="carousel-item text-center active">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuea_oidAiB73wqD-3rg9XG8UYywHOt6PGsg&s" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Rafsan Hauque</strong></h5>
								<h6 class="text-dark m-0">Executive Chef</h6>
								<p class="m-0 pt-3">A top chef has a deep appreciation for ingredients, sourcing the best produce and products to create dishes that showcase the flavors and freshness of each component.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
									<img class="d-block w-100 rounded-circle" src="data:image/jpeg;base64,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" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Kishwar Chowdhury</strong></h5>
								<h6 class="text-dark m-0">Head Chef</h6>
								<p class="m-0 pt-3"> A great chef is a culinary artist, constantly innovating and creating new dishes that surprise and delight diners.</p>
							</div>
							<div class="carousel-item text-center">
								<div class="img-box p-1 border rounded-circle m-auto">
								<img class="d-block w-100 rounded-circle" src="data:image/jpeg;base64,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" alt="">
								</div>
								<h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Koshika Akter</strong></h5>
								<h6 class="text-dark m-0">Deputy Chef</h6>
								<p class="m-0 pt-3">Managing multiple tasks simultaneously is crucial in a busy kitchen. A chef must prioritize effectively, ensuring that dishes are prepared and served on time without sacrificing quality.</p>
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
							01639608940
						</p>
					</div>
				</div>
				<div class="col-md-4 arrow-right">
					<i class="fa fa-envelope"></i>
					<div class="overflow-hidden">
						<h4>Email</h4>
						<p class="lead">
							koushika@gmail.com
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<i class="fa fa-map-marker"></i>
					<div class="overflow-hidden">
						<h4>Location</h4>
						<p class="lead">
						Bashundhara,Block F,Road 19,House-12
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Contact info -->
	


@endsection