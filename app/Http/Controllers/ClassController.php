<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $class = Clas::orderBy('created_at', 'asc')->paginate(5);
        return view('class.index', compact('class'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|unique:class,name",
        ], [
            "name.required" => "Please enter name",
            "name.unique" => "Name already exists",
        ]);

        $data = $request->all();

        Clas::create($data);
        return redirect()->route('class.index')->with('success', 'Class added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Clas::findOrFail($id);
        return view('class.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $class = Clas::findOrFail($id);
        return view('class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            "name" => "required|unique:class,name," . $id,
        ], [
            "name.required" => "Please enter name",
            "name.unique" => "Name already exists",
        ]);

        $data = $request->all();
        $class = Clas::findOrFail($id);
        $class->update($data);
        return redirect()->route('class.index')->with('success', 'Class updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Clas::findOrFail($id);
        $class->delete();
        return redirect()->route('class.index')->with('success', 'Class deleted successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search'); // Lấy giá trị từ ô tìm kiếm

        // Thực hiện tìm kiếm theo tên (name)
        $class = Clas::where('name', 'like', '%' . $searchTerm . '%')->paginate(5);

        return view('class.index', compact('class'));
    }
}
