<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/classrooms";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['classroom']['data'];

        return view('dashboard.classroom.index', [
            'classrooms' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $parameter = [
            'name' => $request->name
        ];
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/classrooms";
        $response = $client->request('POST', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] !== 'ok') {
            $errors = $contentArray['errors'];
            return redirect('classroom/create')->withErrors($errors)->withInput();
        } else {
            return redirect('classroom')->with('success', 'successfully create new class');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/classrooms/$id";
        $response = $client->request('GET', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $classroom = $contentArray['classroom']['name'];
        $students = $contentArray['classroom']['students'];

        return view('dashboard.classroom.detailClass', [
            'classroom' => $classroom,
            'students' => $students
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/classrooms/$id";
        $response = $client->request('GET', $url);
        $client = $response->getBody()->getContents();
        $contentArray = json_decode($client, true);
        $classroom = $contentArray['classroom'];

        return view('dashboard.classroom.edit', [
            'classroom' => $classroom
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $parameter = [
            'name' => $request->name
        ];

        $client = new Client();
        $url  = "http://127.0.0.1:8000/api/classrooms/$id";
        $response = $client->request('Put', $url, [
            'headers' => ['Content-type' => 'application/json'],
            'body' => json_encode($parameter)
        ]);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        if ($contentArray['status'] !== 'ok') {
            $errors = $contentArray['errors'];
            return redirect('classroom/'.$id.'/edit')->withErrors($errors)->withInput();
        }

        return redirect('classroom')->with('success', 'Successfully update class');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/classrooms/$id";
        $response = $client->request('delete', $url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);

        return redirect('classroom')->with('success', 'succesfully delete class');
    }
}
