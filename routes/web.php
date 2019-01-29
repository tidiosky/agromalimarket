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

use App\Location;

//Route::get('/', function () {
//    $districts = Location::pluck('district','district');
//    return view('welcome',compact('districts'));
//});
//Accueil || home
Route::get('/', [
    'as' =>'product.index',
    'uses' => 'ProduitController@index',
]);
Route::get('/product/index={cat}&categorie={categorie}','ProduitController@indexCategories')->name('product.indexCat');
Route::get('/product/index={unite}&unity={unity}','ProduitController@indexUnities')->name('product.indexUnit');
Route::get('/boutique','Src\EShopController@index')->name('shop.index');
Route::get('/boutique/{produit}','Src\EShopController@show')->name('shop.show');
//End Home
Route::get('/geolocalisation','ProduitController@getLocate')->name('location');

//Boutiques
Route::get('/liste-des-boutiques','PageController@getShop')->name('pages.shop.index');
Route::get('liste-des-boutiques/{boutique}&client={user}','PageController@showShop')->name('pages.shop.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog', 'PostsController@index')->name('blog.post.index');

Route::post('/like',[
    'as' => 'blog.post.like',
    'uses' => 'PostsController@postLikePost',
]);
Route::post('/likes', 'PostsController@postLikePost')->name('like_path');
// Market place social network
/**
 * Route for search
 */

Route::get('/recherche', 'SearchController@search')->name('search_path');
Route::get('/search', 'SearchController@searchProd')->name('search_pro');
//Route::post('searchCity','CityController@searchCity');
/**
 * Get profile
 */
Route::get('/user/{name}',
['as' => 'profile.index',
    'uses' => 'ProfileController@getProfile',
    'middleware' => ['auth']
]
    );
/**
 * Edition de profile
 */
Route::get('/profile/edit/{name}', [
    'uses' => 'ProfileController@getEdit',
    'as' => 'user.profile.edit',
    'middleware' => ['auth']
]);
Route::post('/profile/edit/{name}', [
    'as' => 'profile.edit',
    'uses' => 'ProfileController@postEdit',
    'middleware' => ['auth']
]);
/**
 * Friend request
 */
Route::get('/friends', [
    'as' =>'user.friend.index',
    'uses' => 'FriendController@getIndex',
    'middleware' => 'auth'
]);
Route::get('/friends/add/{name}', [
    'as' =>'user.friend.add',
    'uses' => 'FriendController@getAdd',
    'middleware' => 'auth'
]);
Route::get('/friends/accept/{name}', [
    'as' =>'user.friend.accept',
    'uses' => 'FriendController@getAccept',
    'middleware' => 'auth'
]);
Route::post('/friends/delete/{name}', [
    'as' =>'user.friend.delete',
    'uses' => 'FriendController@postDelete',
    'middleware' => 'auth'
]);
/**
 * Status
 */
Route::post('/status', [
    'as' =>'status.post',
    'uses' => 'StatusController@postStatus',
    'middleware' => 'auth'
]);
Route::post('/status/{statusId}/reply', [
    'as' =>'status.reply',
    'uses' => 'StatusController@postReply',
    'middleware' => 'auth'
]);
Route::get('/status/{statusId}/like', [
    'as' =>'status.like',
    'uses' => 'StatusController@getLike',
    'middleware' => 'auth'
]);

Route::get('/produit/upload', [
    'as' =>'product.new',
    'uses' => 'ProduitController@getUpload',
    'middleware' => 'auth'
]);
Route::post('/produit/new',[
    'as' => 'product.create',
    'uses' => 'ProduitController@new',
    'middleware' => 'auth'
]);
Route::get('/produit/{id}/edit',['as' => 'product.edit',
    'uses' => 'ProduitController@getEdit',
    'middleware' => 'auth']);
Route::post('/produit/{id}/edit',['as' => 'product.edit',
    'uses' => 'ProduitController@edit',
    'middleware' => 'auth']);


Route::get('/ajouter-au-panier/{id}',
    [
        'as' => 'article.panier',
        'uses' => 'ProduitController@getAddToCart',
    ]
);
Route::get('/reduce/{id}',[
    'as' => 'article.reduce',
    'uses' => 'ProduitController@getReduceByOne',
]);
Route::get('/removeItem/{id}',[
    'as' => 'article.removeItem',
    'uses' => 'ProduitController@getRemoveItem',
]);
Route::get('/AddItem/{id}',[
    'as' => 'article.AddItem',
    'uses' => 'ProduitController@postAdd',
]);
Route::get('/shopping-cart',
    [
        'as' => 'article.shoppingCart',
        'uses' => 'ProduitController@getCart',
    ]
);
Route::get('/checkout',
    [
        'as' => 'article.checkout',
        'uses' => 'ProduitController@getCheckout',
        'middleware' => 'auth'
    ]
);
Route::post('checkout',[
    'as' => 'article.checkout',
    'uses' => 'ProduitController@postCheckout',
    'middleware' => 'auth'
]);
Route::get('/recu/{user}',
    [
        'as' => 'article.recu',
        'uses' => 'ProduitController@getRecu',
        'middleware' => 'auth'
    ]
);

