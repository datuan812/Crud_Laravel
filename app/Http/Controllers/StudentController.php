<?php

namespace App\Http\Controllers;

use App\Models\Khoahoc;
use App\Models\Lophoc;
use App\Models\Sinhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    protected $student;

    public function __construct(Sinhvien $student){
        $this->student = $student;
    }


    public function index()
    {

        $students = Sinhvien::with(['classes', 'courses'])->latest('id')->paginate(5);

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lophocs = Lophoc::all();
        $khoahocs = Khoahoc::all();
        return view('student.create', compact('lophocs', 'khoahocs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:sinhviens',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                'unique:sinhviens,phone'
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

        // Kiểm tra nếu validator không hợp lệ
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $student = Sinhvien::create($data);

        return redirect()->route('student.index')->with('success', 'Student added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Sinhvien::findOrFail($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Sinhvien::findOrFail($id);

        $lophocs = Lophoc::all();
        $khoahocs = Khoahoc::all();

        return view('student.edit', compact('student', 'lophocs', 'khoahocs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:sinhviens,email,'.$id.',id',
            'phone' => [
                'required',
                'regex:/^[0-9]{10}$/',
                'unique:sinhviens,phone,'.$id.',id'
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

        // Kiểm tra nếu validator không hợp lệ
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        $student = Sinhvien::findOrFail($id);

        $student->update($data);

        return redirect()->route('student.index')->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Sinhvien::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Student deleted successfully');
    }

    public function search(Request $request)
{
    $searchTerm = $request->input('search'); // Lấy giá trị từ ô tìm kiếm

    // Thực hiện tìm kiếm theo tên (name)
    $students = Sinhvien::where('name', 'like', '%' . $searchTerm . '%')->paginate(5);

    return view('student.index', compact('students'));
}
}
