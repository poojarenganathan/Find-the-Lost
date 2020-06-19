@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Update request status</div>
        <!-- display the errors -->
              @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div><br />
              @endif
        <!-- display the success status -->
              @if (\Session::has('success'))
              <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
              </div><br />
              @endif
        <!-- define the form -->
              <div class="card-body">
                <form class="form-horizontal" method="POST" action="{{ action('RequestController@update', $requests['id']) }}" enctype="multipart/form-data" >
                    @method('PATCH')
                    @csrf
                  <div class="col-md-8">
                    <label >Request status:</label><br/>
                    <br/>
                    <input type="radio" id="approve" name="status" value="approve">
                    <label for="approve">Approve</label><br>
                    <br/>
                    <input type="radio" id="refuse" name="status" value="refuse">
                    <label for="refuse">Refuse</label><br>
                  </div>
                  <div class="col-md-6 col-md-offset-4">
                  <br/>
                    <input type="submit" class="btn btn-primary" />
                  </div>
                </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
