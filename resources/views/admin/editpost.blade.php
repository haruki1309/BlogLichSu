@extends('admin.master')

@section('title')
    Admin Dashboard | {{$post[0]->TenBaiViet}}
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


<form action="{{$post[0]->TenBaiVietKhongDau}}" method="post" enctype="multipart/form-data" class="data-form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <fieldset>    
        @if(count($post) === 1)
            <div>
                <label for= "TenBaiViet">Tên bài viết:</label>
                @if(old('TenBaiViet') == '')   
                <input type="text" id='TenBaiViet' value="{{$post[0]->TenBaiViet}}" name='TenBaiViet'/> 
                @else
                <input type="text" id='TenBaiViet' value="{{old('TenBaiViet')}}" name='TenBaiViet'/> 
                @endif
            </div>
            <div>
                <label for= "MaGiaiDoan">Giai đoạn:</label>
                <select id="MaGiaiDoan" name='MaGiaiDoan'>
                    @if($post[0]->GiaiDoan_id == 1)
                        <option selected="selected">1858-1918</option>
                        <option>1919-1945</option>
                        <option>1945-1954</option>
                        <option>1954-1975</option>
                        <option>1975-1986</option>
                        <option>1986-Nay</option>

                     @elseif($post[0]->GiaiDoan_id == 2)
                        <option>1858-1918</option>
                        <option selected="selected">1919-1945</option>
                        <option>1945-1954</option>
                        <option>1954-1975</option>
                        <option>1975-1986</option>
                        <option>1986-Nay</option>

                    @elseif($post[0]->GiaiDoan_id == 3)
                        <option>1858-1918</option>
                        <option>1919-1945</option>
                        <option selected="selected">1945-1954</option>
                        <option>1954-1975</option>
                        <option>1975-1986</option>
                        <option>1986-Nay</option>

                    @elseif($post[0]->GiaiDoan_id == 4)
                        <option>1858-1918</option>
                        <option>1919-1945</option>
                        <option>1945-1954</option>
                        <option selected="selected">1954-1975</option>
                        <option>1975-1986</option>
                        <option>1986-Nay</option>

                    @elseif($post[0]->GiaiDoan_id == 5)
                        <option>1858-1918</option>
                        <option>1919-1945</option>
                        <option>1945-1954</option>
                        <option>1954-1975</option>
                        <option selected="selected">1975-1986</option>
                        <option>1986-Nay</option>

                    @elseif($post[0]->GiaiDoan_id == 6)
                        <option>1858-1918</option>
                        <option>1919-1945</option>
                        <option>1945-1954</option>
                        <option>1954-1975</option>
                        <option>1975-1986</option>
                        <option selected="selected">1986-Nay</option>

                    @endif
                    
                </select>
            </div>

            <div>
                <label for="ChuyenMuc">Chuyên mục</label>
                <select id="ChuyenMuc" name='ChuyenMuc'>
                    @if($post[0]->LaNhanVat == 0)
                        <option selected="selected">Sự kiện</option>
                        <option>Nhân vật</option>

                    @elseif($post[0]->LaNhanVat == 1)
                        <option>Sự kiện</option>
                        <option selected="selected">Nhân vật</option>
                    @endif
                </select>
            </div>

            <div>
                <label for= "HinhAnh">Hình ảnh: </label>
                @foreach($post[0]->picture as $pic)
                    <img width = 100px height= 100px src="{!! url('/Asset/'.$pic->HinhAnh) !!}">
                @endforeach
                @if(old('HinhAnh') == '')
                <input type="file" name='HinhAnh' value="{{$post[0]->picture[0]->HinhAnh}}"/>
                @else
                <input type="file" name='HinhAnh' value="{{old('HinhAnh')}}"/>
                @endif    
            </div>
            <div>
                <label for= "Mota">Mô tả:</label>  
                @if(old('Mota') == '') 
                <input type="text" id='Mota' value="{{$post[0]->Mota}}" name='Mota'/> 
                @else
                <input type="text" id='Mota' value="{{old('Mota')}}" name='Mota'/> 
                @endif
            </div>
            <br>
            <div>
                <label for= "ThongTinBaiViet">Nội dung:</label>
                <textarea id="ThongTinBaiViet" class="ckeditor" name='ThongTinBaiViet'>
                    @if(old('ThongTinBaiViet') == '')
                    {{$post[0]->ThongTinBaiViet}}
                    @else
                    {{old('ThongTinBaiViet')}}
                    @endif
                </textarea>    
            </div>
            <script>
                CKEDITOR.replace('ThongTinBaiViet');
            </script>

            <div>
                <button type="submit">Sửa</button>
            </div>

        @endif
    </fieldset>
</form>
@stop
