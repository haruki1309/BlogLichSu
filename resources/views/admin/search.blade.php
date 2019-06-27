@extends('admin.master')

@section('title')
    Search Result: {{$key}}
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('css/admin/admin.css')}}">
<div class="content-wrapper">
	@if(session('message'))
        <div class="notifications">
            {{session('message')}}<br>
        </div>
    @endif


	<div class="grid-post">
		@foreach ($post as $p)

		<div class="post">
			<div class="img">
				<div class="btn-wrapper">
					<a href="delete/{{$p->TenBaiVietKhongDau}}"><div class="delete-btn"><i class="far fa-trash-alt"></i></div></a>
					<a href="posts/{{$p->TenBaiVietKhongDau}}"><div class="edit-btn"><i class="fas fa-edit"></i></div></a>
				</div>
				<img src="{!! url('/Asset/'.$p->picture[0]->HinhAnh) !!}" alt="HinhAnh">
			</div>
			<div class="title">
				<h3>{{$p->TenBaiViet}}</h3>
			</div>
		</div>
		
		@endforeach
	</div>
</div>
@stop