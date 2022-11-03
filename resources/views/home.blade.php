@extends('layouts.app')
@section('content')

<body>
	<div class="main-div">
		<div class="head-div">
			<div class="main">
				<div class="head">
					<span>EVEST</span>
					<p>THE BIGGEST CHOICE OF THE WEB</p>
				</div>
				@if(Auth::user())
				<a href="{{url('/logout')}}">
					<div class="btn">
						<input type="submit" name="logout" value="Logout">

					</div>
				</a>
				<span style="color: white;">Username: {{ Auth::user()->name}}</span>
				@else
				<a href="{{url('/login')}}">
					<div class="btn">
						<input type="button" name="" value="Log in">
					</div>
				</a>
				@endif

			</div>
		</div>

		<div class="home-page">
			<div class="pagnation">
				<div class="list">
					<ul>
						@if(Auth::user())
						<a href="{{url('/home')}}"><li>HOME</li></a>
						<a href="{{url('/add_product')}}"><li>NEW PRODUCT</li></a>
						<a href="{{url('/my_cart')}}"><li>MY CART</li></a>
						<a href="{{url('/all_products')}}"><li>ALL PRODUCTS</li></a>
						<a href="{{url('/special')}}"><li>SPECIAL</li></a>
						<a href="{{url('/contact')}}"><li>CONTACT</li></a>
						@else
						<a href="{{url('/home')}}"><li>HOME</li></a>
						<a href="{{url('/error')}}"><li>NEW PRODUCT</li></a>
						<a href="{{url('/error')}}"><li>MY CART</li></a>
						<a href="{{url('/all_products')}}"><li>ALL PRODUCTS</li></a>
						<a href="{{url('/error')}}"><li>SPECIAL</li></a>
						<a href="{{url('/contact')}}"><li>CONTACT</li></a>
						@endif
					</ul>
				</div>
				<div class="search">
					<div class="search-1">
						<div class="input">
							<input type="text" name="">
						</div>
						<div class="btnn">
							<input type="button" name="" value="Search">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="null">

		</div>
		<div class="main-categorious">
			@if(Session::has('error'))
			<div class="alert alert-danger" role="alert">
				{{Session::get('error')}}
			</div>	
			@endif
			<div class="footer">
				<div class="main-img">
					<img src="images/16.png">
				</div>
				<div class="categorious">
					<div class="cate-heading">
						<p>CATEGORIES</p>
					</div>
					<div class="items">
						<ul>
							@isset($data)
							@foreach($data as $category)
							<a href="{{url('/search_categogy/'.$category->id)}}">
								<li>{{$category->category_name}}</li>
							</a>
							@endforeach
							@endisset
						</ul>
					</div>
				</div>
				<div class="contact">
					<div class="contact-us">
						<p>FEATURED PRODUCTS</p>
					</div>
					<div class="Camera-info">

						@foreach($images as $row)
						<div class="samsung-cam" style="height: auto;padding: 1rem;margin: 3px;">
							<div class="cam-info">
								<img src="{{ asset('images/'. $row->p_image)}}">
								<div class="sam-prc">
									<span>{{$row->p_name}}</span>
									<p>Rs.{{$row->p_prize}}</p>
								</div>
								<hr class="hr2">
								<div class="cart-btn" style="background: red; width: 100%;">
									<a href="http://localhost/aa/public/add_to_cart_display/{{$row->id}}">
										<input type="submit" name="" value="Add to cart" style="width:100%;">
									</a>
								</div>
							</div>
						</div>
						@endforeach
						<!-- --- -->

						<!-- -- -->
					</div>
				</div>
				<div class="list-1">
					<ul>
						<li>HOME</li>
						<li>NEW PROJECT</li>
						<li>SPECIAL</li>
						<li>ALL PRODUCTS</li>
						<li>REVIEWS</li>
						<li>CONTACT</li>
						<li>FAQS</li>
					</ul>
				</div>
				<div class="footer-2">
					<p>Copyright <i class="fa fa-copyright" aria-hidden="true"></i>2013 Enest.Privacy Notice</p>
				</div>
			</div>
		</div>
	</div>
</body>
@endsection