@extends('layouts.app')

@section('title', 'LOCKER MANAGEMENT')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">{{ $title ?? '' }}</h3>
    </div>

```
<div class="card-body">
    <div class="mb-3 text-end">
        <a href="{{ route('locker.create') }}" class="btn btn-primary">
            Create New Locker
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Locker Code</th>
                <th>Major Name</th>
                <th>Batch</th>
                <th>Status</th>
                <th width="150">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($lockers as $index => $locker)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $locker->locker_name }}</td>
                    <td>{{ $locker->major_name }}</td>
                    <td>{{ $locker->batch }}</td>
                    <td>
                        @if ($locker->status == 'Available')
                            <span class="badge bg-primary">
                                {{ $locker->status }}
                            </span>
                        @elseif ($locker->status == 'Unavailable')
                            <span class="badge bg-secondary">
                                {{ $locker->status }}
                            </span>
                        @elseif ($locker->status == 'Damaged')
                            <span class="badge bg-warning">
                                {{ $locker->status }}
                            </span>
                        @elseif ($locker->status == 'Missing')
                            <span class="badge bg-danger">
                                {{ $locker->status }}
                            </span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('locker.edit', $locker->id) }}"
                            class="btn btn-outline-success">
                            <i class="bi bi-pencil"></i>
                        </a>

                        <form action="{{ route('locker.destroy', $locker->id) }}"
                            method="POST"
                            class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-outline-danger"
                                onclick="return confirm('Yakin ingin menghapus locker {{ $locker->locker_name }} ?')">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
```

</div>
@endsection
