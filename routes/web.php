<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('sitemap', function(){

    // create new sitemap object
    $sitemap = App::make("sitemap");

    // add items to the sitemap (url, date, priority, freq)
    $sitemap->add(URL::to(''), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
    $sitemap->add(URL::to('page'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

    // get all posts from db
   $posts = DB::table('baiviet')
                ->orderBy('ngaydang', 'desc')
                ->get();

    // add every post to the sitemap
    foreach ($posts as $post)
    {
        $sitemap->add($post->TenBaiVietKhongDau, $post->NgayDang, 1, 1);
    }

    // generate your sitemap (format, filename)
    $sitemap->store('xml', 'sitemap');
    // this will generate file mysitemap.xml to your public folder

});


Route::get('/stage/{id}', 'ClientController@GetStagePage');

Route::get('/posts/{tenbaivietkhongdau}', 'ClientController@GetPostPage');

Route::get('/', 'ClientController@index');

Route::get('/search', 'ClientController@Search');

Route::get('/events', 'ClientController@GetEvent');

Route::get('/peoples', 'ClientController@GetPeople');


//--------------------------
//ADMIN ROUTE
//--------------------------

Route::get('admin/logout', 'AdminController@GetLogout');

Route::get('admin/login', 'AdminController@GetLoginPage');

Route::post('admin/login', 'AdminController@PostLogin');

Route::group(['prefix'=>'admin', 'middleware'=>'adminLogin'], function(){

	Route::get('/', function(){
		return redirect('admin/posts');
	});

	Route::get('posts', 'AdminController@GetAdminHome');

	Route::get('events', 'AdminController@GetEvents');

	Route::get('peoples', 'AdminController@GetPeoples');

	Route::get('create-new-post', 'AdminController@GetCreatePostPage');
	Route::post('create-new-post', 'AdminController@PostCreatePostPage');

	Route::get('posts/{tenbaivietkhongdau}', 'AdminController@GetEditPost');
	Route::post('posts/{tenbaivietkhongdau}', 'AdminController@PostEditPost');

	Route::get('delete/{tenbaivietkhongdau}', 'AdminController@GetDeletePost');

	Route::post('search', 'AdminController@PostSearch');

	Route::get('search', 'AdminController@GetSearch');
});