// Route for chat
Route::get('/chat',
    [
        'as' => 'blog.chat',
        'uses' => 'Chat\ChatController@getChat',
        'middleware' => 'auth'
    ]
);
Route::get('/contact/{email}',[
   'uses' => 'PageController@getContact',
    'as' => 'contact',
    'middleware' => 'auth'
]);

//Panier product
Route::get('/cart','Cart\CartController@index')->name('cart.index');
Route::post('/cart','Cart\CartController@store')->name('cart.store');
Route::patch('/cart/{product}','Cart\CartController@update')->name('cart.update');
Route::delete('/cart/{id}','Cart\CartController@destroy')->name('cart.destroy');
Route::get('/vide',function () {
    Cart::destroy();
});
Route::get('product/{slug}','ProduitController@show')->name('pages.product.show');
Route::get('product-modal/{id}','ProduitController@show_modal')->name('pages.product_modal.show');
Route::post('subscriber', 'Chat\SubscriberController@store')->name('subscriber.store');


Route::group(['middleware' => ['auth']],function () {
    //Comment
    Route::post('product/{product}', 'CommentController@addProductComment')->name('product.comment.store');
    Route::get('product/comment/{product}', 'CommentController@show')->name('product.comment.show');
    //Admin pro
    Route::get('admin/product', 'Product\ProductController@index')->name('admin.pro.index');

    Route::get('admin/product/create', 'Product\ProductController@create')->name('admin.pro.create');
    Route::post('admin/product/create', 'Product\ProductController@store')->name('admin.pro.store');
    Route::get('admin/product/{product}', 'Product\ProductController@show')->name('admin.pro.show');
    Route::get('admin/product/{id}/edit', 'Product\ProductController@edit')->name('admin.pro.edit');
    Route::post('admin/product/{id}/edit', 'Product\ProductController@update')->name('admin.pro.update');
    Route::post('admin/product/{id}/delete', 'Product\ProductController@destroy')->name('admin.pro.destroy');

    Route::get('admin/category', 'Product\CategorieController@index')->name('admin.cat.index');
    Route::get('admin/category/create', 'Product\CategorieController@create')->name('admin.cat.create');
    Route::post('admin/category/create', 'Product\CategorieController@store')->name('admin.cat.store');
    Route::get('admin/category/{category}', 'Product\CategorieController@show')->name('admin.cat.show');
    Route::get('admin/category/{category}/edit', 'Product\CategorieController@edit')->name('admin.cat.edit');
    Route::post('admin/category/{category}/edit', 'Product\CategorieController@update')->name('admin.cat.update');
    Route::post('admin/category/{category}/delete', 'Product\CategorieController@destroy')->name('admin.cat.destroy');
//Route::get('admin/product/unity', 'Product\\UnityController');

    Route::get('admin/unity', 'Product\\UnityController@index')->name('admin.unity.index');
    Route::get('admin/unity/create', 'Product\\UnityController@create')->name('admin.unity.create');
    Route::post('admin/unity/create', 'Product\\UnityController@store')->name('admin.unity.store');
    Route::get('admin/unity/{unity}', 'Product\\UnityController@show')->name('admin.unity.show');
    Route::get('admin/unity/{unity}/edit', 'Product\\UnityController@edit')->name('admin.unity.edit');
    Route::post('admin/unity/{unity}/edit', 'Product\\UnityController@update')->name('admin.unity.update');
    Route::post('admin/unity/{unity}/delete', 'Product\\UnityController@destroy')->name('admin.unity.destroy');
    #customize

    Route::post('/insert-categorie', 'Product\CategorieController@store')->name('admin.categorie.store');
    Route::post('/insert-product-name', 'Product\ProductNameController@store')->name('admin.product_name.store');
    Route::get('/show-cate', 'Product\CategorieController@getShow')->name('admin.categorie.getShow');
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('admin.dashboard.index');
    Route::post('favorite/{product}/add', 'Product\FavoriteController@store')->name('favorite.store');

    Route::get('/posts/{produit}/comments', 'CommentPController@index');
    Route::post('/posts/{produit}/comment', 'CommentPController@store');
});

//Checkout

Route::get('/checkout','Cart\CheckoutController@index')->name('checkout.index');
Route::post('/checkout','Cart\CheckoutController@store')->name('checkout.store');

Route::group(['middleware' => ['auth','role:admin']], function () {
    Route::resource('admin/permission', 'Admin\\PermissionController');
    Route::resource('admin/role', 'Admin\\RoleController');
    Route::resource('admin/user', 'Admin\\UserController');
    Route::get('admin/products', 'Admin\AdminController@index')->name('admin.products');
    Route::resource('pub/pub', 'Pub\\PubController');
    Route::get('admin/subscriber', 'Admin\SubscriberController@index')->name('subscriber.index');
    Route::delete('admin/subscriber/{subscriber}', 'Admin\SubscriberController@destroy')->name('subscriber.delete');

});