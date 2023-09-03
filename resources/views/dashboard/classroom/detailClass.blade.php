@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ $classroom }}</h1>
    </div>
    <div class="row mb-3">
        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" onclick="window.location='{{ url('classroom') }}'">Back to classrooms</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if (count($students) > 0)
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Birthday</th>
                                    <th scope="col">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student['name'] }}</td>
                                        <td>{{ $student['birthday'] }}</td>
                                        <td>{{ $student['address'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            @else
                            <p class="text-center fs-4">Students Not Found</p>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection