<?php

namespace App\Http\Controllers;

use App\Models\Khoahoc;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Khoahoc::orderBy('created_at', 'asc')->paginate(5);
        return view('course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|unique:khoahocs,name",
        ], [
            "name.required" => "Please enter name",
            "name.unique" => "Name already exists",
        ]);

        $data = $request->all();

        Khoahoc::create($data);
        return redirect()->route('course.index')->with('success', 'Course added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Khoahoc::findOrFail($id);
        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Khoahoc::findOrFail($id);
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => "required|unique:khoahocs,name,".$id,
        ], [
            "name.required" => "Please enter name",
            "name.unique" => "Name already exists",
        ]);

        $data = $request->all();
        $course = Khoahoc::findOrFail($id);
        $course->update($data);
        return redirect()->route('course.index')->with('success', 'Course updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Khoahoc::findOrFail($id);
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted successfully');
    }
    public function search(Request $request)
    {
    $searchTerm = $request->input('search'); // Lấy giá trị từ ô tìm kiếm

    // Thực hiện tìm kiếm theo tên (name)
    $course = Khoahoc::where('name', 'like', '%' . $searchTerm . '%')->paginate(5);

    return view('course.index', compact('course'));
    }
}
