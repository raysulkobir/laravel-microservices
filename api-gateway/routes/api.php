<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Helpers\AuthHelper;
use App\Enums\ServiceUrl;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//! start user section
//TODO register user
Route::post('/register', function (Request $request) {
    //TODO Forward the login request to the auth-service
    $response = Http::post(ServiceUrl::AUTH_SERVICE->getUrl(). "/register", $request->all());
    //TODO Return the response from the auth-service back to the client
    return $response->json();
});

//TODO login user
Route::post('/auth/login', function (Request $request) {
    //TODO Forward the login request to the auth-service
    $response = Http::post(ServiceUrl::AUTH_SERVICE->getUrl()."/login", $request->all());

    //TODO Return the response from the auth-service back to the client
    return $response->json();
});

Route::get('/user/profile', function (Request $request) {
    //TODO Get the authorization header
    $result = AuthHelper::validateToken($request);
    if ($result['valid']) {
        return $response = Http::get(ServiceUrl::AUTH_SERVICE->getUrl() . '/user');
    }
});
//! end user section

//! start brand section
//TODO Get all brands
Route::get('/brands', function () {
    $response = Http::get(ServiceUrl::BRAND_SERVICE->getUrl() . "/brands");
    return $response->json();
});

//TODO Create a new brand
Route::post('/brands', function (Request $request) {
    $response = Http::post(ServiceUrl::BRAND_SERVICE->getUrl() . "/brands", $request->all());
    return $response->json();
});

//TODO Get brand by ID
Route::get('/brands/{id}', function ($id) {
    $response = Http::get(ServiceUrl::BRAND_SERVICE->getUrl() . "/brands/{$id}");
    return $response->json();
});

//TODO Update a brand by ID
Route::put('/brands/{id}', function (Request $request, $id) {
    $response = Http::put(ServiceUrl::BRAND_SERVICE->getUrl() . "/brands/{$id}", $request->all());
    return $response->json();
});
//TODO Delete a brand by ID
Route::delete('/brands/{id}', function ($id) {
    $response = Http::delete(ServiceUrl::BRAND_SERVICE->getUrl() . "/brands/{$id}");
    return $response->json();
});
//! end brand section


