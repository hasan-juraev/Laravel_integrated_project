<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdvertisementsController;
use App\Http\Controllers\AnnouncementsController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EntertainmentController;
use App\Http\Controllers\HousingController;
use App\Http\Controllers\MosquesController;
use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\UlinksController;
use App\Http\Controllers\BlogCategroyController;



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
Route::group(['prefix' => '{locale}'], function () {
   
    
});

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

/*
| Admin All Route, group route is used to gather all AdminController related routes.
| These routes resides in middleware group named "auth".

*/ 
Route::middleware(['auth'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'profile')->name('admin.profile');
        Route::get('/edit/profile', 'editProfile')->name('edit.profile');
        Route::post('/store/profile', 'storeProfile')->name('store.profile');
        Route::get('/change/password', 'changePassword')->name('change.password');
        Route::post('/update/password', 'updatePassword')->name('update.password');        
    });

});

Route::controller(AdvertisementsController::class)->group(function() {
    
    
});

Route::controller(AnnouncementsController::class)->group(function() {
    Route::get('/all/announcement','allAnnouncement')->name('all.announcement');
    Route::get('/add/announcement','addAnnouncement')->name('add.announcement');
    Route::post('/store/announcement', 'storeAnnouncement')->name('store.announcement');
    Route::get('/edit/announcement/{id}', 'editAnnouncement')->name('edit.announcement');
    Route::post('/update/annannouncement/{id}', 'updateAnnouncement')->name('update.announcement');
    Route::get('/delete/announcement/{id}', 'deleteAnnouncement')->name('delete.announcement');
    Route::get('/announcement', 'frontendAnnouncement')->name('frontend.announcement');
});

Route::controller(BlogCategroyController::class)->group(function() {
    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');
    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');
    Route::get('/edit/blog/category/{id}', 'editBlogCategory')->name('edit.blog.category');
    Route::post('/update/blog/category/{id}', 'updateBlogCategory')->name('update.blog.category');
    Route::post('/store/blog/category', 'storeBlogCategory')->name('store.blog.category');
    Route::get('/delete/blog/category/{id}', 'deleteBlogCategory')->name('delete.blog.category');
});

Route::controller(BlogsController::class)->group(function() {
    Route::get('/all/blog', 'allBlog')->name('all.blog');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::get('/edit/blog/{id}', 'editBlog')->name('edit.blog');
    Route::post('/update/blog/{id}', 'updateBlog')->name('update.blog');
    Route::get('/delete/blog/{id}', 'deleteBlog')->name('delete.blog');
    Route::post('/store/blog', 'storeBlog')->name('store.blog');
    Route::get('/news', 'frontendBlog')->name('frontend.blog');
    Route::get('/news/details/{id}', 'frontendBlogDetails')->name('frontend.blog.details');

});

Route::controller(CargoController::class)->group(function() {
    Route::get('/all/cargo', 'allCargo')->name('all.cargo');
    Route::get('/add/cargo', 'addCargo')->name('add.cargo');
    Route::post('/store/cargo', 'storeCargo')->name('store.cargo');
    Route::get('/edit/cargo/{id}', 'editCargo')->name('edit.cargo');
    Route::post('/update/cargo/{id}', 'updateCargo')->name('update.cargo');
    Route::get('/delete/cargo/{id}', 'deleteCargo')->name('delete.cargo');
    Route::get('/post-service', 'frontendCargo')->name('frontend.cargo');

});

Route::controller(EducationController::class)->group(function() {
    Route::get('/all/education', 'allEducation')->name('all.education');
    Route::get('/add/education', 'addEducation')->name('add.education');
    Route::post('/store/education', 'storeEducation')->name('store.education');
    Route::get('/edit/education/{id}', 'editEducation')->name('edit.education');
    Route::post('/update/education/{id}', 'updateEducation')->name('update.education');
    Route::get('/delete/education/{id}', 'deleteEducation')->name('delete.education');
    Route::get('/education', 'frontendEducation')->name('frontend.education');

});

Route::controller(EntertainmentController::class)->group(function() {
    Route::get('/all/entertainment', 'allEntertainment')->name('all.entertainment');
    Route::get('/add/entertainment', 'addEntertainment')->name('add.entertainment');
    Route::post('/store/entertainment', 'storeEntertainment')->name('store.entertainment');
    Route::get('/edit/entertainment/{id}', 'editEntertainment')->name('edit.entertainment');
    Route::post('/update/entertainment/{id}', 'updateEntertainment')->name('update.entertainment');
    Route::get('/delete/entertainment/{id}', 'deleteEntertainment')->name('delete.entertainment');
    Route::get('/entertainment', 'frontendEntertainment')->name('frontend.entertainment');
});

Route::controller(HousingController::class)->group(function() {
    Route::get('/all/housing', 'allHousing')->name('all.housing');
    Route::get('/add/housing', 'addHousing')->name('add.housing');
    Route::post('/store/housing', 'storeHousing')->name('store.housing');
    Route::get('/edit/housing/{id}', 'editHousing')->name('edit.housing');
    Route::post('/update/housing/{id}', 'updateHousing')->name('update.housing');
    Route::get('/delete/housing/{id}', 'deleteHousing')->name('delete.housing');
    Route::get('/housing', 'frontendHousing')->name('frontend.housing');

});

Route::controller(MosquesController::class)->group(function() {
    Route::get('/mosque', 'frontendMosque')->name('frontend.mosque');
    Route::get('/mosque/search' , 'mosqueSearch')->name('mosque.search');

});

Route::controller(RestaurantsController::class)->group(function() {
    Route::get('/restaurant', 'frontendRestaurant')->name('frontend.restaurant');
    Route::get('/restaurant/search' , 'restaurantSearch')->name('restaurant.search');
   
});

Route::controller(UlinksController::class)->group(function() {
    
});











// Stevebauman Location API
Route::get('get-ip-details', function () {
	$ip = '49.172.16.192';
    $data = \Location::get($ip);
    dd($data);
});

// Torann Location API
Route::get('/get/location', function () {
	$ip = '192.168.219.104';
    $arr_ip = geoip()->getLocation($ip);
    dd($arr_ip);
    
});
