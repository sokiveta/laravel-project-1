<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// All listings
Route::get('/', [ListingController::class, 'index']);

// Store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);


// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New Users
Route::post('/users', [UserController::class, 'store']);
    
// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Authenticate Login Form
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


// // All listings
// Route::get('/', function () {
//     return view('listings', [
//         'heading' => 'Latest Listings:',
//         'listings' => Listing::all()
//     ]);
//     // return view('welcome');
// });

// // Single listing
// Route::get('/listings/{listing}', function (Listing $listing) {
//     return view('listing', [
//     'listing' => $listing
//     ]);
// });

// Route::get('/listings/{id}', function ($id) {
//     $listing = Listing::find($id);
//     if ($listing) {
//         return view('listing', [
//         'listing' => $listing
//         ]);
//     } else {
//         abort('404');
//     }
// });


// Route::get('/', function () {
//     return view('listings', [
//         'heading' => 'Latest Listings:',
//         'listings' => [
//             [
//                 'id'=> 1,
//                 'title'=> 'Listing One',
//                 'description' => 'Lorem ipsum'
//             ],
//             [
//                 'id'=> 2,
//                 'title'=> 'Listing Two',
//                 'description' => 'Lorem ipsum two'
//             ],
//         ]
//     ]);
// });


// Route::get('/hello', function () {
//     return view('hello');
// });

// Route::get('/greeting', function () {
//     return response('<h1>Greetings, my friend</h1>', 200)
//     ->header('Content-Type', 'text/plain')
//     ->header('foo', 'bar');
// });

// Route::get('/posts/{id}', function ($id) {
//     // dd($id);
//     // ddd($id);
//     return Response('Post: '.$id);
// })->where('id', '[0-9]+');

// Route::get('/search', function(Request $request) {
//     // dd($request->name .' '.$request->this);
//     return Response($request->name .' '.$request->this);
// });
