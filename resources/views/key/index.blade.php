@extends('layouts.app')
@section('title', 'KEYS MANAGEMENT')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
        <div class="mb-3" align="right">
            <a href="{{ route('key.create') }}" class="btn btn-primary">Create New Key</a>
        </div>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keys as $index => $key)
                        <tr>
                            <td>{{ $index += 1 }}</td>
                            <td>{{ $key->name ?? '' }}</td>
                            <td>
                                @if ($key->is_active ==1)
                                <span class="badge text-white bg-primary">Active</span>
                                @else
                                <span class="badge text-white bg-danger">Inactive</span>
                                @endif
                             </td>
                            <td>
                                <a href="{{ route('key.edit', $key->id) }}" class="btn btn-success icon">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                {{-- <a href="" class="btn btn-danger icon">
                                    <i class="bi bi-trash"></i> Delete
                                </a> --}}
                                <form action="{{ route('key.destroy', $key->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
