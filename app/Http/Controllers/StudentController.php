<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Majors;
use RealRashid\SweetAlert\Facades\Alert;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select * from users
        //
        // $users = User::orderBy('id', 'desc')->get;
        // $users = User::latest()->get();
        $students = Student::with('major')->orderByDesc('id')->get();
        // return $students;
        // dd($students);
        $title = 'Student Management';
        return view('student.index', compact('students', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $title = "Create New Role";
        $majors = Majors::get();
        return view('student.create', compact('title', 'majors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'major_id' => 'required',
            'name' => 'required',
            'phone' => 'required'
        ]);


        //
        Student::create($request->all());
        // Alert::success('Success!!', 'Created Role success');
        toast('Your Role Has Been Created!', 'success');

        return redirect()->to('student');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $title = 'Edit Student';
        $majors = Majors::get();
        $edit = Student::find($id); //kalo gabisa blank
        // $edit = User::findOrFail($id); //kalo gabisa 404
        return view('student.edit', compact('title', 'edit', 'majors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'major_id' => $request->major_id,
            'name' => $request->name,
            'phone' => $request->phone,
        ];
        //jika user memasukan password


        Student::find($id)->update($data);
        return redirect()->to('student');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Student::find($id)->delete();
        return redirect()->to('student');
    }
}
