<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'MasterController@index');
Route::get('/', 'MasterController@create');
Route::get('/', 'MasterController@view');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


/////**********************profilecategories *************************
Route::post('profilecategories/storeprofilecategories','profilecategoriesController@store')->name('store.profilecategories');
Route::get('allcreate.profilecategories','profilecategoriesController@profilecategories');
Route::get('allcreate.profilecategories','profilecategoriesController@view');
Route::get('edit/profilecategories/{id}','profilecategoriesController@edit');

Route::post('update/profilecategories/{id}','profilecategoriesController@update');

Route::get('delete/profilecategories/{id}','profilecategoriesController@destroy');


Route::resource('/blog', 'BlogController');




Route::get('master','MasterController@create');
 Route::get('azizulhasan','AdminController@index');

 Route::get('admin.insert','AdminController@insert');

 Route::get('admin.view','AdminController@view');

 Route::get('admin.allpost','AdminController@allpostview');

 Route::post('admin/storecategory','AdminController@add_category')->name('store.category');

 Route::post('admin/validation','AdminController@anyvalidation')->name('any.validation');

 //Route::post('admin/category view','AdminController@anyvalidation')->name('view.categories');
 Route::get('admin/profileview/{id}','AdminController@profileview');

 Route::get('delete/category/{id}','AdminController@deletecategory');

 Route::get('edit/category/{id}','AdminController@editcategory');
 Route::post('update/category/{id}','AdminController@updatecategory');
 Route::post('admin/post','AdminController@adminpost')->name('admin.post');
 Route::get('view/post/{id}','AdminController@postview');


 Route::get('edit/post/{id}','AdminController@editpost');
 Route::post('update/post/{id}','AdminController@updatepost');

 Route::get('delete/post/{id}','AdminController@deletepost');

// /////**********************students *************************
//  Route::get('students.create','StudentController@students');

//  Route::post('students/storestudents','StudentController@storestudents')->name('store.students');

//  Route::get('students.allstudents','StudentController@allstudents');

// Route::get('view/student/{id}','StudentController@viewstudents');

// Route::get('delete/student/{id}','StudentController@destroy');

// Route::get('edit/student/{id}','StudentController@edit');

// Route::post('update/student/{id}','StudentController@update');

//Route::post('education/storeeducation','EducationController@create')->name('create.education');

/////**********************skills *************************
Route::get('allcreate.skills','SkillsController@skills');

Route::post('skills/storeskills','SkillsController@store')->name('store.skills');

Route::get('allcreate.skills','SkillsController@view');
Route::get('edit/skills/{id}','SkillsController@edit');

Route::post('update/skills/{id}','SkillsController@update');

Route::get('delete/skills/{id}','SkillsController@destroy');

/////**********************myinformations *************************
Route::get('allcreate.myinformations','myinformationsController@myinformations');
Route::post('myinformations/storemyinformations','myinformationsController@store')->name('store.myinformations');
Route::get('allcreate.myinformations','myinformationsController@view');
Route::get('edit/myinformations/{id}','myinformationsController@edit');

Route::post('update/myinformations/{id}','myinformationsController@update');

Route::get('delete/myinformations/{id}','myinformationsController@destroy');

/////**********************certifications *************************
Route::get('allcreate.certifications','CertificationsController@certifications');
Route::post('educations/storecertifications','CertificationsController@store')->name('store.certifications');
Route::get('allcreate.certifications','CertificationsController@view');
Route::get('edit/certifications/{id}','CertificationsController@edit');

Route::post('update/certifications/{id}','CertificationsController@update');

Route::get('delete/certifications/{id}','CertificationsController@destroy');

/////**********************experiences *************************
Route::get('allcreate.experiences','experiencesController@experiences');
Route::post('experiences/storeexperiences','experiencesController@store')->name('store.experiences');
Route::get('allcreate.experiences','experiencesController@view');
Route::get('edit/experiences/{id}','experiencesController@edit');

Route::post('update/experiences/{id}','experiencesController@update');

Route::get('delete/experiences/{id}','experiencesController@destroy');

/////**********************testimonials *************************
Route::post('testimonials/storetestimonials','testimonialsController@store')->name('store.testimonials');
Route::get('allcreate.testimonials','testimonialsController@testimonials');
Route::get('allcreate.testimonials','testimonialsController@view');
Route::get('edit/testimonials/{id}','testimonialsController@edit');

Route::post('update/testimonials/{id}','testimonialsController@update');

Route::get('delete/testimonials/{id}','testimonialsController@destroy');

