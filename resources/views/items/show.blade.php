@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">Display all items</div>
        <div class="card-body">
          <table class="table table-hover" border="1" >
            <tr> <th>Item id </th> <td>{{$item->id}}</td></tr>
            <tr> <th>Item category </th> <td>{{$item->category}}</td></tr>
            <tr> <th>Found time </th> <td>{{$item->found_time}}</td></tr>
            <tr> <th>Found user </th> <td>{{$item->found_user}}</td></tr>
            <tr> <th>Found place </th> <td>{{$item->found_place}}</td></tr>
            <tr> <th>Colour </th> <td>{{$item->colour}}</td></tr>
            <tr>
              @foreach(json_decode($item->photo) as $picture)
                <th>Photo </th>
                <td><img src="{{ asset('storage/images/'.$picture) }}" style="width:100%;height:100%"/> </td>
            </tr>
              @endforeach
            <tr> <th>Description </th> <td style="max-width:150px;" >{{$item->description}}</td></tr>
          </table>
          <table><tr>
            <td><a href="{{ route('items.index') }}" class="btn btn-primary" role="button">Back to the list</a></td>
          </tr></table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
