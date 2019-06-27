<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;
use App\HistoryPeriod;
use App\Picture;
use DB;

class AdminController extends Controller
{
    public function GetLogout(){
        Auth::logout();
        return redirect()->intended('admin/login');
    }

    public function GetLoginPage(){
    	return view('admin/login');
    }

    public function PostLogin(Request $request){
        $username = $request->username;
        $password = $request->password;

    	if(Auth::attempt( ['username'=>$username, 'password'=>$password])){
        
    		return redirect('admin/posts');
    	}
    	else{
    		return redirect()->intended('admin/login');
    	}
    }

    public function GetAdminHome(){
        $post = Post::orderBy('NgayDang', 'DESC')->get();
        $admin = Auth::user();
        return view('admin/admin', compact('post', 'admin')); 
    }

    public function GetCreatePostPage(){
        $admin = Auth::user();
        return view('admin/news', compact('admin'));
    }

    public function PostCreatePostPage(Request $request){
        $this->validate($request, [
                'TenBaiViet'=>'required|min:3|unique:BaiViet,TenBaiViet',
                'MaGiaiDoan'=>'required',
                'ChuyenMuc'=>'required',
                'Mota'=>'required',
                'ThongTinBaiViet'=>'required',
                'HinhAnh'=>'required'
            ], [
                'TenBaiViet.required'=>'Bạn chưa nhập tên bài viết',
                'TenBaiViet.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
                'TenBaiViet.unique'=>'Tiêu đề đã tồn tại',
                'MaGiaiDoan.required'=>'Bạn chưa chọn giai đoạn',
                'ChuyenMuc.required'=>'Bạn chưa chọn chuyên mục',
                'Mota.required'=>'Bạn chưa nhập tóm tắt',
                'ThongTinBaiViet.required'=>'Bạn chưa nhập thông tin bài viết',
                'HinhAnh.required'=>'Bạn chưa chọn hình ảnh'
            ]);

        $post = new Post;
        $post->TenBaiViet = $request->TenBaiViet;
        $post->TenBaiVietKhongDau = utf8tourl(utf8convert($request->TenBaiViet));

        switch ($request->MaGiaiDoan) {
            case '1858-1918':
                $post->MaGiaiDoan = 1;
                break;
            case '1919-1945':
                $post->MaGiaiDoan = 2;
                break;
            case '1945-1954':
                $post->MaGiaiDoan = 3;
                break;
            case '1954-1975':
                $post->MaGiaiDoan = 4;
                break;
            case '1975-1986':
                $post->MaGiaiDoan = 5;
                break;
            case '1986-Nay':
                $post->MaGiaiDoan = 6;
                break;
        }
        $admin = Auth::user();
        $post->MaUser = $admin->MaUser;
        $post->NgayDang = date('Y-m-d H:i:s');

        if($request->ChuyenMuc == 'Sự kiện'){
            $post->LaNhanVat = 0;
        }
        else if($request->ChuyenMuc == 'Nhân vật'){
            $post->LaNhanVat = 1;
        }
 
        $post->Mota = $request->Mota;
        $post->ThongTinBaiViet = $request->ThongTinBaiViet;

        $post->save();

        if($request->hasFile('HinhAnh')){
            $file = $request->file('HinhAnh');

            $namePic = $file->getClientOriginalName();
            $pic = str_random(4)."_".$namePic;

            while (file_exists('Asset/'.$pic)) {
                $pic = str_random(4)."_".$namePic;
            }

            $file->move('Asset', $pic);

            //Luu Anh

            $picture = new Picture;
            $picture->MaBaiViet = $post->MaBaiViet;
            $picture->HinhAnh = $pic;
            $picture->save();
        }
        else{
        }

        return redirect('admin/create-new-post')->with('message', 'Thêm bài viết thành công');
    }

    public function GetEditPost($tenbaivietkhongdau){
        $post = Post::where('TenBaiVietKhongDau', $tenbaivietkhongdau)->get();
        $admin = Auth::user();
        return view('admin/editpost', compact('post', 'admin'));
    }

