<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Contact/Index', [
            'contacts' => Contact::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => ['required','unique:contacts','digits:10'],
        ])->validate();
        Contact::create($request->all());
        $request->session()->flash('success', 'Task was successful!');
        return redirect()->back()->with('success', 'Contact Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        Validator::make($request->all(), [
            'name' => ['required'],
            'phone' => [
                'required',
                Rule::unique('contacts')->ignore($contact->id),
                'digits:10'
            ],
        ])->validate();
        
        $contact->fill($request->all())->save();


        $request->session()->flash('success', 'Contact updated successfully!');
        return redirect()->back()->with('success', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Contact::find($id)->delete();

        $request->session()->flash('success', 'Contact deleted successfully!');

        return redirect()->route('contacts.index');
    }
}
