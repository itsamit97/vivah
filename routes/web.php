<?php

use Illuminate\Support\Facades\Route;

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

	/*here four controller in web_index 

	1.RegistrationController Under => 
		registration && login
	2.LandingController Under =>
		 webIndex,About,ContactForm,LogutBrideGroom
	3.BrideGroomController Under => 
	selfProfileForm, viewSelfProfile ,uploadImage,destroyImageGallery,destroyImage,updateSelfProfile
	4.FilterController Under=>
		matchesProfileView, FilterBrideGroom, proposalRequest,cancelRequest,brideGroomDetails,recentlyViewProfile,imageGallery*/


// Start & All Registration Route Bride & Groom  & Super admin only Login
	Route::get('login',['as'=>'login','uses'=>'RegistrationController@brideGroomLoginForm']);
	Route::post('login',['as'=>'login','uses'=>'RegistrationController@brideGroomSuperAdminLogin']);
	Route::get('registration',['as'=>'registration','uses'=>'RegistrationController@brideGroomRegistration']);
	Route::post('registration',['as'=>'registration','uses'=>'RegistrationController@brideGroomRegistrationCreate']);
	//get_gender_name in bride_groom tbl
	Route::get('get_gender_name/{id}',['as'=>'get_gender_name','uses'=>'RegistrationController@getGenderName']);
	// Service Provider
	Route::get('service_provider_reg',['as'=>'service_provider_reg','uses'=>'RegistrationController@serviceProviderRegistration']);

// End Bride & Groom  & All Registration Route  & Super admin Login

// Start WebIndex Page  LandingController Under
	Route::get('/',['as'=>'index','uses'=>'LandingController@webIndex']);
	Route::get('1vivah/index',['as'=>'index','uses'=>'LandingController@webIndex']);
	Route::get('1vivah/about',['as'=>'about','uses'=>'LandingController@About']);
	Route::get('1vivah/contact',['as'=>'contact','uses'=>'LandingController@ContactForm']);
	Route::post('1vivah/contact_create',['as'=>'contact_create','uses'=>'LandingController@ContactCreate']);
	Route::get('1vivah/logut',['as'=>'logut','uses'=>'LandingController@LogutBrideGroom']);


	// Route::post('1vivah/filter',['as'=>'filter','uses'=>'LandingController@FilterBrideGroom']);

	//Self Profileview Under in BrideGroomController
	Route::get('1vivah/self_profile_form',['as'=>'self_profile_form','uses'=>'BrideGroomController@selfProfileForm']);
	Route::post('1vivah/self_profile_create',['as'=>'self_profile_create','uses'=>'BrideGroomController@selfProfileCreate']);
	Route::get('1vivah/self_profile',['as'=>'self_profile','uses'=>'BrideGroomController@viewSelfProfile']);
	Route::post('1vivah/upload_image',['as'=>'upload_image','uses'=>'BrideGroomController@uploadImage']);
	Route::get('1vivah/destroy_image_gallery',['as'=>'destroy_image_gallery','uses'=>'BrideGroomController@destroyImageGallery']);
	Route::get('1vivah/destroy_image/{id}',['as'=>'destroy_image','uses'=>'BrideGroomController@destroyImage']);
	Route::post('1vivah/update_self_profile',['as'=>'update_self_profile','uses'=>'BrideGroomController@updateSelfProfile']);




	// Route::get('1vivah/matches_profile',['as'=>'matches_profile','uses'=>'BrideGroomController@matchesProfileView']);
	// Route::post('1vivah/filter',['as'=>'filter','uses'=>'BrideGroomController@FilterBrideGroom']);
	// Route::post('1vivah/proposal_request',['as'=>'proposal_request','uses'=>'BrideGroomController@proposalRequest']);
	// Route::post('1vivah/cancel_request',['as'=>'cancel_request','uses'=>'BrideGroomController@cancelRequest']);
	// Route::get('1vivah/proposal_request_view',['as'=>'proposal_request_view','uses'=>'BrideGroomController@proposalRequestView']);
	// Route::get('1vivah/bride_groom_details/{id}/{role}',['as'=>'bride_groom_details','uses'=>'BrideGroomController@brideGroomDetails']);
	// Route::get('1vivah/recently_view',['as'=>'recently_view','uses'=>'BrideGroomController@recentlyViewProfile']);
	// Route::get('1vivah/image_gallery/{id}/{role}',['as'=>'image_gallery','uses'=>'BrideGroomController@imageGallery']);



	//Filter Form Under In FilterController
	Route::get('1vivah/matches_profile',['as'=>'matches_profile','uses'=>'FilterController@matchesProfileView']);
	Route::post('1vivah/filter',['as'=>'filter','uses'=>'FilterController@FilterBrideGroom']);


	Route::post('1vivah/proposal_request',['as'=>'proposal_request','uses'=>'FilterController@proposalRequest']);
	Route::post('1vivah/cancel_request',['as'=>'cancel_request','uses'=>'FilterController@cancelRequest']);
	

	Route::post('1vivah/reject_request',['as'=>'reject_request','uses'=>'FilterController@rejectRequest']);
	Route::post('1vivah/accept_request',['as'=>'accept_request','uses'=>'FilterController@acceptRequest']);




	Route::get('1vivah/proposal_request_view',['as'=>'proposal_request_view','uses'=>'FilterController@proposalRequestView']);
	Route::get('1vivah/bride_groom_details/{id}/{role}',['as'=>'bride_groom_details','uses'=>'FilterController@brideGroomDetails']);
	Route::get('1vivah/recently_view',['as'=>'recently_view','uses'=>'FilterController@recentlyViewProfile']);
	Route::get('1vivah/image_gallery/{id}/{role}',['as'=>'image_gallery','uses'=>'FilterController@imageGallery']);




	Route::get('1vivah/proposal_all_request',['as'=>'proposal_all_request','uses'=>'FilterController@proposalAllRequest']);

	// Route::get('1vivah/sent_incomming_request',['as'=>'sent_incomming_request','uses'=>'FilterController@incommingAndSentProposalRequest']);

