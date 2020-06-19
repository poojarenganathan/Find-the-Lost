<!-- inherit master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 "> <div class="card">
      <div class="card-header">Create a new request</div>
      <!-- display the errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
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
          <form class="form-horizontal" method="POST" action="{{ url('requests') }}" enctype="multipart/form-data">
                    @csrf
                <div class="col-md-8">
                  <label >User id:</label>
                  <?php echo($id = Auth::id())?>
                </div>
                <br/>
                <div class="col-md-8">
                  <label >Item id:</label>
                  <input type="number" id="item_id" name="item_id" min="1" class="form-control" />
                </div>
                <br/>
                <div class="col-md-8">
                  <label >Reason for request:</label><br/>
                  <textarea id="reason" rows="4" cols="50" name="reason" class="form-control" method="post"></textarea>
                </div>
                <br/>
                <div class="col-md-6 col-md-offset-4">
                  <input type="submit" class="btn btn-primary" />
                </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
