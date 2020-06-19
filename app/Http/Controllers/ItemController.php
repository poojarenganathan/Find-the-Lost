<?php

namespace App\Http\Controllers;

use App\Item;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(){
       $items = Item::sortable()->paginate(8);
       return view('items.index', compact('items'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //$items = Item::find($id);
      return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // form validation for adding a found item
        $item = $this->validate(request(), [
          'category' => 'required',
          'found_time' => 'required|date',
          'found_user' => 'required|max:255',
          'found_place' => 'required|max:255',
          'colour' => 'required|max:255',
          'photo' => 'required',
          'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'description' => 'required|max:256'
        ]);

        // if validation is a success
        if ($request->hasFile('photo')){

            foreach($request->file('photo') as $photo){
              // gets the filename with the extension
              $name = $photo->getClientOriginalName();
              // uploads the image
              $photo->move(storage_path().'/app/public/images', $name);
              // stores image in an array
              $data[] = $name;
            }
        }

        // create an Item object and set its values from the input
        $item = new Item;
        $item->category = $request->input('category');
        $item->found_time = $request->input('found_time');
        $item->user_id = Auth::id();
        $item->found_user = $request->input('found_user');
        $item->found_place = $request->input('found_place');
        $item->colour = $request->input('colour');
        $item->photo = json_encode($data);
        $item->description = $request->input('description');

        // save the Item object
        $item->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'Item has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $item = Item::find($id);
      return view('items.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $item = Item::find($id);
      return view('items.edit',compact('item'));
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
      // form validation
      $item = Item::find($id);
      $this->validate(request(), [
        'category' => 'required',
        'found_time' => 'required|date',
        'found_user' => 'required|max:255',
        'found_place' => 'required|max:255',
        'colour' => 'required|max:255',
        'photo' => 'required',
        'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'description' => 'required'
      ]);

      // update request by and setting its values from the input
      $item->category = $request->input('category');
      $item->found_time = $request->input('found_time');
      $item->found_user = $request->input('found_user');
      $item->found_place = $request->input('found_place');
      $item->colour = $request->input('colour');
      $item->description = $request->input('description');

      // if validation is a success
      if ($request->hasFile('photo')){

          foreach($request->file('photo') as $photo){
            // gets the filename with the extension
            $name = $photo->getClientOriginalName();
            // uploads the image
            $photo->move(storage_path().'/app/public/images', $name);
            // stores image in an array
            $data[] = $name;
          }
      }

      $item->photo = json_encode($data);
      // save the Item object
      $item->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Item details have been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $item = Item::find($id);
      $item->delete();
      return redirect('items')->with('success','Item has been deleted');
    }
}