/////**********************contacts *************************
Route::post('contacts/storecontacts','contactsController@store')->name('store.contacts');
Route::get('allcreate.contacts','contactsController@contacts');
Route::get('allcreate.contacts','contactsController@view');
Route::get('edit/contacts/{id}','contactsController@edit');


Route::post('update/contacts/{id}','contactsController@update');

Route::get('delete/contacts/{id}','contactsController@destroy');

/////**********************usercontacts *************************
// Route::get('allcreate.usercontacts','UsercontactsController@usercontacts');
Route::post('usercontacts/storeusercontacts','MasterController@usercontactsstore');
// Route::post('usercontacts/storeusercontacts','usercontactsController@store')->name('store.usercontacts');
// Route::get('allcreate.usercontacts','usercontactsController@usercontacts');
Route::get('allcreate.usercontacts','usercontactsController@view');
// Route::get('edit/usercontacts/{id}','usercontactsController@edit');

// Route::post('update/usercontacts/{id}','usercontactsController@update');

// Route::get('delete/usercontacts/{id}','usercontactsController@destroy');

/////**********************portfolios *************************
Route::post('portfolios/storeportfolios','portfoliosController@store')->name('store.portfolios');
Route::get('allcreate.portfolios','portfoliosController@portfolios');
Route::get('allcreate.portfolios','portfoliosController@view');
Route::get('edit/portfolios/{id}','portfoliosController@edit');

Route::post('update/portfolios/{id}','portfoliosController@update');

Route::get('delete/portfolios/{id}','portfoliosController@destroy');

/////**********************abouts *************************
Route::post('abouts/storeabouts','aboutsController@store')->name('store.abouts');
Route::get('allcreate.abouts','aboutsController@abouts');
Route::get('allcreate.abouts','aboutsController@view');
Route::get('edit/abouts/{id}','aboutsController@edit');

Route::post('update/abouts/{id}','aboutsController@update');

Route::get('delete/abouts/{id}','aboutsController@destroy');

/////**********************alldescriptions *************************
Route::post('alldescriptions/storealldescriptions','alldescriptionsController@store')->name('store.alldescriptions');
Route::get('allcreate.alldescriptions','alldescriptionsController@alldescriptions');
Route::get('allcreate.alldescriptions','alldescriptionsController@view');
Route::get('edit/alldescriptions/{id}','alldescriptionsController@edit');

Route::post('update/alldescriptions/{id}','alldescriptionsController@update');

Route::get('delete/alldescriptions/{id}','alldescriptionsController@destroy');

/////**********************hometitles *************************
Route::post('hometitles/storehometitles','hometitlesController@store')->name('store.hometitles');

Route::get('allcreate.hometitles','hometitlesController@view');
Route::get('edit/hometitles/{id}','hometitlesController@edit');

Route::post('update/hometitles/{id}','hometitlesController@update');

Route::get('delete/hometitles/{id}','hometitlesController@destroy');

/////**********************portfoliobuttons *************************
Route::get('allcreate.portfolioisotopes','PortfolioisotopesController@portfolioisotopes');
Route::post('portfolioisotopes/storeportfolioisotopes','portfolioisotopesController@store')->name('store.portfolioisotopes');
Route::get('allcreate.portfolioisotopes','portfolioisotopesController@view');
Route::get('edit/portfolioisotopes/{id}','portfolioisotopesController@edit');
Route::post('update/portfolioisotopes/{id}','portfolioisotopesController@update');
Route::get('delete/portfolioisotopes/{id}','portfolioisotopesController@destroy');


/////**********************socialicons *************************
Route::get('allcreate.socialicons','SocialiconsController@socialicons');
Route::post('socialicons/storesocialicons','socialiconsController@store')->name('store.socialicons');
Route::get('allcreate.socialicons','socialiconsController@view');
Route::get('edit/socialicons/{id}','socialiconsController@edit');
Route::post('update/socialicons/{id}','socialiconsController@update');
Route::get('delete/socialicons/{id}','socialiconsController@destroy');

/////**********************rightnames *************************
Route::get('allcreate.rightnames','rightnamesController@rightnames');
Route::post('rightnames/storerightnames','rightnamesController@store')->name('store.rightnames');
Route::get('allcreate.rightnames','rightnamesController@view');
Route::get('edit/rightnames/{id}','rightnamesController@edit');
Route::post('update/rightnames/{id}','rightnamesController@update');
Route::get('delete/rightnames/{id}','rightnamesController@destroy');



