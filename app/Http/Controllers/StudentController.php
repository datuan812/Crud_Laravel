<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    protected $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }


    public function index()
    {

        $students = Student::with(['classes', 'courses'])->latest('id')->paginate(5);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $class = Clas::all();
        $courses = Course::all();
        return view('student.create', compact('class', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                'unique:students,phone'
            ],
            'address' => 'required',
        ], [
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already exists',
            'phone.required' => 'Please enter phone number',
            'phone.unique' => 'Phone number already exists',
            'phone.regex' => 'Invalid phone number',
            'address.required' => 'Please enter address',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $student = Student::create($data);

        return redirect()->route('student.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::findOrFail($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);

        $class = Clas::all();
        $courses = Course::all();

        return view('student.edit', compact('student', 'class', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id . ',id',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                'unique:students,phone,' . $id . ',id'
            ],
            'address' => 'required',
        ], [
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'email.email' => 'Invalid email',
            'email.unique' => 'Email already exists',
            'phone.required' => 'Please enter phone number',
            'phone.unique' => 'Phone number already exists',
            'phone.regex' => 'Invalid phone number',
            'address.required' => 'Please enter address',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $student = Student::findOrFail($id);

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search'); // Lấy giá trị từ ô tìm kiếm

        // Thực hiện tìm kiếm theo tên (name)
        $students = Student::where('name', 'like', '%' . $searchTerm . '%')->paginate(5);

        return view('student.index', compact('students'));
    }
}
