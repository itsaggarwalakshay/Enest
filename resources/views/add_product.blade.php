<!DOCTYPE html>
<html>
<head>
	<title>ENEST-2</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Catamaran&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
			
			<div class="sign-up">
				<div class="sign" >
					<p>Add Product</p>
					<div  class="user-info">
						@if(Session::has('error'))
						<p class="text-danger">{{Session::get('error')}}</p>
						@endif
						@if(Session::has('success'))
						<p class="text-success">{{Session::get('success')}}</p>
						@endif
						<form action="{{url('add_product')}}" method="post" 
						enctype="multipart/form-data">
						@csrf
							<table class="login-1">
								<tr class="inpt-1">
									<td ><span>product name</span></td>
									<td><input type="text" name="p_name"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>model name</span></td>
									<td><input type="text" name="p_model"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>model prize</span></td>
									<td><input type="text" name="p_prize"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>manufacturer </span></td>
									<td><input type="text" name="p_manufacturer"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>special</span></td>
									<td>
										<input type="checkbox" name="special">
									</td>
								</tr>
								<tr class="inpt-1">
									<td ><span>product Image </span></td>
									<td>
										<input type="file" name="p_image" style="width:180px;background: white;">
									</td>
								</tr>
								<tr class="inpt-1">
									<td ><span>category name</span></td>
									<td>
										<select  class="form-select" name="p_category"
										style="width:200px">
											<option value="">Choose a currency from</option>
											@foreach($data as $row)
											<option value="{{$row->category_name}}">{{$row->category_name}}</option>
											<!-- <option value="{{$row->id}}">{{$row->category_name}}</option> -->
											@endforeach
										</select>
									</td>
								</tr>

								<tr class="logn-btn" >
									<td></td>
									<td><input class="log" type="submit" name="save" value="save">
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>
			<div class="footer-1">
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
</html>