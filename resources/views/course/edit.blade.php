@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Update Course</h1>
    <hr>
    <form action="{{route('course.update', $course->id)}}" method="POST">
       @csrf
       @method('PUT')
        <div class="row">
        <div class=" col-4">
            <input type="text" name="name" value="{{$course->name}}" class="form-control" placeholder="Name" >
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
