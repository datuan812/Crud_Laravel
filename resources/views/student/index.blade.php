@extends('layouts.app')

@section('body')
    <div class="hstack gap-3">
        <div class="p-2">
            <h1 class="mb-0">Student</h1>
        </div>
        <div class="vr"></div>
        <div class="p-2 ">
        <a href="{{route('student.create')}}" class="btn btn-primary">Add</a>
        </div>
        <div class="p-2 ms-auto">
            <form action="{{ route('student.search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Search by name" value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
        </div>

    </div>

    <hr>
    @if(Session::has('success'))
    <div class="alert alert-primary" role="alert">
       {{ Session::get('success') }}
    </div>
    @endif
    <table class="table table-hover">
        <thead>
          <tr class="table-danger">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Class</th>
            <th scope="col">Course</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @if($students->count() > 0)
            @foreach($students as $st)
          <tr class="table-info">
            <th scope="row">{{ $loop->iteration}}</th>
            <td>{{ $st->name}}</td>
            <td>{{ $st->email}}</td>
            <td>{{ $st->phone}}</td>
            <td>{{ $st->address}}</td>
            <td>{{ $st->classes->name }}</td>
            <td>{{ $st->courses->name }}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('student.show', $st->id)}}" class="btn btn-secondary">Detail</a>
                <a href="{{route('student.edit', $st->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{route('student.destroy', $st->id)}}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Are you sure ?')">
                    @csrf
                    @method('DELETE')
                <button class="btn btn-danger">Delete</button>
                </form>
                </div>
            </td>
          </tr>
          @endforeach
          @else
          <tr>
            <td class="text-center" colspan="8">Student not found</td>
          </tr>
          @endif
        </tbody>
      </table>
      <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                {{$students->links()}}
            </ul>
          </nav>

      </div>
@endsection
