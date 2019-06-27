<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title> 
	<link rel="stylesheet" type="text/css" href="{{asset('css/admin/master.css')}}">
    <script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
</head>

<body>
	<nav class="nav">
		<ul>
			<li>
				<a href="">{{$admin->username}}</a>
				<ul>
					<li><a href="{{url('logout')}}">Đăng Xuất</a></li>
				</ul>
			</li>
			<li><a href="{{url('admin/create-new-post')}}">Tạo bài viết</a></li>
			<li>
				<a href="">Lọc bài viết <i class="fas fa-caret-down"></i></a>
				<ul>
					<li><a href="{{url('admin/peoples')}}">Nhân vật</a></li>
					<li><a href="{{url('admin/events')}}">Sự kiện</a></li>
					<li><a href="{{url('admin/posts')}}">Tất cả bài viết</a></li>
				</ul>
			</li>
		</ul>

		<form action="search" method="post" class="search-form" role="search">
			<div class="search-wrapper">
				<input type="hidden" name="_token" value="{{csrf_token()}}";>
				<div class="search-box">
					<input type="text" name="searchKey">
					<button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
				</div>
			</div>
		</form>
	</nav>

	@section('content')

	@show

</body>