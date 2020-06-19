<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests;
use App\Item;
use Gate;
use Auth;
use Mail;
use App\User;
use App\Notifications\StatusUpdated;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $requests = Requests::sortable()->paginate(8);
      return view('requests.index', compact('requests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // form validation
      $req = $this->validate(request(), [
        'item_id' => 'required|numeric|exists:items,id',
        'reason' => 'required'
      ]);

      // create a Request object and set its values from the input
      $req = new Requests;
      $req->item_id = $request->input('item_id');
      $req->user_id = Auth::id();
      $req->reason = $request->input('reason');

      // save the Request object
      $req->save();
      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Request has been submitted');
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
      $requests = Requests::find($id);
      return view('requests.edit',compact('requests'));
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
      $requests = Requests::find($id);
      $this->validate(request(), [
        'status' => 'required'
      ]);

      // Update request by and setting its values from the input
      $requests->status = $request->input('status');
      // save the Request object
      $requests->save();

      // generate a redirect HTTP response with a success message
      return back()->with('success', 'Request status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $requests = Requests::find($id);
      $requests->delete();
      return redirect('requests')->with('success','Request has been deleted');
    }
}
