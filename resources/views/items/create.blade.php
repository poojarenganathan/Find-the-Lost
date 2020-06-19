<!-- inherit master template app.blade.php -->
@extends('layouts.app')
<!-- define the content section -->
@section('content')
<html lang="en">
<head>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 "> <div class="card">
        <div class="card-header">Add a missing item</div>
        <!-- display the errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                      <strong>Whoops!</strong> There were some problems with your input.<br><br>
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  <br/>
                @endif
        <!-- display the success status -->
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                      <p>{{ \Session::get('success') }}</p>
                    </div><br />
                @endif
        <!-- define the form -->
                  <div class="card-body">
                    <form class="form-horizontal" method="POST"
                      action="{{ url('items') }}" enctype="multipart/form-data">
                          @csrf
                      <div class="col-md-8">
                        <label >User id: </label>
                        <?php echo($id = Auth::id())?>
                      </div>
                      <div class="col-md-8">
                      <label >Item category</label>
                      <br/>
                        <input type="radio" id="pet" name="category" value="pet">
                        <label for="pet">Pet</label><br>
                        <input type="radio" id="phone" name="category" value="phone">
                        <label for="phone">Phone</label><br>
                        <input type="radio" id="jewellery" name="category" value="jewellery">
                        <label for="jewellery">Jewellery</label><br>
                      </div>
                      <br/>
                      <div class="col-md-8">
                        <label >Found time</label>
                        <input type="date" name="found_time" class="form-control" placeholder="YY-MM-DD"/>
                      </div>
                      <br/>
                      <br/>
                      <div class="col-md-8">
                        <label >Found user</label>
                        <input type="text" name="found_user" class="form-control" />
                      </div>
                      <br/>
                      <div class="col-md-8">
                        <label >Found place</label><br/>
                        <textarea id="found_place" rows="2" cols="50" name="found_place" class="form-control" method="post"></textarea>
                      </div>
                      <br/>
                      <div class="col-md-8">
                        <label >Colour</label>
                        <input type="text" name="colour" class="form-control"/>
                      </div>
                      <br/>
                      <br/>
                      <div class="col-md-8">
                        <label >Item description</label><br/>
                        <textarea id="description" rows="2" cols="50" name="description" class="form-control" method="post"></textarea>
                      </div>
                      <div class="col-md-8" >
                          <label>Photo</label><br/>
                            <div class="input-group control-group increment" style="margin-top:10px">
                              <input type="file" name="photo[]" id="photo" class="form-control" />
                                <div class="input-group-btn">
                                  <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div>
			    </div><br/>
                      </div>
                      <div class="clone hide">
                            <div class="control-group input-group" style="margin-top:10px">
                              <input type="file" name="photo[]" id="photo" class="form-control" />
                                <div class="input-group-btn">
                                  <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Remove</button>
                                </div>
                            </div>
                      </div>
                      <br/>
                      <div class="col-md-8">
                          <button type="submit" class="btn btn-info"> <i class="glyphicon glyphicon-check"></i> Submit </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
<script type="text/javascript">
  $(document).ready(function() {
	  $(".btn-success").click(function(){
        var html = $(".clone").html();
        $(".increment").after(html);
      });
	  $("body").on("click",".btn-danger",function(){
        $(this).parents(".control-group").remove();
      });
  });
</script>
</body>
</html>
@endsection
