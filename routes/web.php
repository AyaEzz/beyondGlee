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



Route::get('/', 'ProductController@getHome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/{name}' , 'UserController@getProfile');

Route::get('/category/{cat}' , 'ProductController@getCat');
Route::get('/category/{cat}/{scat}' , 'ProductController@getSubCat');
Route::get('/product/{id}' , 'ProductController@getProduct');
Route::get('/quickview/{id}' , 'ProductController@getQuickView');
Route::get('addtowishlist', function () {
    return back()->with('success', 'Product added to wish list');
});
Route::post('addtowishlist' , ['as'=>'Product.addWishList','uses'=>'CartController@addWishList']);

Route::get('addtocart', function () {
    return redirect()->back();
});

Route::prefix('admin')->group(function () {

            Route::get('AdminPanel', 'AdminController@getAdminPanel');
            Route::get('AddUser', 'AdminController@getAdduserPanel');
            Route::post('AddUser', ['as'=>'admin.AddUser','uses'=>'AdminController@addUser']);
            Route::get('EditUser', 'AdminController@getEdituserPanel');
            Route::get('/editprofile/{id}' , 'AdminController@getQuickEdit');
            Route::post('/editprofile/{id}', ['as'=>'admin.editprofile','uses'=>'AdminController@editUser']);
            Route::get('DeleteUser', 'AdminController@getDeleteUserPanel');
            Route::get('/deleteuser/{id}' , 'AdminController@removeUserConfirm');
            Route::post('/deleteuser/{id}', ['as'=>'admin.deleteuser','uses'=>'AdminController@removeUser']);
            Route::get('UserRoles', 'AdminController@getUserRole');
            Route::get('/userrole/{id}' , 'AdminController@userRoleAjax');
            Route::post('/userrole/{id}', ['as'=>'admin.userrole','uses'=>'AdminController@changeUserRole']);

    Route::prefix('Product')->group(function () {

        Route::get('', 'Admin\ProductController@getIndex');
        Route::get('Add', 'Admin\ProductController@getAdd');
        Route::post('Add', ['as'=>'admin.Product.Add','uses'=>'Admin\ProductController@add']);
        Route::get('Delete', 'Admin\ProductController@getDelete');
        //Route::post('Add', ['as'=>'admin.Product.Add','uses'=>'Admin\ProductController@add']);
        Route::get('Delete/{id}', 'Admin\ProductController@DeleteProduct');
        Route::get('Delete/Sub/{id}', 'Admin\ProductController@DeleteSubProduct');
        Route::get('Edit', 'Admin\ProductController@getEdit');
        Route::get('Edit/{id}', 'Admin\ProductController@EditProductAjax');
        Route::post('Edit/{id}', ['as'=>'admin.Product.Edit','uses'=>'Admin\ProductController@EditProductAjaxSave']);
        Route::get('Edit/Sub/{id}', 'Admin\ProductController@EditSubProduct');
        Route::post('Edit/Sub/{id}', ['as'=>'admin.SubProduct.Edit','uses'=>'Admin\ProductController@EditSubProductSave']);
        Route::get('AddSub/{id}', 'Admin\ProductController@EditSubProduct');
        Route::post('AddSub/{id}', ['as'=>'admin.SubProduct.Add','uses'=>'Admin\ProductController@AddSubProductSave']);
        Route::get('Delete/Tag/{prod_id}/{tag_id}', 'Admin\ProductController@DeleteTagProduct');
        Route::get('Reviews/{id}', 'Admin\ProductController@getReviews');
        Route::get('Reviews/Delete/{id}', 'Admin\ProductController@DeleteReview');
        Route::get('Instagram', 'Admin\ProductController@getInstagram');
        Route::post('Instagram', ['as'=>'admin.Product.AddInstagram','uses'=>'Admin\ProductController@addInstagram']);
        Route::get('Instagram/Edit/{id}', 'Admin\ProductController@getEditInstagram');
        Route::post('Instagram/Edit/{id}', ['as'=>'admin.Product.EditInstagram','uses'=>'Admin\ProductController@setEditInstagram']);
        Route::get('Instagram/Delete/{id}', 'Admin\ProductController@DeleteInstagram');
    });

    Route::prefix('Categories')->group(function () {

        Route::get('','Admin\CategoryController@getIndex');
        Route::get('Edit/{id}', 'Admin\CategoryController@EditCategoryAjax');
        Route::post('Edit/{id}', ['as'=>'admin.Categories.Edit','uses'=>'Admin\CategoryController@EditCategoryAjaxSave']);
        Route::get('Add', 'Admin\CategoryController@getIndex');
        Route::post('Add', ['as'=>'admin.Categories.Add','uses'=>'Admin\CategoryController@AddCategory']);
        Route::get('Edit/Sub/{id}', 'Admin\CategoryController@EditSubCategory');
        Route::post('Edit/Sub/{id}', ['as'=>'admin.SubCategories.Edit','uses'=>'Admin\CategoryController@EditSubCategorySave']);
        Route::get('Add/Sub/{id}', 'Admin\CategoryController@EditSubCategory');
        Route::post('Add/Sub/{id}', ['as'=>'admin.SubCategories.Add','uses'=>'Admin\CategoryController@AddSubCategory']);
        Route::get('Delete/{id}', 'Admin\CategoryController@DeleteCategory');
        Route::get('Delete/Sub/{id}', 'Admin\CategoryController@DeleteSubCategory');



    });

    Route::prefix('Distributors')->group(function () {

        Route::get('','Admin\DistributorsController@getIndex');
        Route::get('Edit/{id}', 'Admin\DistributorsController@EditDistributorAjax');
        Route::post('Edit/{id}', ['as'=>'admin.Distributors.Edit','uses'=>'Admin\DistributorsController@EditDistributorAjaxSave']);
        Route::get('Delete/{id}', 'Admin\DistributorsController@DeleteDistributor');
        Route::get('Add', 'Admin\DistributorsController@getIndex');
        Route::post('Add', ['as'=>'admin.Distributors.Add','uses'=>'Admin\DistributorsController@Add']);


    });

    Route::prefix('Orders')->group(function () {

        Route::get('','Admin\OrdersController@getIndex');
        Route::get('View/{id}','Admin\OrdersController@getOrderDetails');
        Route::get('Edit', 'Admin\OrdersController@getEdit');
        Route::get('Edit/{id}', 'Admin\OrdersController@getEdit');
        Route::post('Edit/{id}', ['as'=>'admin.Orders.Edit','uses'=>'Admin\OrdersController@editOrder']);



    });

    Route::get('Activity', 'AdminController@getActivity');

    Route::prefix('Shipping')->group(function () {

        Route::get('','Admin\ShippingController@getIndex');
        Route::get('Edit/{id}', 'Admin\ShippingController@getIndex');
        Route::post('Edit/{id}', ['as'=>'admin.Shipping.Edit','uses'=>'Admin\ShippingController@EditState']);
        Route::get('Delete/{id}', 'Admin\ShippingController@DeleteState');
        Route::get('Add', 'Admin\ShippingController@getIndex');
        Route::post('Add', ['as'=>'admin.Shipping.Add','uses'=>'Admin\ShippingController@AddState']);


    });

    Route::prefix('Coupons')->group(function () {

        Route::get('','Admin\CouponController@getIndex');
        Route::get('Add', 'Admin\CouponController@getAdd');
        Route::post('Add', ['as'=>'admin.Coupons.Add','uses'=>'Admin\CouponController@AddSave']);
        Route::get('Delete', 'Admin\CouponController@getDelete');
        //Route::post('Add', ['as'=>'admin.Product.Add','uses'=>'Admin\ProductController@add']);
        Route::get('Delete/{id}', 'Admin\CouponController@DeleteCoupon');
        Route::get('Edit', 'Admin\CouponController@getEdit');
        Route::get('Edit/{id}', 'Admin\CouponController@EditCouponAjax');
        Route::get('Active/{id}', 'Admin\CouponController@ActiveCoupon');
        Route::post('Edit/{id}', ['as'=>'admin.Coupons.Edit','uses'=>'Admin\CouponController@EditCouponSave']);
        Route::get('View/CatFilter/{id}', 'Admin\CouponController@CateFilterAjax');
        Route::get('View/UserFilter/{id}', 'Admin\CouponController@UserFilterAjax');
        Route::get('View/{id}', 'Admin\CouponController@CouponItems');


    });





});