    public function PostEditPost(Request $request, $tenbaivietkhongdau){
        $post = Post::where('TenBaiVietKhongDau', $tenbaivietkhongdau)->first();

        $this->validate($request, [
                'TenBaiViet'=>'required|min:3|unique:BaiViet,TenBaiViet,'.$post->id,
                'MaGiaiDoan'=>'required',
                'ChuyenMuc'=>'required',
                'Mota'=>'required',
                'ThongTinBaiViet'=>'required'
            ], [
                'TenBaiViet.required'=>'Bạn chưa nhập tên bài viết',
                'TenBaiViet.min'=>'Tiêu đề phải có ít nhất 3 kí tự',
                'TenBaiViet.unique'=>'Tiêu đề đã tồn tại',
                'MaGiaiDoan.required'=>'Bạn chưa chọn giai đoạn',
                'ChuyenMuc.required'=>'Bạn chưa chọn chuyên mục',
                'Mota.required'=>'Bạn chưa nhập tóm tắt',
                'ThongTinBaiViet.required'=>'Bạn chưa nhập thông tin bài viết'               
            ]);

        $post->TenBaiViet = $request->TenBaiViet;
        $post->TenBaiVietKhongDau = utf8tourl(utf8convert($request->TenBaiViet));

        switch ($request->MaGiaiDoan) {
            case '1858-1918':
                $post->GiaiDoan_id = 1;
                break;
            case '1919-1945':
                $post->GiaiDoan_id = 2;
                break;
            case '1945-1954':
                $post->GiaiDoan_id = 3;
                break;
            case '1954-1975':
                $post->GiaiDoan_id = 4;
                break;
            case '1975-1986':
                $post->GiaiDoan_id = 5;
                break;
            case '1986-Nay':
                $post->GiaiDoan_id = 6;
                break;
        }

        $admin = Auth::user();
        $post->users_id = $admin->id;

        if($request->ChuyenMuc == 'Sự kiện'){
            $post->LaNhanVat = 0;
        }
        else if($request->ChuyenMuc == 'Nhân vật'){
            $post->LaNhanVat = 1;
        }
        
        $post->Mota = $request->Mota;
        $post->ThongTinBaiViet = $request->ThongTinBaiViet;

        $post->save();

        //neu nguoi dung chon anh thi tien hanh luu, khong chon thi khong thay doi
        if($request->hasFile('HinhAnh')){
            $file = $request->file('HinhAnh');

            $namePic = $file->getClientOriginalName();
            $pic = str_random(4)."_".$namePic;

            while (file_exists('Asset/'.$pic)) {
                $pic = str_random(4)."_".$namePic;
            }

            $file->move('Asset', $pic);
            unlink("Asset/".$post->picture[0]->HinhAnh);
            //Luu Anh
            $picture = Picture::where('MaBaiViet', $post->MaBaiViet)->first();
            $picture->HinhAnh = $pic;
            $picture->save();
        }
        return redirect('admin/posts/'.$post->TenBaiVietKhongDau)->with('message', 'Sửa bài viết thành công');
    }

    public function GetDeletePost($tenbaivietkhongdau){
        $post=Post::where('TenBaiVietKhongDau', $tenbaivietkhongdau)->first();
        $picture = Picture::where('MaBaiViet', $post->MaBaiViet)->get();
        foreach($picture as $pic){
            unlink("Asset/".$pic->HinhAnh);
            $pic->delete();
        }
        $post->delete();

        return redirect('admin/posts')->with('message', 'Xoá bài viết thành công');
    }

    public function GetEvents(){
        $post = Post::where('LaNhanVat', 0)->orderBy('NgayDang', 'DESC')->get();
        $admin = Auth::user();

        return view('admin/admin', compact('post', 'admin'));
    }

    public function GetPeoples(){
        $post = Post::where('LaNhanVat', 1)->orderBy('NgayDang', 'DESC')->get();
        $admin = Auth::user();

        return view('admin/admin', compact('post', 'admin'));
    }
    public function GetSearch(){
        return redirect()->intended('admin/posts');
    }

    public function PostSearch(Request $request){
        $key = $request->searchKey;

        $admin = Auth::user();

        $post = Post::where('TenBaiViet', 'like', "%$key%")
                        ->orWhere('Mota', 'like', "%$key%")
                        ->orWhere('ThongTinBaiViet', 'like', "%$key%")
                        ->orderBy('NgayDang', 'DESC')
                        ->take(30)->get();

        return view('admin/search', compact('key', 'admin', 'post'));
    }

}
