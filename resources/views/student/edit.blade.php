@extends('layouts.app')

@section('body')
<div class="container">
    <h1 class="mb-0">Edit Student</h1>
    <hr>
    <form action="{{ route('student.update', $student->id) }}" method="POST">
       @csrf
       @method('PUT')
        <div class="row">
            <div class="col">
                <label for="">Name:</label>
                <input type="text" name="name" value="{{$student->name}}" class="form-control" placeholder="Name">
                @error('name')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>


            <div class="col">
                <label for="">Email:</label>
                <input type="text" name="email" value="{{$student->email}}" class="form-control" placeholder="Email">
                @error('email')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="">Phone:</label>
                <input type="text" name="phone" value="{{$student->phone}}" class="form-control" placeholder="Phone">
                @error('phone')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>


            <div class="col">
                <label for="">Address:</label>
                <input type="text" name="address" value="{{$student->address}}" class="form-control" placeholder="Address">
                @error('address')
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div>

        </div>

        <div class="row mt-3">
            <div class="col">
                <label for="">Select Class:</label>
                <select class="form-select" name="lophoc_id" aria-label="Select Class">
                    @foreach($lophocs as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="">Select Course:</label>
                <select class="form-select" name="khoahoc_id" aria-label="Select Course">
                    @foreach($khoahocs as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row my-3">
            <div class="">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
