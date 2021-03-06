<?php

use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Nknowledge-centerow create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/thank-you', 'HomeController@thanks')->name('thank-you');
Route::post('/consultation_form', 'HomeController@consultationForm')->name('consultation_form');
//Route::get('/testimonial', 'TestimonialController@index')->name('testimonial');
Route::get('/knowledge-center/category/{category}', 'KnowledgeCenterController@indexCategory')->name('knowledge-center.category');
Route::get('/knowledge-center/topic/{topic}', 'KnowledgeCenterController@indexTag')->name('knowledge-center.topic');
Route::get('/knowledge-center', 'KnowledgeCenterController@index')->name('knowledge-center');
Route::get('/knowledge-center/{slug}', 'KnowledgeCenterController@show')->name('knowledge-center.show');

Route::get('/testimonials/category/{category}', 'TestimonialController@indexCategory')->name('testimonial.category');
Route::get('/testimonials', 'TestimonialController@index')->name('testimonial.index-front');
Route::get('/testimonials/{slug}', 'TestimonialController@show')->name('testimonial.show-front');
Route::get('/admin', 'Auth\LoginController@showLoginForm');

Route::get('/blog/category/{category}', 'PostController@indexCategory')->name('blog.category');
Route::get('/blog', 'PostController@index')->name('blog.index-front');
Route::get('/blog/{slug}', 'PostController@show')->name('blog.show-front');

Route::get('/contact', 'ContactUsController@show')->name('contact-us.show');

Route::get('/doctors', 'DoctorController@index')->name('doctor.index-front');
Route::get('/doctors/{slug}', 'DoctorController@show')->name('doctor.show-front');

Route::get('/hospital', 'HospitalController@index')->name('hospital.index-front');
Route::get('/hospital/{slug}', 'HospitalController@show')->name('hospital.show-front');


