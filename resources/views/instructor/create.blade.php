@extends('layouts.app')
@section('title', 'Create New Instructor')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('instructor.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">Major *</label>
                    <select name="major_id" id="" class="form-control">
                        <option value="">-- Select One --</option>
                        @foreach ($majors as $major)
                            <option @selected(old('major_id') == $major->id) value="{{ $major->id }}">
                                {{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Name *</label>
                    <input type="text" class="form-control
                    @error('name') is-invalid @enderror"
                        placeholder="Enter Your Name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Enter Your Number">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter Your Email" required>
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
