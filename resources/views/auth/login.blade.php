<!DOCTYPE html>
<html>
<head>
	<title>ENEST-2</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC|Catamaran&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="main-div">
		<div class="head-div">
			<div class="main">
				<div class="head">
					<span>EVEST</span>
					<p>THE BIGGEST CHOICE OF THE WEB</p>
				</div>
				<div class="btn">
					<input type="button" name="" value="Log in">
				</div>
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
			<div class="footer">
				@if(Session::has('error'))
					<div class="alert alert-danger" role="alert">
					  {{Session::get('error')}}
					</div>	
				@endif
				<div class="login-here">

					<div class="login">
						<p>Login Here</p>
						<div  class="user-info">
							
							<form action="{{url('login')}}" method="post">
								@csrf
								<table class="login-1">
									<tr class="inpt">
										<td ><span>Username</span></td>
										<td><input type="text" name="name"></td>
									</tr><br>
									<tr class="inpt">
										<td ><span>Password</span></td>
										<td><input type="password" name="password"></td>
									</tr>
									<tr class="logn-btn" >
										<td></td>
										<td><input class="log" type="submit" name="login" value="Login">
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="sign-up">
				<div class="sign">
					<p>New to Enest? <a href=""> Sign up</a></p>
					<div  class="user-info">
					
						<form action="{{url('register')}}" method="post">
						@csrf
							<table class="login-1">
								<tr class="inpt-1">
									<td ><span>Username</span></td>
									<td><input type="text" name="name"></td>
								</tr>
								<tr class="inpt-1">
									<td ><span>Password</span></td>
									<td><input type="password" name="password"></td>
								</tr>
								<tr class="logn-btn" >
									<td></td>
									<td><input class="log" type="submit" name="register" value="Sign up">
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