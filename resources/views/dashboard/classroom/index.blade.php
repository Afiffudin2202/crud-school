@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Classrooms</h1>
    </div>
    <div class="row">
        <div class="col-lg-10 col-sm-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-sm btn-primary" onclick="window.location='{{ url('classroom/create') }}'">Create
                        new data</button>
                </div>
                <div class="card-body">
                    <div class="row gap-2 justify-content-center">
                        @foreach ($classrooms as $classroom)
                            <div class="col-lg-3">
                                <a class="btn" >
                                    <div class="card p-3 text-center rounded-0 bg-primary text-center" >
                                        {{ $classroom['name'] }}
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
