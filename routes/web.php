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
// Start & All Registration Route Bride & Groom  & Super admin only Login old data comletly workin
	// Route::get('login',['as'=>'login','uses'=>'RegistrationController@brideGroomLoginForm']);
	// Route::post('login',['as'=>'login','uses'=>'RegistrationController@brideGroomSuperAdminLogin']);
	// // Route::get('registration',['as'=>'registration','uses'=>'RegistrationController@brideGroomRegistration']);
	// // Route::post('registration',['as'=>'registration','uses'=>'RegistrationController@brideGroomRegistrationCreate']);
	// Route::get('get_gender_name/{id}',['as'=>'get_gender_name','uses'=>'RegistrationController@getGenderName']);

	
// Start Registration Field
	//// Start & All Registration Route Bride & Groom  & Super admin only Login New Route New Beginning 
	Route::get('registration',['as'=>'registration','uses'=>'RegistrationController@brideGroomRegistration']);
	Route::post('registration',['as'=>'registration','uses'=>'RegistrationController@brideGroomRegistrationCreate']);
	Route::get('login',['as'=>'login','uses'=>'RegistrationController@brideGroomLoginForm']);
	Route::post('login',['as'=>'login','uses'=>'RegistrationController@brideGroomSuperAdminLogin']);
	// confirm_email from registration

	Route::post('confirm_email',['as'=>'confirm_email','uses'=>'RegistrationController@confirmEmail']);
	Route::post('confirm_mobile_no',['as'=>'confirm_mobile_no','uses'=>'RegistrationController@confirmMobileNo']);



	
	Route::post('varification_otp',['as'=>'varification_otp','uses'=>'RegistrationController@varificationOtp']);
	Route::get('forgot_password',['as'=>'forgot_password','uses'=>'RegistrationController@forgotPassword']);
	Route::post('forgot_password',['as'=>'forgot_password','uses'=>'RegistrationController@forgotPasswordCreate']);
	Route::get('reset_password/{email}',['as'=>'reset_password','uses'=>'RegistrationController@resetPassword']);
	Route::get('set_password',['as'=>'set_password','uses'=>'RegistrationController@setPassword']);
	Route::post('set_password',['as'=>'set_password','uses'=>'RegistrationController@setPasswordCreate']);

// EndRegistration Field





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

	// new workin 
	Route::get('1vivah/intro',['as'=>'intro','uses'=>'LandingController@introOneVivah']);
	Route::get('1vivah/review',['as'=>'review','uses'=>'LandingController@Review']);
	Route::post('1vivah/riview_one_vivah',['as'=>'riview_one_vivah','uses'=>'LandingController@riviewOneVivah']);





	//Self Profileview Under in BrideGroomController
	Route::get('1vivah/self_profile_form',['as'=>'self_profile_form','uses'=>'BrideGroomController@selfProfileForm']);
	Route::post('1vivah/self_profile_create',['as'=>'self_profile_create','uses'=>'BrideGroomController@selfProfileCreate']);
	Route::get('1vivah/self_profile',['as'=>'self_profile','uses'=>'BrideGroomController@viewSelfProfile']);
	// Route::post('1vivah/upload_image',['as'=>'upload_image','uses'=>'BrideGroomController@uploadImage']);
	Route::get('1vivah/destroy_image_gallery',['as'=>'destroy_image_gallery','uses'=>'BrideGroomController@destroyImageGallery']);
	Route::get('1vivah/destroy_image/{id}',['as'=>'destroy_image','uses'=>'BrideGroomController@destroyImage']);
	Route::post('1vivah/update_self_profile',['as'=>'update_self_profile','uses'=>'BrideGroomController@updateSelfProfile']);

	Route::get('1vivah/family_details',['as'=>'family_details','uses'=>'BrideGroomController@familyDetails']);
	Route::post('1vivah/family_details',['as'=>'family_details','uses'=>'BrideGroomController@familyDetailsCreate']);
	Route::get('1vivah/partner_preference',['as'=>'partner_preference','uses'=>'BrideGroomController@partnerPreference']);
	Route::post('1vivah/update_partner_preferance',['as'=>'update_partner_preferance','uses'=>'BrideGroomController@updatePartnerPreferance']);

// upload_image
	



	Route::get('1vivah/testing_profile',['as'=>'testing_profile','uses'=>'BrideGroomController@testing_profile']);
	Route::post('1vivah/upload_cover_profile',['as'=>'upload_cover_profile','uses'=>'BrideGroomController@uploadCoverProfile']);
	Route::post('1vivah/update_profile',['as'=>'update_profile','uses'=>'BrideGroomController@updateProfile']);


	Route::get('1vivah/notification_msg',['as'=>'notification_msg','uses'=>'BrideGroomController@notificationMsg']);
	Route::post('1vivah/upload_image',['as'=>'upload_image','uses'=>'BrideGroomController@uploadImages']);




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


