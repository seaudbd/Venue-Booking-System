<?php

Route::get('link', function () {
    exec(symlink('/home3/hornsbyb/public_html/booking/engine/storage/app/public', '/home3/hornsbyb/public_html/booking/storage'));

});

Route::get('clear', function() {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
});

Route::get('/', 'HomeController@index');
Route::get('gallery', 'GalleryController@index');
Route::get('login', 'LoginController@index');
Route::post('login', 'LoginController@login');
Route::get('system/login', 'LoginController@loadAdminLogin');
Route::post('system/login', 'LoginController@authenticateAdminLogin');
Route::get('forgot/password', 'LoginController@forgotPassword');
Route::post('send/verification/code', 'VerificationController@sendVerificationCode');
Route::post('verify/verification/code', 'VerificationController@verifyVerificationCode');
Route::post('reset/password', 'LoginController@resetPassword');
Route::get('registration', 'RegistrationController@index');
Route::post('registration', 'RegistrationController@register');
Route::get('contact/{page}', 'ContactController@index');
Route::post('contact/save', 'ContactController@save');
Route::get('booking', 'BookingController@index');
Route::get('booking/{venue_id}', 'BookingController@getVenueById');
Route::get('booking/get/customer/venue/booking/{venue_id}', 'BookingController@getCustomerVenueBookingById');

///////////////////////////////Customer///////////////////////////////////////////
$customerRoutes = \App\Model\CustomerMenu::where('method', '!=', '')
    ->where('route', '!=', '')
    ->where('controller', '!=', '')
    ->where('action', '!=', '')
    ->get();

foreach ($customerRoutes as $customerRoute ){
    Route::group(['namespace' => $customerRoute->route_group], function () use ($customerRoute) {
        $customerMethods = explode(',', $customerRoute->method);
        $customerRouteUrls = explode(',', $customerRoute->route);
        $customerActions = explode(',', $customerRoute->action);
        foreach ($customerMethods as $customerKey => $customerMethod) {
            switch($customerMethod) {
                case 'get':
                    Route::get($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'post':
                    Route::post($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'put':
                    Route::put($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'patch':
                    Route::patch($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'delete':
                    Route::delete($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'options':
                    Route::options($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                default:
                    Route::any($customerRouteUrls[$customerKey], $customerRoute->controller . '@' . $customerActions[$customerKey])->middleware('redirect.to.dashboard.if.authenticated');
            }
        }
    });
}

Route::get('customer/booking', 'Customer\BookingController@index')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/booking/{venue_id}', 'Customer\BookingController@getVenueById')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('get/customer/venue/booking/{venue_id}', 'Customer\BookingController@getCustomerVenueBookingById')->middleware('redirect.to.dashboard.if.authenticated');
Route::post('customer/booking/validate', 'Customer\BookingController@makeValidation')->middleware('redirect.to.dashboard.if.authenticated');
Route::post('customer/booking/save', 'Customer\BookingController@save')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/payment/create', 'Customer\PaymentController@paymentCreate')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/payment/execute', 'Customer\PaymentController@paymentExecute')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/payment/cancel', 'Customer\PaymentController@paymentCancel')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/booking/confirmation/{customer_booking_id}', 'Customer\BookingConfirmationController@index')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/gallery', 'Customer\GalleryController@index')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/contact/{page}', 'Customer\ContactController@index')->middleware('redirect.to.dashboard.if.authenticated');
Route::post('customer/contact/save', 'Customer\ContactController@save')->middleware('redirect.to.dashboard.if.authenticated');
Route::post('customer/update/profile/information', 'Customer\ProfileController@updateProfileInformation')->middleware('redirect.to.dashboard.if.authenticated');
Route::post('customer/update/password', 'Customer\ProfileController@updatePassword')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('customer/logout', 'Customer\DashboardController@logout')->middleware('redirect.to.dashboard.if.authenticated');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////Admin///////////////////////////////////////////////////////////////////////////////////////////

$routes = \App\Model\Menu::where('method', '!=', '')
    ->where('route', '!=', '')
    ->where('controller', '!=', '')
    ->where('action', '!=', '')
    ->get();

foreach ($routes as $route ){
    Route::group(['namespace' => $route->route_group], function () use ($route) {
        $methods = explode(',', $route->method);
        $routeUrls = explode(',', $route->route);
        $actions = explode(',', $route->action);
        foreach ($methods as $key => $method) {
            switch($method) {
                case 'get':
                    Route::get($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'post':
                    Route::post($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'put':
                    Route::put($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'patch':
                    Route::patch($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'delete':
                    Route::delete($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                case 'options':
                    Route::options($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
                    break;
                default:
                    Route::any($routeUrls[$key], $route->controller . '@' . $actions[$key])->middleware('redirect.to.dashboard.if.authenticated');
            }
        }
    });
}

Route::get('admin/logout', 'Admin\DashboardController@logout')->middleware('redirect.to.dashboard.if.authenticated');
Route::post('admin/change/password', 'Admin\DashboardController@changePassword')->middleware('redirect.to.dashboard.if.authenticated');
Route::get('admin/get/venue/bookings/and/reservations', 'Admin\DashboardController@getVenueBookingsAndReservations')->middleware('redirect.to.dashboard.if.authenticated');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////