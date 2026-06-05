@extends('layouts.app')
@section('title', 'Create New User')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="class-title">{{ $title ?? '' }}</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="email" class="form-control" placeholder="Enter Your Email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="">Password</label>
                <input type="password" class="form-control" placeholder="Enter Your Password" name="password" required>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
        </form>
    </div>
</div>
@endsection
