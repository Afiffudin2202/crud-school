@extends('dashboard.layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create new Student</h1>
    </div>

    <div class="row">
        <div class="col-lg-10 col-md-12 col-sm-12">
            <div class="card-body ">
                <form action="{{ url('student/'.$students['id']) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $students['name']) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Birthday</label>
                        <input type="date"
                            class="form-control @error('birthday')
                                is-invalid
                            @enderror"
                            id="birthday" name="birthday" value="{{ old('birthday', $students['birthday']) }}">
                        @error('birthday')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="address" cols="30" rows="10"
                            class="form-control @error('address')
                                is-invalid
                            @enderror">{{ old('address', $students['address']) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <select name="classroom_id" id="classroom_id" class="form-select">
                            <option selected>Choose Class</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom['id'] }}"
                                    {{ (old('classroom_id')  == $classroom['id']) || ($students['classroom']['id'] == $classroom['id']) ? 'selected' : '' }}>
                                    {{ $classroom['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