Route::post('/treatment/getSearchData', 'TreatmentController@getSearchData')->name('treatment.getSearchData');
Route::post('/treatment/getTreatments', 'TreatmentController@getTreatments')->name('treatment.getTreatments');
Route::get('/cost', 'TreatmentController@indexFront')->name('treatment.indexFront');
Route::get('/cost/{slug}', 'TreatmentController@show')->name('treatment.showFront');
Auth::routes();
Route::post('add_comment', 'PostController@addComment')->name('post_comment');
Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/dashboard', 'Admin\HomeController@index')->name('dashboard');

	Route::get('/doctor/trash', 'Admin\DoctorController@trash')->name('doctor.trash');
	Route::post('doctor/trash-back', 'Admin\DoctorController@backToList')->name('doctor.trash-back');
	Route::resource('doctor', 'Admin\DoctorController');


	Route::get('/hospital/trash', 'Admin\HospitalController@trash')->name('hospital.trash');
	Route::post('hospital/trash-back', 'Admin\HospitalController@backToList')->name('hospital.trash-back');
	Route::resource('hospital', 'Admin\HospitalController');



	Route::get('/treatment/trash', 'TreatmentController@trash')->name('treatment.trash');
	Route::post('treatment/trash-back', 'TreatmentController@backToList')->name('treatment.trash-back');
	Route::resource('treatment', 'TreatmentController');


	Route::resource('testimonial', 'Admin\TestimonialController');

	Route::resource('news', 'NewsController');

	Route::get('importExportView/{table}', 'CsvExcelController/{table}@importExportView');
	Route::get('export/{table}', 'CsvExcelController@export')->name('export');
	Route::post('import/{table}', 'CsvExcelController@import')->name('import');

	Route::get('image-upload-view', 'ImageUploadController@viewImageUpload')->name('image-upload.view');

	Route::get('get-all', 'ImageUploadController@viewAll')->name('image-upload.all');

	Route::post('image-upload', 'ImageUploadController@imageUpload')->name('image-upload.upload');

	Route::post('city-list', 'CityController@index')->name('city-list');

    Route::get('/category/create/{type}', 'CategoryController@create')->name('category.create.type');
    Route::get('/category/index/{type}', 'CategoryController@index')->name('category.index.type');

    Route::get('/category/trash', 'CategoryController@trash')->name('category.trash');
    Route::post('category/trash-back', 'CategoryController@backToList')->name('category.trash-back');
	Route::resource('category', 'CategoryController');

    Route::get('/speciality/create/{type}', 'SpecialityController@create')->name('speciality.create.type');
    Route::get('/speciality/index/{type}', 'SpecialityController@index')->name('speciality.index.type');

    Route::get('/speciality/trash', 'SpecialityController@trash')->name('speciality.trash');
    Route::post('speciality/trash-back', 'SpecialityController@backToList')->name('speciality.trash-back');
    Route::resource('speciality', 'SpecialityController');

    Route::get('/topic/create/{type}', 'TopicController@create')->name('topic.create.type');
    Route::get('/topic/index/{type}', 'TopicController@index')->name('topic.index.type');

    Route::resource('topic', 'TopicController');



    Route::group(['namespace' => 'Admin', 'as' => 'admin.'], function () {



        Route::middleware('admin')->group(function() {
            Route::get('/user/index', 'UserController@index')->name('user.index');
            Route::get('/user/create', 'UserController@create')->name('user.create');
            Route::post('/user', 'UserController@store')->name('user.store');
            Route::put('/user/{user}', 'UserController@update')->name('user.update');
            Route::get('/user/trash', 'UserController@trash')->name('user.trash');
            Route::get('/user/{user}/edit', 'UserController@edit')->name('user.edit');
            Route::DELETE('/user/destroy/{user}', 'UserController@deleteUser')->name('user.destroy');

            Route::get('/user/permissions/{user?}', 'UserController@permissions')->name('permissions.create');
            Route::post('/user/permissions/{user?}', 'UserController@savePermissions')->name('permissions.update');

            Route::get('/upload/hospitals', 'CsvUploadController@uploadHospitals')->name('csv.hospitals_upload');
            Route::post('/upload/hospitals', 'CsvUploadController@storeHospitals')->name('csv.hospitals_store');

            Route::get('/upload/doctors', 'CsvUploadController@uploadDoctors')->name('csv.doctors_upload');
            Route::post('/upload/doctors', 'CsvUploadController@storeDoctors')->name('csv.doctors_store');

            Route::get('/upload/treatments', 'CsvUploadController@uploadTreatments')->name('csv.treatments_upload');
            Route::post('/upload/treatments', 'CsvUploadController@storeTreatments')->name('csv.treatments_store');

            Route::get('/setting/footer/edit', 'SettingsController@editFooter')->name('setting.footer.edit');
            Route::PUT('/setting/footer/update', 'SettingsController@updateFooter')->name('setting.footer.update');

            Route::get('/banner/edit', 'BannerController@edit')->name('banner.edit');
            Route::PUT('/banner/update', 'BannerController@update')->name('banner.update');

            Route::get('/home', 'HomeController@edit')->name('home.edit');
            Route::PUT('/home', 'HomeController@update')->name('home.update');

            Route::get('/about', 'AboutController@edit')->name('about.edit');
            Route::PUT('/about', 'AboutController@update')->name('about.update');

            Route::get('/contact-us', 'ContactUsController@edit')->name('contact-us.edit');
            Route::PUT('/contact-us', 'ContactUsController@update')->name('contact-us.update');
        });





        Route::get('/blog-counters/edit', 'PostController@editCounters')->name('blog.edit-counters');
        Route::get('/post/{id}/comments', 'PostController@comments')->name('post.comments');

        Route::PUT('/blog-counters/update', 'PostController@updateCounters')->name('banner.update-counters');
        Route::DELETE('/comment/destroy/{comment_id}', 'PostController@deleteComment')->name('comment.destroy');
        Route::PUT('/comment/update/{comment_id}', 'PostController@updateCommentStatus')->name('comment.update');

        Route::resource('post', 'PostController');

        Route::resource('knowledge_center', 'KnowledgeCenterController');


    });
});

/*Route::middleware('auth')->prefix('admin')->group(function() {

});*/

