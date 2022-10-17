<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// function callBackForBlizzData($res) {
//     // echo ("<div>body received</div>");
//     // echo $res->get;
//     // echo $res;
//     $data = $res;

//     // return view('main', $res);
// }

// $test = 'bobi';
// $asd = Http::async()->get('https://eu.api.blizzard.com/profile/wow/character/tarren-mill/frizera/appearance?namespace=profile-eu&locale=en_US&access_token=EUpJtl8mP0IUiaMb2iYsIehDvXZxlgrWYr')
//                 ->then(function ($response) {
//                     callBackForBlizzData($response->body());
//                 }); 
// $asd->wait();


// $returnedJson = $promise->wait();
// echo $returnedJson;
// echo ("<div>asda</div>");


// class bobi extends controller {

//     public getBlzzacouint() {

//     }

// }