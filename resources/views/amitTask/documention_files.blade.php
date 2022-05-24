  ========== SETUP CONTROLLER WEB Controllers LandingController===========
	  1.LandingController Under
		a.Home, b.About, c.Contact .d.WebIndex

	========== SETUP CONTROLLER RegistrationController===========
	2.RegistrationController Under
		bride groom registration create  3 tbl divided 
		*.usersTbl
		*.registration_brides_tbl
		*.registration_grooms_tbl

	   # Points:	
		*.when registration create succefully send greting msg email thro...
		*.when user create registration for select(son,doughter,brother..)dynamic change gender
		*. when type localhost:8000 opne web index page in browser & freely use Ex.(search,refistration,contact,...)
		*. right side login,registratin form but super  admin can only login  show open page admin dashboard pannel 
		Or admin dashboard left side web_index button click redirect web index page 
		env email files

	================3.BrideGroomController Under condition && front==================
		*bride_profile_tbl insert data from both tbl
		*groom_profile_tbl insert data from both tbl

	  # Points:
		*.dynamicaly status dropdown /state dropdown / religion:

	  # 2 Points :
		*.    if(Auth::User()->bride_profile_id == null) show msg please Make First Self Profile in view_self_profile && index 

		*.without crete self_profile you can't view self profile (condition) in viewSelfProfile

	# 3 Points  Points from index web page fileterBox:
		*.search filter table_box
		*.before create matchesProfileView 

		    public function matchesProfileView(){

		        return view('bride_groom/matches_profile');
		    }

		 *after search request condition & return data from  FilterBrideGroom matchesProfileView
		 *.next  click full profile link show  bire & groom  details 

	# 4. Points from index web page myProfile
		*.right side  myprofile in index  without login and without create self_profile  
			you can't directly access this page and condition bride_groom controller 
			(ye condition isliye lagaya hai ki kohi bi bride groom direct opne nhi karana chahiye sabse pahile login & create profile)

	#.5 Points filter matches data click (full_profile)&after show profile details


	#.6 SelfProfile when click SelfProfile show all details && profile_image in outher table 

	<!-- Points filter matches data click (full_profile)	save insert data in database (RecentlyViewProfile_tbl)  only save visitor_user_id visitor_user_role & visited_Profile_id & role &after show profile details -->
	 	
 

	========== * SETUP CONTROLLER Superadmin Controller *===========
	4.Superadmin Controller Under
		*.admin index
		*.bride_groom_table
		*.marital_status
		*.states
		*.religions
	  # Points:
		*.bride_groom_table  self,brother , son  && gender
		 befor add *.bride_groom_table   he use registration frop down
		*marital_status /states /religions he use profile create in web pannel

	  # Points:
	  		*.create SuperAdminbMiddleware	middleware
	  		*.using role condition role==1