@extends('layouts.app')
@section('title', 'Create New Role')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="class-title">{{ $title ?? '' }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('student.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Major *</label>
                <select name="major_id" id="" class="form-control">
                    <option value="">Select One</option>
                    @foreach ($majors as $major )
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Name *</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="">Phone *</label>
                <input type="number" class="form-control" name="phone" placeholder="Enter Your Phone" required>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
