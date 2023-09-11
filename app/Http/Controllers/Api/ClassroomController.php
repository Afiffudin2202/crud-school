<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroom = Classroom::with('students')->paginate(5);
        return response()->json([
            'status' => 'ok',
            'message' => 'found',
            'classroom' => $classroom
        ], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:classrooms,name'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'the given data is invalid',
                'errors' => $validator->errors()
            ], 200);
        }

        $classroom = Classroom::create($request->all());

        return response()->json([
            'status' => 'ok',
            'messsage' => 'Success create class',
            'classroom' => $classroom
        ], 200,);
    }

    public function show($id)
    {
        $classroom = Classroom::with('students')->find($id);
        if (!$classroom) {
            return response()->json([
                'status' => 'error',
                'message' => 'notfound'
            ], 404);
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'found',
            'classroom' => $classroom
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return response()->json([
                'status' => 'error',
                'message' => 'not found'
            ], 404);
        }

        $rules = [
            'name' => 'required'
        ];

        if ($request->has('name') && $request->name !== $classroom->name) {
            $rules['name'] .= '|unique:classrooms,name';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'errors',
                'message' => 'the given data is invalid',
                'errors' => $validator->errors()
            ], 200);
        }
        $classroom->update($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'succes update class',
            'classroom' => $classroom
        ], 200);
    }


    public function destroy($id)
    {
        $classroom = Classroom::find($id);

        $classroom->delete();

        return response()->json([
            'status' => 'ok',
            'message' => 'data deleted',
            'classroom' => $classroom
        ], 200);
    }
}
