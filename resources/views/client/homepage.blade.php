@extends('client.master')

@section('title')
    BlogLichSu | Homepage
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/client/homepage.css')}}">

<script type="text/javascript">
	$(window).on('scroll', function(){
		if($(window).scrollTop()){
			$('nav').addClass('black');
		}
		else{
			$('nav').removeClass('black');
		}
	})
</script>

<section class="background">
	<h1>Lịch Sử Việt Nam</h1>
	<h2>1858 - 1986</h2>
</section>

<section class="content">
	<section class="recent-news">
		<div class="wrapper">
			<h1 class="category">Bài viết mới nhất</h1>
			
			<div class="row">
				<div class="news-active">
					@foreach($post as $p)
						<div class="col-md-4">
							<a href="posts/{{$p->TenBaiVietKhongDau}}">
								<div class="lastest-news-wrap">
									<div class="news-img">
										<img src="{!! url('/Asset/'.$p->picture[0]->HinhAnh) !!}">

										<div class="date">
											<span>{{date('d/m/Y', strtotime($p->NgayDang))}}</span>
										</div>
									</div>

									<div class="title">
										<h1>{{$p->TenBaiViet}}</h1>
									</div>

									<div class="sub-title">
										<p>
											{!! $p->Mota !!}
										</p>
									</div>
								</div>
							</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	<section class="timeline-events">
		<div class="wrapper">
			<h1 class="category">Các giai đoạn lịch sử</h1>

			<div class="row">
				<div class="col-md-3">
					<a href="stage/1">
						<div class="event-wrapper">
							<div class="img-wrapper">
								<img src="Asset/html/1885.jpg" alt="">
							</div>

							<div class="text-wrapper">
								<div class="text-wrapper-inside">
									<div class="year">1858 - 1918</div>

									<div class="title-wrapper">
											<div class="title">Chiến tranh Pháp - Đại Nam</div>
											<div class="sub-title">
												Cuộc chiến giữa nhà Nguyễn của Đại Nam và Đế quốc thực dân Pháp, diễn ra từ năm 1858 đến năm 1884
											</div>	
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-3">
					<a href="stage/2">
						<div class="event-wrapper">
							<div class="img-wrapper">
								<img src="Asset/html/1954.jpg">
							</div>

							<div class="text-wrapper">
								<div class="text-wrapper-inside">
									<div class="year">1918 - 1954</div>

									<div class="title-wrapper">
											<div class="title">Kháng chiến chống thực dân Pháp</div>
											<div class="sub-title">
												Giai đoạn kháng chiến chống thực dân pháp xâm lược, nhà nước Việt Nam Dân chủ Cộng hòa được khai sinh, miền Bắc được giải phóng.
											</div>	
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-3">
					<a href="stage/3">
						<div class="event-wrapper">
							<div class="img-wrapper">
								<img src="Asset/html/1975.jpg">
							</div>

							<div class="text-wrapper">
								<div class="text-wrapper-inside">
									<div class="year">1954 - 1975</div>

									<div class="title-wrapper">
											<div class="title">Kháng chiến chống Đế quốc Mỹ</div>
											<div class="sub-title">
												Giai đoạn miền Bắc xây dựng chủ nghĩa xã hội, cả nước hướng đến giải phóng miền Nam, thống nhất 2 miền bị chia cắt, tiêu biểu là chiến dịch HCM lịch sử
											</div>	
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-3">
					<a href="stage/4">
						<div class="event-wrapper">
							<div class="img-wrapper">
								<img src="Asset/html/1978.jpg">
							</div>

							<div class="text-wrapper">
								<div class="text-wrapper-inside">
									<div class="year">1978 - 1986</div>

									<div class="title-wrapper">
											<div class="title">Chiến tranh biên giới Việt Nam - Trung Quốc</div>
											<div class="sub-title">
												Chiến tranh biên giới Việt - Trung bắt nguồn từ quan hệ căng thẳng kéo dài giữa hai quốc gia, là một cuộc chiến ngắn nhưng khốc liệt, hơn 5 vạn chiến sĩ chết và bị thương.
											</div>	
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>	
			</div>
		</div>
	</section>

	<section class="historical-figures">
		<div class="wrapper">
			<h1 class="category">Anh hùng dân tộc</h1>

			<div class="people-list">

				@foreach($people as $peo)
					<a href="posts/{{$peo->TenBaiVietKhongDau}}">
					<div class="people-ele">	
							<div class="img-wrapper">
								<img src="{!! url('/Asset/'.$peo->picture[0]->HinhAnh) !!}" class="figures-img" alt="">
							</div>

							<div class="title-wrapper">
								<div class="title-div">
									<h1 class="title">{{$peo->TenBaiViet}}</h1>
									<h3 class="sub-title">{!! $peo->Mota !!}</h3>
								</div>
								
								<div class="publish-date">
									<span>Đăng ngày </span>
									<span>{{date('d/m/Y', strtotime($peo->NgayDang))}}</span>
									<span> bởi: </span>
									<span>{{$peo->user->username}}</span>
								</div>
							</div>					
						</div>
					</a>
				@endforeach
			</div>
		</div>
	</section>
</section>
@stop