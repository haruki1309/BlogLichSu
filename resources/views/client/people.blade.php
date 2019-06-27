@extends('client.master')

@section('title')
    BlogLichSu | Nhân vật lịch sử
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/client/search.css')}}">
<div class="content">
	<div class="content-result">
		<div class="title-result">
			<span class="resultfor">Nhân vật lịch sử</span>
		</div>

		<div class="result-list">
			@foreach($post as $p)
				<a href="posts/{{$p->TenBaiVietKhongDau}}">
					<div class="result-ele">
						<div class="ele-img">
							<img src="{!! url('/Asset/'.$p->picture[0]->HinhAnh) !!}" alt="">
						</div>
						
						<div class="ele-info">
							<p class="ele-title">{{$p->TenBaiViet}}</p>
							<span><i class="fas fa-calendar-week"></i></span>
							<span class="ele-date">{{date('d/m/Y', strtotime($p->NgayDang))}}</span><br>
							<p class="ele-sub-title">{!! $p->Mota !!}</p>
						</div>
					</div>
				</a>
			@endforeach

			{!! $post->links() !!}
		</div>

	</div>

	<div class="recent-news-wrapper">
		<div class="news">
			<div class="recent-category">BÀI MỚI ĐĂNG</div>
			<div class="recent-ele-wrap">
				@foreach($newpost as $new)
					<a href="posts/{{$new->TenBaiVietKhongDau}}">
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
				@endforeach
			</div>
		</div>			
	</div>
</div>
@stop