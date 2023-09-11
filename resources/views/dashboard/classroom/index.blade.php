@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Classrooms</h1>
    </div>
    <div class="row mb-3">
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
                <div class="card-body col-lg-6">
                    <div class="table-responsive">
                        @if (!empty($classrooms['data']))
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-secondary bg-gradient">
                                        <th scope="col">No</th>
                                        <th scope="col">Class Name</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- from untuk nomor urut sesuai api --}}
                                    <?php $i = $classrooms['from'] ?> 
                                    @foreach ($classrooms['data'] as $classroom)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $classroom['name'] }}</td>
                                            <td class="d-flex  gap-3">
                                                <button type="submit" class="btn btn-sm"
                                                    onclick="window.location='{{ 'classroom/' . $classroom['id'] }}'">
                                                    <i class="fa-solid fa-eye text-success"></i>
                                                </button>
                                                <buttton type="submit" class="btn btn-sm"
                                                    onclick="window.location='{{ url('classroom/' . $classroom['id'] . '/edit') }}'">
                                                    <i class="fa-solid fa-pen-to-square fs-4 text-warning"></i>
                                                </buttton>
                                                <form action="{{ url('classroom/' . $classroom['id']) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-sm"
                                                        onclick="return confirm('Are you sure ?')"><i
                                                            class="fa-solid fa-trash fs-4 text-danger"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @else
                                <p>Tidak ada data</p>
                        @endif
                        </table>
                        @if ($classrooms['links'])
                            <nav aria-label="Page navigation ">
                                <ul class="pagination">
                                    @foreach ($classrooms['links'] as $item)
                                        <li class="page-item {{ $item['active'] ? 'active' : '' }}"><a class="page-link" href="{{ $item['url2'] }}">{!! $item['label'] !!}</a></li>
                                    @endforeach
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
