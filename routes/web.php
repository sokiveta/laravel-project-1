<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

// All listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings:',
        'listings' => Listing::all()
    ]);
    // return view('welcome');
});

// Single listing
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
    'listing' => $listing
    ]);
});
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
