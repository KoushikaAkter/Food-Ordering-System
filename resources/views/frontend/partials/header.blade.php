<!-- Start header -->
<header class="top-navbar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="index.html">
				<img src="{{url('frontend/images/logo.png')}}" alt="" />
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbars-rs-food">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="{{route('homepage')}}">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('about.us')}}">About</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Categories</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-a">
							@foreach($headerCategories as $category)
							<a class="dropdown-item" href="{{route('food.under.category',$category->id)}}">{{$category->name}}</a>
							@endforeach
						</div>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="{{route('view.cart')}}">Cart({{session()->get('cart') ? count(session()->get('cart')) : 0}})</a>
					</li>


					@auth('customerGuard')
					<li class='fas fa-id-card' style='font-size:24px;'> <a href="">{{auth('customerGuard')->user()->name}}</a></li>
					<a class="dropdown-item" href="{{route('logout.success')}}">Logout</a>

					@endauth

					@guest('customerGuard')
					<li class="nav-item"><a class="nav-link" href="{{route('register')}}">Registration</a></li>
					<li class="nav-item"><a class="nav-link" href="{{route('login.form')}}">Login</a></li>
					@endguest
				</ul>
			</div>
		</div>
	</nav>
</header>
<!-- End header -->