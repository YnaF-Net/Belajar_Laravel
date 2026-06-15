@extends('layouts.app')
@section('title', 'Role')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $title ?? '' }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('role.update', $edit->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Role Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Name" name="name" required
                        value="{{ $edit->name }}">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Status</label> <br>
                    <input type="radio" name="is_active" value="1" class="form-check-input mb-2"
                        {{ $edit->is_active == 1 ? 'checked' : '' }}> Active <br>
                    <input type="radio" name="is_active" value="0" class="form-check-input"
                        {{ $edit->is_active == 0 ? 'checked' : '' }}> Inactive
                </div>

                <div class="row">
                    @foreach ($parents as $parent)
                        <div class="col-md-4 mb-3">
                            <div class="border rounded p-3">
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="menu_ids[]" value="{{ $parent->id }}"
                                        class="form-check-input">
                                    <label for="" class="form-check-label fw-bold">{{ $parent->name }}</label>
                                </div>
                                @foreach ($parent->children as $child)
                                    <div class="form-check ms-3">
                                        <input type="checkbox" name="menu_ids[]" value="{{ $child->id }}"
                                            class="form-check-input">
                                        <label for="">{{ $child->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>


                {{-- <div class="mb-3">
                    <label for="" class="form-label d-block">Assign to Menus</label>
                    @foreach ($menus as $menu)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="menus[]" id="menu-{{ $menu->id }}" value="{{ $menu->id }}"
                                {{ in_array($menu->id, $menuRoles) ? 'checked' : '' }}>

                            <label class="form-check-label" for="menu-{{ $menu->id }}">
                                {{ $menu->name }}
                            </label>
                        </div>
                    @endforeach
                </div><br> --}}
                <button class="btn btn-primary" type="submit">Save</button>
                <a href="{{ url()->previous() }}" class="text-secondary">Back</a>
            </form>
        </div>
    </div>
@endsection
