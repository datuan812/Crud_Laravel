@extends('layouts.app')

@section('body')
    <h1 class="mb-0">Detail Student</h1>
    <hr>
    <div class="row">
        <div class="col">
            <label for="">Name:</label>
            <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Name" readonly>
        </div>
        <div class="col">
            <label for="">Email:</label>
            <input type="email" name="email" value="{{ $student->email }}" class="form-control" placeholder="Email" readonly>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <label for="">Phone:</label>
            <input type="text" name="phone" value="{{ $student->phone }}" class="form-control" placeholder="Phone" readonly>
        </div>
        <div class="col">
            <label for="">Address:</label>
            <input type="text" name="address" value="{{ $student->address }}" class="form-control" placeholder="Address" readonly>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <label for="">Class:</label>
            <input type="text" name="class_id" value="{{ $student->classes->name }}" class="form-control" placeholder="Class" readonly>
        </div>
        <div class="col">
            <label for="">Course:</label>
            <input type="text" name="course_id" value="{{ $student->courses->name }}" class="form-control" placeholder="Course" readonly>
        </div>
    </div>
@endsection
