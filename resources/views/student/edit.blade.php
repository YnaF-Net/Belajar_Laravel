@extends('layouts.app')
@section('title', 'Edit Student')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('student.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="">Major *</label>
                    <select name="major_id" id="" class="form-control">
                        <option value="">Select One</option>
                        @foreach ($majors as $major)
                            <option {{ $major->id == $edit->major_id ? 'selected' : '' }} value="{{ $major->id }}">
                            {{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="">Student Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" value="{{ $edit->name }}">
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone" value="{{ $edit->phone }}">
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="email" value="{{ $edit->user->email }}">
                </div>
                <div class="mb-3">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Enter Your Password" name="password" value="{{ $edit->password }}">
                    <span class="text-secondary">
                        )* Leave blank if you don't want to change it
                    </span>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
