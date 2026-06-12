@extends('layouts.app')
@section('title', 'Create New Menu')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('menu.update', $menu->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class=" col-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" value="{{ $menu->name }}" required class="form-control"
                            required placeholder="Enter your name">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="parent-id">Parent Id</label>
                        <select name="parent_id" id="parent-id" class="form-control">
                            <option value="">Select One</option>
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" {{ $parent->id == $menu->parent_id ? 'selected' : '' }}>
                                    {{ $parent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Icon</label>
                        <input type="text" class="form-control" name="icon" placeholder="Enter Icon you want"
                            value="{{ $menu->icon }}">
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Url</label>
                        <input type="text" class="form-control" name="url" placeholder="Enter url"
                            value="{{ $menu->url }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Sort Order</label>
                        <input type="text" class="form-control" name="sort_order" placeholder="Enter your sort order"
                            value="{{ $menu->sort_order }}">
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Status</label>
                        <input type="radio" name="is_active" value="1" {{ $menu->is_active == 1 ? 'checked' : '' }}>
                        Active
                        <input type="radio" name="is_active" value="0" {{ $menu->is_active == 0 ? 'checked' : '' }}>
                        Inactive
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12"><br>
                        <label class="form-label d-block">Assign to Roles</label>
                        @foreach ($roles as $role)
                            <div class="form-check form-check-inline">
                                <input type="checkbox" name="roles[]" id="role-{{ $role->id }}"
                                    value="{{ $role->id }}" {{ in_array($role->id, $menuRoles) ? 'checked' : '' }}>
                                <label for="role-{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="text-end mt-2 ">
                    <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'simpan' ?>">
                        <?= isset($_GET['edit']) ? 'Save Change' : 'Save' ?>
                    </button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

        </div>

    </div>

@endsection
