<?php

namespace App\Http\Controllers;

use App\Models\Student;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/students";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data']['data'];

        return view('dashboard.students.index', [
            'students' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/classrooms";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        $classrooms = $contentArray['classroom']['data'];
        return view('dashboard.students.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $birthday = $request->birthday;
        $address = $request->address;
        $classroom = $request->classroom_id;

        $parameter = [
            'name' => $name,
            'birthday' => $birthday,
            'address' => $address,
            'classroom_id' => $classroom
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/students";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] !== 'ok') {
            $errors = $contentArray['errors'];
           return redirect()->to('student/create')->withErrors($errors)->withInput();
        } else {
            return redirect()->to('student')->with('success', 'Seccessfully create new students');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // memanggil api classroom
        $client = new Client();
        $urlClassroom = "http://127.0.0.1:8000/api/classrooms";
        $responseClassroom = $client->request('get', $urlClassroom);
        $contentClassroom = $responseClassroom->getBody()->getContents();
        $contentArrayClassroom = json_decode($contentClassroom,true);
        $classrooms = $contentArrayClassroom['classroom']['data'];

        // memanggil api students
        $urlStudents = "http://127.0.0.1:8000/api/students/$id";
        $responseStudents = $client->request('get', $urlStudents);
        $contentStudents = $responseStudents->getBody()->getContents();
        $contentArrayStudents = json_decode($contentStudents, true);
        $students = $contentArrayStudents['data'];

        return view('dashboard.students.edit', [
            'classrooms' => $classrooms,
            'students' => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $name = $request->name;
        $birthday = $request->birthday;
        $address = $request->address;
        $classroom = $request->classroom_id;

        $parameter = [
            'name' => $name,
            'birthday' => $birthday,
            'address' => $address,
            'classroom_id' => $classroom
        ];

        $client = new Client();
        $url = "http://127.0.0.1:8000/api/students/$id";
        $response = $client->request('put',$url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] !== 'ok') {
            $errors = $contentArray['errors'];
            return redirect('student/'.$id.'/edit')->withErrors($errors)->withInput();
        }else {
            return redirect('student')->with('success', 'Successfully update student');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/students/$id";
        $response = $client->request('delete', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content,true);

        if ($contentArray['status'] !== 'ok') {
            $errors = $contentArray['error'];
            return redirect('student')->withErrors($errors)->withInput();
        }else {
            return redirect('student')->with('success', 'Berhasil hapus data');
        }
    }
}
