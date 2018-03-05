<?php
// check login
Route::any('/checklogin','HomeController@CheckLogin');

// home
Route::any('/',array('as' => 'home', 'uses' => 'HomeController@Index'));

// lay them danh sach products
Route::post('GetViewProducts', 'HomeController@GetViewProducts');
// Cart
Route::group(['prefix'=>'cart'],function(){
	// thêm sản phẩm vào cart
	Route::post('add','CartController@Add');
	// home cart
	Route::get('/','CartController@Index');
	// address
	Route::post('order','CartController@Order');
	// thanh toán
	Route::post('invoice','CartController@Invoice');
	// delete item
	Route::post('delete','CartController@Delete');
	// create order
	Route::post('createorder','CartController@CreateOrder');
});

// Login
Route::group(['prefix'=>'login'],function(){
	Route::get('/','LoginController@Index');
	Route::post('acept','LoginController@Check');
	Route::post('out','LoginController@Out');
	// tạo tài khoản
	Route::any('regis','LoginController@Rigis');
	Route::any('checkusername','LoginController@CheckUsername');
	Route::any('checkemail','LoginController@CheckEmail');

});
// product
Route::group(['prefix'=>'product'],function(){
	Route::get('/','ProductController@Get');
	Route::any('star','ProductController@StarProduct');
});
// Remember password
Route::group(['prefix'=>'remember'],function(){
	Route::any('findAccount','AccountController@FindAcount');
	// tìm kiếm tài khoản
	Route::any('find','RememberController@Index');
	// nhập mã
	Route::any('type','RememberController@Type');
	//  đổi mật khẩu
	Route::any('changepass','RememberController@ChangePass');
	// xác nhận
	Route::post('checkToken','AccountController@CheckToken');
	Route::post('changepass','AccountController@ChangePass');
});
// Thông tin tài khoản
Route::group(['prefix'=>'account'],function(){
	Route::get('/','AccountController@Index');
	Route::post('infomation','AccountController@Info');
	Route::post('mess','AccountController@Mess');
	Route::post('order','AccountController@Order');
	Route::post('checkpassold','AccountController@CheckPassOld');
	Route::post('changeinfo','AccountController@ChangeInfo');
	Route::post('updateMess','AccountController@UpdateMess');

});
// admin route
Route::group(['prefix'=>'admin'],function(){
	// trang đầu
	Route::get('/','ManageHomeController@Index');
	// login
	Route::any('manage','ManageHomeController@Login');
	Route::any('logout','ManageHomeController@logOut');
	// thông tin tai khoản
	Route::any('profile','ManageHomeController@Profile');
	// group for address
	Route::group(['prefix'=>'address'],function(){
		// get danh sách city
		Route::any('getallcity','ManageAddressController@GetCitys');
		// get danh sách districts
		Route::any('getdistrictsbycity','ManageAddressController@GetDistrictsByIdCity');
		// get danh sách districts
		Route::any('getwardbydistrict','ManageAddressController@GetWardsByIdDistrict');
		// lấy ra view quận hyện
		Route::post('district','ManageAddressController@GetDistrictView');
		// lấy view thành phố
		Route::post('city','ManageAddressController@GetCityView');
		// lấy view thành phó
		Route::post('ward','ManageAddressController@GetWardView');
		Route::post('search/city','ManageAddressController@actionSearchCity');
		Route::post('search/district','ManageAddressController@actionSearchDistrict');
		Route::any('search/ward','ManageAddressController@actionSearchWard');
		Route::post('delete/city','ManageAddressController@actionDeleteCity');
		Route::post('delete/ward','ManageAddressController@actionDeleteWard');
		Route::post('delete/district','ManageAddressController@actionDeleteDistrict');
		Route::post('add/city','ManageAddressController@actionAddCity');
		Route::post('add/district','ManageAddressController@actionAddDistrict');
		Route::post('add/ward','ManageAddressController@actionAddWard');
	});
	// group khuyến mãi
	Route::group(['prefix'=>'promotion'],function(){
		// lấy view khuyến mãi
		Route::post('/','ManagePromotionController@GetPromotion');
		Route::any('search','ManagePromotionController@actionSearch');
		Route::any('delete','ManagePromotionController@actionDelete');
		Route::post('add','ManagePromotionController@actionAdd');
		
	});
	// group color
	Route::group(['prefix'=>'color'],function(){
		// lấy view màu sắt
		Route::post('/','ManageColorController@GetColors');
		Route::any('getListColor','ManageColorController@actionGetColors');
		Route::any('search','ManageColorController@actionSearch');
		Route::any('delete','ManageColorController@actionDelete');
		Route::post('add','ManageColorController@actionAdd');

	});
	// group size
	Route::group(['prefix'=>'size'],function(){
		// lấy view màu sắt
		Route::post('/','ManageSizeController@GetSizes');
		Route::any('getListSize','ManageSizeController@actionGetSizes');
		Route::any('search','ManageSizeController@actionSearch');
		Route::post('delete','ManageSizeController@actionDelete');
		Route::post('add','ManageSizeController@actionAdd');

	});
	// group customer
	Route::group(['prefix'=>'customer'],function(){
		// lấy view màu sắt
		Route::post('/','ManageCustomerController@GetCustomers');
		Route::post('search','ManageCustomerController@actionSearch');
		Route::post('sendEmail','ManageCustomerController@actionSendMail');

	});
	// group productcategory
	Route::group(['prefix'=>'productcategory'],function(){
		// lấy view màu sắt
		Route::post('/','ManageProductCategoryController@GetProductCategorys');
		Route::any('getListCategory','ManageProductCategoryController@actionGetList');
		Route::post('search','ManageProductCategoryController@actionSearch');
		Route::post('delete','ManageProductCategoryController@actionDelete');
		Route::post('add','ManageProductCategoryController@actionAdd');
		Route::post('update','ManageProductCategoryController@actionUpdate');


	});
	// group product
	Route::group(['prefix'=>'product'],function(){
		// lấy view màu sắt
		Route::post('/','ManageProductController@GetProducts');
		Route::any('search','ManageProductController@actionSearch');
		Route::any('delete','ManageProductController@actionDelete');
		Route::any('prices','ManageProductController@actionGetPrices');
		Route::any('add','ManageProductController@actionAdd');
		Route::any('getItem','ManageProductController@actionGetItem');

	});
	// group statictis
	Route::group(['prefix'=>'statictis'],function(){
		// lấy view màu sắt
		Route::post('revenue','ManageStatictisController@Revenue');
		Route::any('revenueView','ManageStatictisController@RevenuePartialStatistics');

		Route::post('bestsell','ManageStatictisController@Bestsell');
		Route::any('bestsellView','ManageStatictisController@BestsellPartialStatistics');

		Route::post('customer','ManageStatictisController@Customer');
		Route::any('customerView','ManageStatictisController@CustomerPartialStatistics');


	});
	// group order
	Route::group(['prefix'=>'order'],function(){
		// lấy view màu sắt
		Route::post('new','ManageOrderController@actionNewOrder');
		Route::post('confirm','ManageOrderController@actionConfirmed');
		Route::post('delete','ManageOrderController@actionDelete');
		Route::post('done','ManageOrderController@actionDone');
		Route::post('confirmOrder','ManageOrderController@actionConfirm');


	});
});

