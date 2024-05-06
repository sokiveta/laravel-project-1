<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    // Show all listings
    public function index() {

        // return view('listings.index', [
        //     'listings' => Listing::latest()->filter(request(['tag','search']))->get()
        // ]);

        // return view('listings.index', [
        //     'listings' => Listing::latest()->filter(request(['tag','search']))->simplePaginate(2)
        // ]);

        return view('listings.index', [
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);

        // Request $request
        // dd($request());
        // dd(request());
        // dd(request('tag'));

        // return view('listings.index', [
        //     'heading' => 'Latest Listings:',
        //     'listings' => Listing::all()
        // ]);

    }

    // Show single listing
    public function show(Listing $listing) {
        return view('listings.show', [
        'listing' => $listing
        ]);
    }

    // Show Create Form
    public function create() {
        return view('listings.create');
    }

    // Store Listing Data
    public function store(Request $request) {
        // dd($request->all());
        // dd($request->file('logo'));
       $formFields = $request->validate([
        'title'   =>'required',
        'company' =>['required', Rule::unique('listings','company')],
        'location'=>'required',
        'website' =>'required',
        'email'   =>['required','email'],
        'tags' =>'required',
        'description' =>'required'
       ]);

       if($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       // add user id to new listings
       $formFields['user_id'] = auth()->id();

       Listing::create($formFields);

       return redirect('/')->with('message', 'Listing created successfully!');
    }

    // Show Edit Form
    public function edit (Listing $listing) {
        // dd($listing);
        return view('listings.edit', ['listing' => $listing]);
    }
    
    // Update Listing Data
    public function update(Request $request, Listing $listing) {

        // owner only
        if ($listing->user_id != auth()->id()) {
            abort(403, 'Unauthorized');
        }

       $formFields = $request->validate([
        'title'   =>'required',
        'company' =>['required'],
        'location'=>'required',
        'website' =>'required',
        'email'   =>['required','email'],
        'tags' =>'required',
        'description' =>'required'
       ]);

       if($request->hasFile('logo')) {
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
       }

       $listing->update($formFields);

       return back()->with('message', 'Listing created successfully!');
    }

    // Delete Listing
    public function destroy (Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully');
    }

    // Manage Listings
    public function manage() {
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
    }

}
