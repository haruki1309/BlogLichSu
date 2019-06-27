<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title> 
	<link rel="stylesheet" type="text/css" href="{{asset('css/client/master.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
</head>

<body>
	<nav>
		<input type="checkbox" id="nav" class="hidden">
		<label for="nav" class="nav-btn">
			<i></i>
			<i></i>
			<i></i>
		</label>
		<div class="logo">
			<a href="{{url('/')}}">BLOGLICHSU</a>
		</div>

		<form action="search" method="get" class="search-form" role="search">
			<div class="search-wrapper">
				<input type="hidden" name="_token" value="{{csrf_token()}}";>
				<div class="search-box">
					<input type="text" name="searchKey">
					<button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>

		<div class="nav-wrapper">
			<ul>
				<li><a href="{{url('/')}}">Trang chủ</a></li>
				<li><a href="{{url('/events')}}">Sự kiện</a></li>
				<li><a href="{{url('/peoples')}}">Nhân vật</a></li>
			</ul>
		</div>
	</nav>

	@section('content')

	@show

	@section('footer')
	<section class="footer"></section>
	@show
</body>