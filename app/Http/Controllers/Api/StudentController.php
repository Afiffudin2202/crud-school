<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('classroom:id,name')->paginate(10);
        return response()->json([
            'status' => 'ok',
            'message' => 'data found',
            'data' =>$students
        ],200);
       
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'classroom_id' => 'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data is invalid',
                'errors' => $validate->errors()
            ], 200);
        }

        $student = Student::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Success Create new student',
            'student' => $student
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = Student::with('classroom:id,name')->find($id);

        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'not found'
            ], 404);
        }

       
        return response()->json([
            'status' => 'ok',
            'message' => 'found',
            'data' => $student
        ], 200,);
        // return new DetailStudentResource($student->loadMissing('classroom:id,name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'not found',
            ], 404);
        }

        $rules = [
            'name' => 'required',
            'birthday' => 'required|date',
            'address' => 'required',
            'classroom_id' => 'required|numeric'
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data is invalid',
                'errors' => $validate->errors()
            ], 200);
        }

        $student->update($request->all());


        return response()->json([
            'status' => 'ok',
            'message' => 'Success update student',
            'student' => $student
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        $student->delete();
        return response()->json([
            'status' => 'ok',
            'message' => 'Success delete student'
        ], 200);
    }
}
