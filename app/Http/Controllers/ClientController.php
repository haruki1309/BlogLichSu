<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Post;

class ClientController extends Controller
{
    public function index(){
    	
    	$post = Post::orderBy('NgayDang', 'DESC')->take(3)->get();

    	$people = Post::where('LaNhanVat', 1)->orderBy('NgayDang', 'DESC')->take(4)->get();

    	return view('client\homepage', compact('post', 'people'));
    } 


    public function GetPostPage($tenbaivietkhongdau){
    	$post = Post::where('TenBaiVietKhongDau', $tenbaivietkhongdau)->get();

        $newpost = Post::orderBy('NgayDang', 'DESC')->take(4)->get();

        $relatedpost = Post::where('GiaiDoan_id', $post[0]->GiaiDoan_id)->take(4)->get();

        return view('client\posts', compact('post', 'newpost', 'relatedpost'));
    }

    public function Search(Request $request){
        $key = $request->input('searchKey');

        if($key != ''){
            $post = Post::where('TenBaiViet', 'like', "%$key%")
                        ->orWhere('Mota', 'like', "%$key%")
                        ->orWhere('ThongTinBaiViet', 'like', "%$key%")
                        ->orderBy('NgayDang', 'DESC')
                        ->take(30)
                        ->paginate(5)
                        ->setpath('');

            $post->appends(array('q'=>$request->searchKey));

            $newpost = Post::orderBy('NgayDang', 'DESC')->take(4)->get();

            if(count($post) > 0){
                return view('client\search_result', compact('post', 'key', 'newpost'));
            }
        }
        else{
            $post = Post::where('MaBaiViet', 0)->get();

            $newpost = Post::orderBy('NgayDang', 'DESC')->take(4)->get();

            return view('client\search_result', compact('post', 'key', 'newpost'));
        }
    }

    public function GetStagePage($id){

        switch($id){
            case 1:
            $post = Post::where('GiaiDoan_id', 1)->get();
            $stage = $post[0]->historyPeriod->TenGiaiDoan;
            break;
            case 2:
            $post = Post::where('GiaiDoan_id', 2)->orWhere('GiaiDoan_id', 3)->get();
            $stage = '1918 - 1954';
            break;
            case 3:
            $post = Post::where('GiaiDoan_id', 4)->get();
            $stage = $post[0]->historyPeriod->TenGiaiDoan;
            break;
            case 4:
            $post = Post::where('GiaiDoan_id', 5)->get();
            $stage = $post[0]->historyPeriod->TenGiaiDoan;
            break;
        }   

        $newpost = Post::orderBy('NgayDang', 'DESC')->take(4)->get();

        return view('client\stage', compact('post', 'newpost', 'stage'));
    }

    public function GetEvent(){
        $post = Post::where('LaNhanVat', 0)->orderBy('NgayDang', 'DESC')->take(30)->paginate(5);

        $newpost = Post::orderBy('NgayDang', 'DESC')->take(4)->get();

        return view('client\event', compact('post', 'newpost'));
    }

    public function GetPeople(){
        $post = Post::where('LaNhanVat', 1)->orderBy('NgayDang', 'DESC')->take(30)->paginate(5);

        $newpost = Post::orderBy('NgayDang', 'DESC')->take(4)->get();

        return view('client\people', compact('post', 'newpost'));
    }
}
