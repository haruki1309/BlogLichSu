@extends('client.master')

@section('title')
    BlogLichSu | {{$post[0]->TenBaiViet}}
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/client/detail.css')}}"></link>

<section class="body-section">
	<div class="body-wrapper">
		<div class="content">
			<div class="header-title">
				<a href="#" class="category">
					<span>
						<?php  
							if($post[0]->LaNhanVat){
								echo 'NHÂN VẬT LỊCH SỬ';
							}
							else{
								echo 'SỰ KIỆN LỊCH SỬ';
							}
						?>
					</span>
				</a><br>
				<span class="title">{{$post[0]->TenBaiViet}}</span><br>
				<span class="date"><i class="fas fa-calendar-week"></i></span>
				<span class="date-value">{{date('d/m/Y', strtotime($post[0]->NgayDang))}}</span><br>
				<span class="author"><i class="fas fa-user"></i></span>
				<span class="author-value">{{$post[0]->user->username}}</span><br>

			</div>

			<div class="main-img-post">
				<img src="{!! url('/Asset/'.$post[0]->picture[0]->HinhAnh) !!}">
			</div>

			<div class="post-content">
				{!! $post[0]->ThongTinBaiViet !!}
			</div>
		</div>

		<div class="recent-news-wrapper">
			<div class="news">
				<div class="recent-category">BÀI MỚI ĐĂNG</div>
				@foreach($newpost as $new)
					<div class="recent-ele-wrap">
						<a href="{{$new->TenBaiVietKhongDau}}">
							<div class="recent-news-ele">
								<div class="ele-img">
									<img src="{!! url('/Asset/'.$new->picture[0]->HinhAnh) !!}">
								</div>
								<div class="ele-content">
									<span class="ele-title">{{$new->TenBaiViet}}</span><br>
									<span class="ele-description">{{date('d/m/Y', strtotime($new->NgayDang))}}</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>

			<div class="news">
				<div class="recent-category">BÀI LIÊN QUAN</div>
				@foreach($relatedpost as $rpost)
					<div class="recent-ele-wrap">
						<a href="{{$rpost->TenBaiVietKhongDau}}">
							<div class="recent-news-ele">
								<div class="ele-img">
									<img src="{!! url('/Asset/'.$rpost->picture[0]->HinhAnh) !!}">
								</div>
								<div class="ele-content">
									<span class="ele-title">{{$rpost->TenBaiViet}}</span><br>
									<span class="ele-description">{{date('d/m/Y', strtotime($rpost->NgayDang))}}</span>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</section>

		