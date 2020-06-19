@extends('layouts.app')
@section('content')
<div class="container">
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
  <div class="row justify-content-center">
    <div class="col-md-8 ">
      <div class="card">
        <div class="card-header">All lost items</div>
        <div class="card-body">
        <table class="table table-hover">
            <thead>
              <tr>
                <th>@sortablelink('id','ID')</th>
                <th>@sortablelink('category','Category')</th>
                <th>@sortablelink('found_time','Found time')</th>
                <th>@sortablelink('colour','Colour')</th>
              </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
            <tr>
              <td>{{$item['id']}}</td>
              <td>{{$item['category']}}</td>
              <td>{{$item['found_time']}}</td>
              <td>{{$item['colour']}}</td>
              @if (Auth::check() && Auth::user()->id)
                  <td><a href="{{action('ItemController@show', $item['id'])}}" class="btn btn- primary">More details</a></td>
              @endif
              @if (Auth::check() && Auth::user()->role == 1)
                  <td><a href="{{action('ItemController@edit', $item['id'])}}" class="btn btn- primary">Edit details</a></td>
              @endif
              @if (Auth::check() && Auth::user()->role == 1)
              <td>
                <form action="{{action('ItemController@destroy', $item['id'])}}"
                  method="post"> @csrf
                  <input name="_method" type="hidden" value="DELETE"> <button class="btn btn"
                    onclick="return confirm('Are you sure you want to delete this item?')"type="submit">Delete</button>
                </form>
              </td>
              @endif
            </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    {!! $items->appends(\Request::except('page'))->render() !!}
  </div>
</div>
@endsection
