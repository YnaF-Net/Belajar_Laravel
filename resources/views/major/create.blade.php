@extends('layouts.app')
@section('title', 'Create New Major')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="class-title">{{ $title ?? '' }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('major.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="">Status</label><br>
                <input type="radio" name="is_active" value="1" checked> Active
                <br>
                <input type="radio" name="is_active" value="0" checked> Inactive
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
