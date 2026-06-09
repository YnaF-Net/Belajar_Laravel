@extends('layouts.app')
@section('title', 'Create New Key')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="class-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('key.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Key</label>
                    <input type="number" name="name" class="form-control @error('name') is_invalid @enderror"
                        value="{{ old('name') }}" required>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="">Status</label> <br>
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