// ================================Start SuperAdmin Routes====================================
Route::group(['middleware'=>['super_adminb_middleware']],function(){

	Route::get('super_admin/super_admin_index',['as'=>'super_admin_index','uses'=>'SuperAdminController@superAdminIndex']);
	// new add bride_groom we can use get_gender_name in registration_table

	// old code after remove

	Route::get('super_admin/bride_groom',['as'=>'bride_groom','uses'=>'SuperAdminController@brideGroomGenderTable']);
	Route::post('super_admin/bride_groom',['as'=>'bride_groom','uses'=>'SuperAdminController@brideGroomCreate']);
	Route::get('super_admin/destroy_bride_groom_gender/{id}',['as'=>'destroy_bride_groom_gender','uses'=>'SuperAdminController@destroyBrideGroomGender']);
	// old code after remove


	// new route for gender && start new route
	Route::get('super_admin/gender',['as'=>'gender','uses'=>'SuperAdminController@genderTable']);
	Route::post('super_admin/gender',['as'=>'gender','uses'=>'SuperAdminController@genderCreate']);
	Route::get('super_admin/destro_gender/{id}',['as'=>'destro_gender','uses'=>'SuperAdminController@destroyGender']);


	Route::get('super_admin/registration_by',['as'=>'registration_by','uses'=>'SuperAdminController@registrationBy']);
	Route::Post('super_admin/registration_by',['as'=>'registration_by','uses'=>'SuperAdminController@registrationByCreate']);
	Route::get('super_admin/destroy_registration_by/{id}',['as'=>'destroy_registration_by','uses'=>'SuperAdminController@destroyRegistrationBy']);






	Route::get('super_admin/marital_status',['as'=>'marital_status','uses'=>'SuperAdminController@maritalStatusTable']);
	Route::post('super_admin/marital_status',['as'=>'marital_status','uses'=>'SuperAdminController@maritalStatusCreate']);
	Route::get('super_admin/destroy_marital_status/{id}',['as'=>'destroy_marital_status','uses'=>'SuperAdminController@destroyMaritalStatus']);

	Route::get('super_admin/state',['as'=>'state','uses'=>'SuperAdminController@stateTable']);
	Route::post('super_admin/state',['as'=>'state','uses'=>'SuperAdminController@stateCreate']);
	Route::get('super_admin/destroy_state/{id}',['as'=>'destroy_state','uses'=>'SuperAdminController@destroyState']);


	Route::get('super_admin/religion',['as'=>'religion','uses'=>'SuperAdminController@religionTable']);
	Route::post('super_admin/religion',['as'=>'religion','uses'=>'SuperAdminController@religionCreate']);
	Route::get('super_admin/destroy_religion/{id}',['as'=>'destroy_religion','uses'=>'SuperAdminController@destroyReligion']);

	Route::get('super_admin/bride_registration',['as'=>'bride_registration','uses'=>'SuperAdminController@brideRegistrationView']);
	Route::get('super_admin/groom_registration',['as'=>'groom_registration','uses'=>'SuperAdminController@groomRegistrationView']);
	Route::get('super_admin/super_admin_profile',['as'=>'super_admin_profile','uses'=>'SuperAdminController@superAdminProfile']);
	Route::post('super_admin/create_profile',['as'=>'create_profile','uses'=>'SuperAdminController@createProfile']);

	Route::post('super_admin/update_profile',['as'=>'update_profile','uses'=>'SuperAdminController@updateProfile']);

	Route::post('super_admin/search',['as'=>'search','uses'=>'SuperAdminController@groomSearchRegistration']);
	Route::post('super_admin/bride_search',['as'=>'bride_search','uses'=>'SuperAdminController@brideSearchRegistration']);



	// Blood Group
	Route::get('super_admin/blood_group',['as'=>'blood_group','uses'=>'SuperAdminController@bloodGroupTable']);
	Route::Post('super_admin/blood_group',['as'=>'blood_group','uses'=>'SuperAdminController@bloodGroupCreate']);
	Route::get('super_admin/destroy_blood_group/{id}',['as'=>'destroy_blood_group','uses'=>'SuperAdminController@destroyBloodGroup']);

	Route::get('super_admin/success_couple',['as'=>'success_couple','uses'=>'SuperAdminController@successCoupleTable']);
	Route::post('super_admin/success_couple',['as'=>'success_couple','uses'=>'SuperAdminController@successCoupleCreate']);
	Route::get('super_admin/destroy_success_couple/{id}',['as'=>'destroy_success_couple','uses'=>'SuperAdminController@destroySuccessCouple']);

	// Route::get('super_admin/registration_by',['as'=>'registration_by','uses'=>'SuperAdminController@registrationBy']);
	// Route::Post('super_admin/registration_by',['as'=>'registration_by','uses'=>'SuperAdminController@registrationByCreate']);
	// Route::get('super_admin/destroy_registration_by/{id}',['as'=>'destroy_registration_by','uses'=>'SuperAdminController@destroyRegistrationBy']);

	Route::get('admin_logout',['as'=>'admin_logout','uses'=>'SuperAdminController@adminLogout']);



	// Route::get('super_admin/destroy_bride_groom/{id}',['as'=>'destroy_bride_groom','uses'=>'SuperAdminController@destroyBrideGroom']);
});


// End SuperAdmin Routes






	// /super_admin password automatic ink 
	Route::get('super_admin',['as'=>'super_admin','uses'=>'SuperAdminController@superAdmin']);



//only for testing route
 Route::get('1vivah/dumy_testing',['as'=>'dumy_testing','uses'=>'LandingController@Testing']);

// Route::get('1vivah/bride_groom_matches_profile',['as'=>'bride_groom_matches_profile','uses'=>'LandingController@brideGroomMatchesProfile']);