Route::post('addtocart' , ['as'=>'Product.addToCart','uses'=>'CartController@addToCart'
]);
Route::get('/addreview/{id}', function () {
    return back()->with('success', 'Review added successfully');
});
Route::post('/addreview/{id}' , 'ProductController@addReview'
);

Route::get('/catg', function () {
    return view('/layouts/catg');
});
Route::get('/shop', 'ProductController@getShop');

Route::get('/singlePro', function () {
    return view('/layouts/singlePro');
});
Route::get('/cart', 'CartController@getCart');
Route::post('cart' , ['as'=>'Card.modifyCart','uses'=>'CartController@modifyCart'
]);

Route::get('/checkout', 'CartController@getCheckout');
Route::post('/checkout', ['as'=>'Checkout.setCheckout','uses'=>'CartController@setCheckout']);

Route::get('/removeCartItem/{id}','CartController@removeCardList');

Route::get('/contact', 'ContactUSController@contactUS');

Route::post('/contact', ['as'=>'contactus.store','uses'=>'ContactUSController@contactUSPost']);

Route::get('/faq', function () {
    return view('/layouts/faq');
});

Route::get('/terms', function () {
    return view('/layouts/terms');
}); 

Route::get('/policy', function () {
    return view('/layouts/policy');
});
Route::get('/about', function () {
    return view('/layouts/about');
});

Route::get('/wishlist','CartController@getWishList');
Route::get('/removewishlist/{id}','CartController@removeWishList');


Route::get('logout', 'Auth\LoginController@logout');

//Social provider routing
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('likeProduct', function () {
    return redirect()->back();
});

Route::post('likeProduct' , ['as'=>'Product.like','uses'=>'ProductController@likeProduct'
]);

Route::get('/cartreview', 'CartController@getReview');
Route::post('/cartreview' , ['as'=>'Product.Review','uses'=>'CartController@cartReview'
]);

Route::get('/skipreview', 'CartController@skipCartReview');

Route::get('/distributors' , 'pageController@getDistro');
Route::get('/user/{name}/order/{orderid}' , 'UserController@getorder');

Route::get('/search', 'ProductController@getSearch');
Route::post('/search' , ['as'=>'Product.Search','uses'=>'ProductController@getSearch'
]);

Route::get('copoun', function () {
    return redirect()->back();
});

Route::post('copoun' , ['as'=>'Cart.copoun','uses'=>'CartController@setCoupon'
]);

Route::get('/editprofile' , 'UserController@edituser');

Route::post('/editprofile', ['as'=>'User.Update','uses'=>'UserController@updateUser']);

