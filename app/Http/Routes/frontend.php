<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/test', function() {
    return view('frontend.email.thanks');
});


Route::group(['namespace' => 'Frontend'], function()
{
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    Route::get('/du-an-dat-nen', ['as' => 'dat-nen', 'uses' => 'ProjectsController@datnen']);
    Route::get('/du-an-can-ho', ['as' => 'can-ho', 'uses' => 'ProjectsController@canho']);
    Route::get('/nha-dat-ban', ['as' => 'ban', 'uses' => 'ProductController@ban']);
    Route::get('/nha-dat-cho-thue', ['as' => 'cho-thue', 'uses' => 'ProductController@choThue']);
    Route::get('/du-an-dang-ban', ['as' => 'dang-ban', 'uses' => 'ProjectsController@dangban']);
    Route::post('/send-contact', ['as' => 'send-contact', 'uses' => 'ContactController@store']);
    Route::get('/du-an-da-ban', ['as' => 'da-ban', 'uses' => 'ProjectsController@daban']);

    Route::get('/san-pham-le', ['as' => 'san-pham-le', 'uses' => 'ProductController@ban']);
    Route::post('/project-contact', ['as' => 'project-contact', 'uses' => 'ProjectsController@contact']);
    Route::get('/tin-tuc/dat-nen-long-an-mieng-moi-beo-bo-cua-gioi-dau-tu-p63.html', function(){ 
        return Redirect::to('/nha-dat-long-an.html', 301);         
    });
    Route::get('/du-an', ['as' => 'du-an', 'uses' => 'ProjectsController@index']);    
    Route::get('du-an/{slug}', ['as' => 'detail-project', 'uses' => 'ProjectsController@detail']);
    Route::get('du-an/{slug}/{slugtab}', ['as' => 'tab', 'uses' => 'ProjectsController@tab']);
    Route::post('/tmp-upload-multiple-fe', ['as' => 'image.tmp-upload-multiple-fe', 'uses' => 'UploadController@tmpUploadMultipleFE']);
   
    Route::get('tag/{slug}', ['as' => 'tag', 'uses' => 'DetailController@tagDetail']);
    Route::get('bai-viet/{slug}', ['as' => 'news-list', 'uses' => 'NewsController@newsList']);
    Route::get('{slug_type}/{slug}', ['as' => 'danh-muc-con', 'uses' => 'ProductController@cateChild']);
    Route::get('{slugLoaiSp}/{slug}-{id}.html', ['as' => 'chi-tiet', 'uses' => 'DetailController@index']);
    
    Route::get('/tin-tuc/{slug}-p{id}.html', ['as' => 'news-detail', 'uses' => 'NewsController@newsDetail']);
    

    Route::get('/dang-tin-ky-gui.html', ['as' => 'ky-gui', 'uses' => 'DetailController@kygui']);
    Route::get('/dang-tin-thanh-cong.html', ['as' => 'ky-gui-thanh-cong', 'uses' => 'DetailController@kyguiSuccess']);    
    Route::post('/post-ky-gui', ['as' => 'post-ky-gui', 'uses' => 'DetailController@postKygui']);    

    Route::post('/dang-ki-newsletter', ['as' => 'register.newsletter', 'uses' => 'HomeController@registerNews']);    
    Route::post('/get-district', ['as' => 'get-district', 'uses' => 'DistrictController@getDistrict']);
    Route::post('/get-ward', ['as' => 'get-ward', 'uses' => 'WardController@getWard']);   
    Route::get('/tim-kiem.html', ['as' => 'search', 'uses' => 'ProductController@search']);
    Route::get('so-sanh.html', ['as' => 'so-sanh', 'uses' => 'CompareController@index']);
    Route::get('lien-he.html', ['as' => 'contact', 'uses' => 'HomeController@contact']);
    Route::get('{slug}.html', ['as' => 'danh-muc', 'uses' => 'ProductController@cate']);
    Route::get('/{slug}', ['as' => 'custom-search', 'uses' => 'ProductController@customSearch']); 
    Route::get('/{slug}/{q}', ['as' => 'custom-search-2', 'uses' => 'ProductController@customSearch2']);   

});

