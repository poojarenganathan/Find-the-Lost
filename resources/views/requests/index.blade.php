@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 ">
        <div class="card">
          <div class="card-header">All requests</div>
            <div class="card-body">
              <table class="table table-hover">
              <thead>
                <tr>
                  <th>
                    @sortablelink('id','Request id')
                  </th>
                  <th>@sortablelink('item_id','Item id')</th>
                  <th>@sortablelink('user_id','User id')</th>
                  <th>Reason</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              @foreach($requests as $request)
              <tr>
                  <td>{{$request['id']}}</td>
                  <td>{{$request['item_id']}}</td>
                  <td>{{$request['user_id']}}</td>
                  <td>{{$request['reason']}}</td>
                  <td><a href="{{action('RequestController@edit', $request['id'])}}" class="btn btn- primary">Approve/Refuse</a></td>
                  <td>
                    <form action="{{action('RequestController@destroy', $request['id'])}}"
                      method="post"> @csrf
                    <input name="_method" type="hidden" value="DELETE"> <button class="btn btn"
                      onclick="return confirm('Are you sure you want to delete this request?')"type="submit"> Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