// End WebIndex Route

// ================================Start SuperAdmin====================================
// Start SuperAdmin Routes
Route::group(['middleware'=>['super_adminb_middleware']],function(){

	Route::get('super_admin/super_admin_index',['as'=>'super_admin_index','uses'=>'SuperAdminController@superAdminIndex']);
	// Route::get('super_admin/registration_for',['as'=>'registration_for','uses'=>'SuperAdminController@addRegistrationFor']);


	// new add bride_groom we can use get_gender_name in registration_table
	Route::get('super_admin/bride_groom',['as'=>'bride_groom','uses'=>'SuperAdminController@brideGroomGenderTable']);
	Route::post('super_admin/bride_groom',['as'=>'bride_groom','uses'=>'SuperAdminController@brideGroomCreate']);

	Route::get('super_admin/marital_status',['as'=>'marital_status','uses'=>'SuperAdminController@maritalStatusTable']);
	Route::post('super_admin/marital_status',['as'=>'marital_status','uses'=>'SuperAdminController@maritalStatusCreate']);

	Route::get('super_admin/state',['as'=>'state','uses'=>'SuperAdminController@stateTable']);
	Route::post('super_admin/state',['as'=>'state','uses'=>'SuperAdminController@stateCreate']);

	Route::get('super_admin/religion',['as'=>'religion','uses'=>'SuperAdminController@religionTable']);
	Route::post('super_admin/religion',['as'=>'religion','uses'=>'SuperAdminController@religionCreate']);

	Route::get('super_admin/bride_registration',['as'=>'bride_registration','uses'=>'SuperAdminController@brideRegistrationView']);

	Route::get('super_admin/groom_registration',['as'=>'groom_registration','uses'=>'SuperAdminController@groomRegistrationView']);
	Route::get('super_admin/super_admin_profile',['as'=>'super_admin_profile','uses'=>'SuperAdminController@superAdminProfile']);
	Route::post('super_admin/create_profile',['as'=>'create_profile','uses'=>'SuperAdminController@createProfile']);

	Route::post('super_admin/update_profile',['as'=>'update_profile','uses'=>'SuperAdminController@updateProfile']);

	Route::post('super_admin/search',['as'=>'search','uses'=>'SuperAdminController@groomSearchRegistration']);
	Route::post('super_admin/bride_search',['as'=>'bride_search','uses'=>'SuperAdminController@brideSearchRegistration']);


	Route::get('admin_logout',['as'=>'admin_logout','uses'=>'SuperAdminController@adminLogout']);


	// Route::get('super_admin/destroy_bride_groom/{id}',['as'=>'destroy_bride_groom','uses'=>'SuperAdminController@destroyBrideGroom']);
});

	

// End SuperAdmin Routes

























//only for testing route
 Route::get('1vivah/dumy_testing',['as'=>'dumy_testing','uses'=>'LandingController@Testing']);

// Route::get('1vivah/bride_groom_matches_profile',['as'=>'bride_groom_matches_profile','uses'=>'LandingController@brideGroomMatchesProfile']);



