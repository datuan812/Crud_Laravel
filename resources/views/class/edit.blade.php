@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Update Class</h1>
    <hr>
    <form action="{{route('class.update', $class->id)}}" method="POST">
       @csrf
       @method('PUT')
        <div class="row">
        <div class=" col-4">
            <input type="text" name="name" value="{{$class->name}}" class="form-control" placeholder="Name" >
            @error('name')
            <span class="text-danger"> {{$message}}</span>
            @enderror
        </div>
        <div class="col-4">
            <button class="btn btn-warning">Update</button>
        </div>
       </div>
    </form>


@endsection
