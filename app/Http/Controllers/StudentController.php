<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function studentForm() {
        return view('pages.add-student');
    }

    public function studentCreate(Request $request) {

        $student = [
            "name" => $request->student_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "data_of_birth" => $request->dob,
            "semester" => $request->semester,
            "status" => $request->status,
          ];

        Student::create($student);
        return redirect()->route('student.list');
    }

    public function allStudent() {
        $student = Student::get();

        return view('pages.all-student', ['data' => $student]);
    }

    public function studentEdit($id) {

        $student = Student::where(['id'=>$id])->first();

        return view('pages.edit-student', ['data' => $student]);
    }

    public function studentUpdate(Request $request){

        $student = [
            "name" => $request->student_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "data_of_birth" => $request->dob,
            "semester" => $request->semester,
            "status" => $request->status,
          ];

        Student::where(['id'=>$request->id])->update($student);
        return redirect()->route('student.list');
    }

    public function studentDelete($id){

        Student::where(['id'=>$id])->delete();
        return redirect()->back();
    }
}
