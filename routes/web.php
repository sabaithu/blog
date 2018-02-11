<?php
use App\User;
use App\Post;
use Illuminate\Http\Request;

Route::resource('blog','BlogController');
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();


 Route::group(array('prefix' => 'admin', 'namespace' =>'admin', 'middleware'=>'auth'),function(){
 	//Route::get('authors', 'AdminController@index');
    Route::get('authors', 'AdminController@index');
 	Route::get('authors/create', 'AdminController@create');
 	Route::get('authors/{id}/edit', 'AdminController@edit');
 	Route::post('authors/{id}/edit', 'AdminController@update');
 	//Route::delete('authors/{id}/delete', 'AdminController@destroy');
 	Route::delete('/authors/{id}', function(Request $request,$id){
        //return "This is delete page";
        $user = User::findOrFail($id);

        $user->delete();

        return "Successful delete for User!";
    });
    
	//Route::get('/posts', 'AdminPostController@index');
 	Route::get('/posts', function(){
 		$posts = Post::all();
        return view('admin.posts.index', compact('posts'));
 	});
 	Route::delete('/posts/{id}', function(Request $request,$id){
        //return "This is delete page";
        $post = Post::findOrFail($id);

        $post->delete();

        return "Successful delete for Post!";
    });
});
Route::get('/admin','AdminController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'UserBlogController@blog')->name('home.blog');
// Route::get('/blog/{slug}', 'UserBlogController@detail')->name('home.blog_detail');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/contact', 'PagesController@contact')->name('contact');
Route::post('/contact', 'PagesController@contactSendMail');

