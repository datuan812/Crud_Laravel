@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Detail Course</h1>
    <hr>
    <div class="row">
        <div class=" col-4">
            <label for="">Name:</label>
            <input type="text" name="name" value="{{$course->name}}" class="form-control" placeholder="Name" readonly >
        </div>
    </div>

@endsection
