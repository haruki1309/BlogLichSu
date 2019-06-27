@extends('admin.master')

@section('title')
    Admin Dashboard | New Post
@stop

@section('content')
<link rel="stylesheet" href="{{asset('css/admin/news.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="{{asset('js/kickstart.js')}}"></script> <!-- KICKSTART -->
<link rel="stylesheet" href="{{asset('css/kickstart.css')}}" media="all" /> <!-- KICKSTART -->
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" language="javascript" src="{{asset('ckeditor/ckeditor.js')}}"></script>

<div class="noti-wrapper">
    @if(count($errors) > 0)
        <div class="errors">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li><br>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('message'))
        <div class="notifications">
            {{session('message')}}<br>
        </div>
    @endif

</div>

<form action="create-new-post" method="post" class="data-form" enctype="multipart/form-data">
    <fieldset>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">            
        <div>
            <label for= "TenBaiViet">Tên bài viết:</label>   
            <input type="text" id='TenBaiViet' name='TenBaiViet' value="{{old('TenBaiViet')}}"/> 
        </div>
        <div>
            <label for= "MaGiaiDoan">Giai đoạn:</label>
            <select id="MaGiaiDoan" name='MaGiaiDoan'>
                <option>1858-1918</option>
                <option>1919-1945</option>
                <option>1945-1954</option>
                <option>1954-1975</option>
                <option>1975-1986</option>
                <option>1986-Nay</option>

            </select>
        </div>

        <div>
            <label for="ChuyenMuc">Chuyên mục</label>
            <select id="ChuyenMuc" name='ChuyenMuc'>
                <option>Sự kiện</option>
                <option>Nhân vật</option>
            </select>
        </div>

        <div>
            <label for= "HinhAnh">Hình ảnh: </label>
            <input type="file" id='HinhAnh' name='HinhAnh'/>    
        </div>

        <div>
            <label for= "Mota">Mô tả:</label>   
            <input type="text" id='Mota' name='Mota' value="{{old('Mota')}}"/> 
        </div>
        <br>

        <div>
            <label for= "ThongTinBaiViet">Nội dung:</label>
            <textarea id="ThongTinBaiViet" class="ckeditor" name='ThongTinBaiViet'>
                {{old('ThongTinBaiViet')}}
            </textarea>    
        </div>
        <script>
            CKEDITOR.replace('ThongTinBaiViet');
        </script>
        <div>
            <button type="submit">Thêm</button>
            <button type="reset">Refresh</button>        
        </div>
        
    </fieldset>
</form>
@stop