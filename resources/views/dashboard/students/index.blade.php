@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Student</h1>
    </div>
    <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{  session('success')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" type="button"
                        onclick="window.location='{{ url('student/create') }}'">Create new data</button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Birthday</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Classroom</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student['name'] }}</td>
                                        <td>{{ $student['birthday'] }}</td>
                                        <td>{{ $student['address'] }}</td>
                                        <td>{{ $student['classroom']['name'] }}</td>
                                        <td class="d-flex justify-content-center gap-3">
                                            <buttton type="submit" class="btn btn-sm" onclick="window.location='{{ url('student/'.$student['id'].'/edit') }}'"><i
                                                    class="fa-solid fa-pen-to-square fs-4 text-warning"></i></buttton>
                                            <form action="{{ url('student/'.$student['id']) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm" onclick="return confirm('Are you sure ?')"><i
                                                        class="fa-solid fa-trash fs-4 text-danger"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
