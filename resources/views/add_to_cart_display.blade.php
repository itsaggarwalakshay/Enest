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
				@if(Auth::user()->name)
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
						<a href="{{url('/home')}}"><li>HOME</li></a>
						<a href="{{url('/add_product')}}"><li>NEW PRODUCT</li></a>
						<a href="{{url('/my_cart')}}"><li>MY CART</li></a>
						<a href="{{url('/all_products')}}"><li>ALL PRODUCTS</li></a>
						<a href="{{url('/special')}}"><li>SPECIAL</li></a>
						<a href="{{url('/contact')}}"><li>CONTACT</li></a>
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
			<div class="footer">
				<div class="categorious">
					<div class="cate-heading">
						<p>CATEGORIES</p>
					</div>
					<div class="items">
						<ul>
							@foreach($data as $category)
							<li>{{$category->category_name}}</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="contact">
					
					<div class="contact-us">
						<p>{{$findrecord[0]->p_name}}</p>
					</div>

					<div class="dish-info" style="display: flex; box-shadow: rgba(50, 50, 93, 0.10) 0px 13px 27px -5px, rgba(0, 0, 0, 0.2) 0px 8px 16px -8px;">
						<div class="machine-pic">
							<div class="img">
								<img src="{{ asset('images/'. $findrecord[0]->p_image)}}">
							</div>
							<div class="stock">
								<p>In Stock: 988</p>
							</div>
							
						</div>
						<div class="machine-info">
							<div class="washer">
								<p>{{$findrecord[0]->p_name}}</p>
							</div>
							<div class="model-info" style="margin-top:0px;">
								<span>Model:{{$findrecord[0]->p_model}}</span>
								<p>Manufacturer:{{$findrecord[0]->p_manufacturer}}</p>
							</div>
							<div class="price" style="margin-top: 10px;">
								<span>Rs.{{$findrecord[0]->p_prize}}</span>
							</div>
							<div class="quantity">
								<form action="{{url('add_to_cart_form')}}" method="post">
									@csrf
									<table>
										<input type="hidden" name="product_price" 
										value="{{$findrecord[0]->p_prize}}">
										<input type="hidden" name="product_id" value="{{$findrecord[0]->id}}">
										<tr>
											<td class="qty">Enter quantity</td>
											<td><input type="text" name="quantity"></td>
										</tr>
										<tr>
											<td>
												<div class="checkout">
													<input type="submit" name="save" value="Add to Cart">
												</div>
											</td>
										</tr>
										
									</table>
								</form>
								
							</div>
							<a href="{{url('/my_cart')}}">
							<div class="checkout">
								<input type="submit" name="" value="checkout">
							</div>
							</a>
						</div>
						
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