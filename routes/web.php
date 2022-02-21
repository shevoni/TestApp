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





Route::get('/', function () {
    return view('pickgo');
});
Route::get('/login', function () {
    return view('login');
});



Route::group(['middleware' => 'auth'], function () {


    Route::get('/home', 'App\Http\Controllers\ProductsController@product_count');

    Route::get('/centers', function () {
        $data= App\Models\Centers::all();
        $city= App\Models\Cities::all();
            return view('centers')->with('centers',$data)->with('city',$city);
        });

    Route::get('/account', function () {
            $data= App\Models\Users::all();
                return view('users')->with('users',$data);
            });



            
    //center details
    Route::post('/centers', 'App\Http\Controllers\CenterController@store' );
    // Route::get('/center_view', 'App\Http\Controllers\CenterController@center_view');
    Route::get('/updatecenters/{cid}', 'App\Http\Controllers\CenterController@updateCenterView' );
    Route::post('/updatecenter', 'App\Http\Controllers\CenterController@updateCenter' );
    //Route::get('/shippings', 'App\Http\Controllers\CenterController@createc' );
    Route::get('/deletecenter/{cid}', 'App\Http\Controllers\CenterController@deleteCenter' );

    //user details
    Route::post('/account', 'App\Http\Controllers\UserController@store' );


    //new request
    Route::get('/new_request', 'App\Http\Controllers\ProductsController@newrequestView' );
    Route::get('/new_request_rider_update/{id}/{rid}', 'App\Http\Controllers\ProductsController@newrequestView_riderUpdate' );


    //dropup
    Route::get('/dropup', 'App\Http\Controllers\ProductsController@dropupView' );
    Route::get('/dropup_rider_update/{id}/{rid}', 'App\Http\Controllers\ProductsController@dropup_riderUpdate' );

    //vehicles details
    Route::post('/vehicles', 'App\Http\Controllers\vehicleController@store' );
    Route::get('/vehicles', 'App\Http\Controllers\vehicleController@vehicle_view' );
    Route::get('/updatevehicles/{vid}', 'App\Http\Controllers\vehicleController@updateVehicleView' );
    Route::post('/updatevehicle', 'App\Http\Controllers\vehicleController@updatevehicle' );
    Route::get('/deletevehicle/{id}', 'App\Http\Controllers\vehicleController@deletevehicle' );

    //shipment details
    Route::post('/shippings', 'App\Http\Controllers\ShipmentsController@store' )->name("shipment");
    Route::get('/shippings/{pid}', 'App\Http\Controllers\ShipmentsController@store' );
    Route::get('/shippings', 'App\Http\Controllers\ShipmentsController@create' );
    Route::post('/shippingsAdd', 'App\Http\Controllers\PackageController@create' );
    Route::get('/shipping-pickup', 'App\Http\Controllers\ShipmentsController@pickup' );
    Route::get('/shippingDetails', 'App\Http\Controllers\ShipmentsController@shipping_view' );
    Route::get('/shipping-mark-as-reciverd/{id}', 'App\Http\Controllers\ShipmentsController@mark_as_reciverd');

    //admin panel
    Route::post('/admin', 'App\Http\Controllers\AdminController@store' );
    Route::get('/admin', 'App\Http\Controllers\AdminController@admin_view' );
    Route::get('/admin', 'App\Http\Controllers\AdminController@admin_view' );
    Route::get('/updateadmins/{id}', 'App\Http\Controllers\AdminController@updateAdminView' );
    Route::post('/updateadmins', 'App\Http\Controllers\AdminController@updateAdmin' );
    Route::get('/deleteadmins/{id}', 'App\Http\Controllers\AdminController@deleteAdmin' );


    //pickup
    Route::get('/search', 'App\Http\Controllers\PickController@search_product');
    Route::get('/pick', 'App\Http\Controllers\PickController@pick');    
    Route::get('/mark-as-pick-up/{id}', 'App\Http\Controllers\PickController@pickup');    

    //rider details
    Route::post('/riders', 'App\Http\Controllers\RiderController@store' );
    Route::get('/riders', 'App\Http\Controllers\RiderController@riders_view' );
    Route::get('/updateriders/{id}', 'App\Http\Controllers\RiderController@updateRidersView' );
    Route::post('/updateriders', 'App\Http\Controllers\RiderController@updateriders' );
    Route::get('/deleteriders/{id}', 'App\Http\Controllers\RiderController@deleteriders' );



    //customer details
    Route::post('/addCustomer', 'App\Http\Controllers\CustomerController@store' );
    Route::get('/customers', 'App\Http\Controllers\CustomerController@customer_view' );
    Route::get('/updatecustomers/{id}', 'App\Http\Controllers\CustomerController@updatecustomersView' );
    Route::post('/updatecustomers', 'App\Http\Controllers\CustomerController@updatecustomers' );
    Route::get('/deletecustomers/{id}', 'App\Http\Controllers\CustomerController@deletecustomers' );

    //count products 
    // Route::get('/adminDashboard', 'App\Http\Controllers\ProductsController@product_count' );



    
    


    Route::get('/addCustomer', function () {
        return view('addCustomer');
    });

    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/signup', function () {
        return view('signup');
    });

    Route::get('/index', function () {
        return view('index');
    });


    Route::get('/pickgo', function () {
        return view('pickgo');
    });
    


    Route::get('/riderLogin', function () {
        return view('riderLogin');
    });
    Route::get('/rider_dashboard', function () {
        return view('rider_dashboard');
    });

    Route::get('/adminDashboard', 'App\Http\Controllers\ProductsController@product_count');


    Route::get('/distance', 'App\Http\Controllers\DistanceController@create');
    Route::post('/distance', 'App\Http\Controllers\DistanceController@store');
 
    
    Route::get('/productPrice', 'App\Http\Controllers\priceController@price_view');
    Route::post('/productPrice', 'App\Http\Controllers\priceController@store');
    
    Route::get('/updateprice/{id}', 'App\Http\Controllers\priceController@updatePriceView');
    Route::post('/updateprice', 'App\Http\Controllers\priceController@updateprice');
    Route::get('/deleteprice/{id}', 'App\Http\Controllers\priceController@deleteprice');
    
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/logout", function (){
    Auth::logout();
    return redirect("/login");
});


