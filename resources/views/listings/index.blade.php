<?php
// namespace App\Http\Controllers;
// use Illuminate\Http\Request;
// use App\Models\User;

// class UserController extends Controller {
//    public function index() {
//       $images = \File::allFiles(public_path('images'));
//       return View('test')->with(array('images'=>$images));
//    }
// }
?>

{{-- @extends('layout')
@section('content') --}}
@include('partials._hero')
@include('partials._search')

@unless(count($listings) == 0)
<x-layout>
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @foreach($listings as $listing)
        <x-listing-card :listing="$listing" />
    @endforeach
    @else
    <p>No listings found</p>
    @endunless

</div>
<div class="mt-6 p-4">{{$listings->links()}}</div>
</x-layout>
{{-- @endsection --}}