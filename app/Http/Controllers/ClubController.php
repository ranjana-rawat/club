<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{

        /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         $data = Club::latest()->paginate(2);
         return view('club', compact('data'))
                 ->with('i', (request()->input('page', 1) - 1) * 2);
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('create');
     }
 
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
         $request->validate([
             'name'    =>  'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
 
         $image = $request->file('image');
 
         $new_name = rand() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('images'), $new_name);
         $form_data = array(
             'name'       =>   $request->name,
             'image'        =>   $new_name,
         );

         Club::create($form_data);
 
         return redirect('club')->with('success', 'Data Added successfully.');
     }
 
     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         $data = Club::findOrFail($id);
         return view('view', compact('data'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $data = Club::findOrFail($id);
         return view('edit', compact('data'));
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
         
        $request->validate([
            'name'    =>  'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'name'       =>   $request->name,
            'image'        =>   $new_name,
        );
 
         Club::whereId($id)->update($form_data);
         return redirect('club')->with('success', 'Data is successfully updated');
 
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $data = Club::findOrFail($id);
         $data->delete();
         return redirect('club')->with('success', 'Data is successfully deleted');
     }
 
}
