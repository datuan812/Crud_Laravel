@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Add Course</h1>
    <hr>
    <form action="{{route('course.store')}}" method="POST">
       @csrf
        <div class="row">
        <div class=" col-4">
            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Name" >
            @error('name')
            <span class="text-danger"> {{$message}}</span>
            @enderror
        </div>

        <div class="col-4">
            <button class="btn btn-primary">Submit</button>
        </div>
       </div>
    </form>


@endsection