//tracking
Route::get('/tracking', 'App\Http\Controllers\trackingController@index');




Route::get('/rider/login', function () {
    return view('riderLogin');
});
Route::post('/valdateData','App\Http\Controllers\RiderController@checkValidate');



Route::prefix('rider')->group(function () {

    Route::group(['middleware' => 'rider_md'], function () {
        
    Route::get('/', 'App\Http\Controllers\RiderController@index' )->name("rider");
    Route::get('/pickup', 'App\Http\Controllers\RiderController@pickup' );
    Route::get('/pickup_mark/{id}', 'App\Http\Controllers\RiderController@pickup_mark' );

    Route::get('/dropup', 'App\Http\Controllers\RiderController@dropup' );
    Route::get('/dropup-conform/{id}', 'App\Http\Controllers\RiderController@dropup_conform' );
    Route::post('/dropup-conform', 'App\Http\Controllers\RiderController@dropup_conform_data' );

    Route::get('/product_view/{pid}', 'App\Http\Controllers\RiderController@product_view');


    });


});


    //product details
    Route::post('/products', 'App\Http\Controllers\ProductsController@store' );
    Route::get('/orders', 'App\Http\Controllers\ProductsController@products_view' );
    Route::get('/product_view/{pid}', 'App\Http\Controllers\ProductsController@product_view');


    Route::get('/logout_', function () {
        Session::flush();

        return redirect("/");
    });

Route::prefix('customer')->group(function () {


    Route::get('/login', function () {
        return view('userLogin');
    });

    Route::post('/login', 'App\Http\Controllers\CustomerController@login' );
    Route::group(['middleware' => 'customer_md'], function () {
    Route::get('/', 'App\Http\Controllers\CustomerController@index');

    Route::get('/products', function () {
        $data= App\Models\Products::all();
        $city= App\Models\Cities::all();
            return view('products')->with('products',$data)->with('city',$city);
        });    
    });

});

Route::post('/price', 'App\Http\Controllers\priceController@cal_price' );

