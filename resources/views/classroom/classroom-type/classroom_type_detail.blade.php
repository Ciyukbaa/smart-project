@extends('layouts.main')
@section('container')
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color: transparent; border: none;">
            @if (auth()->user()->role == 'Admin')
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            @elseif (auth()->user()->role == 'Super Admin')
                <li class="breadcrumb-item"><a href="{{ route('superAdmin.dashboard') }}">Dashboard</a></li>
            @elseif (auth()->user()->role == 'Teacher')
                <li class="breadcrumb-item"><a href="{{ route('teacher.dashboard') }}">Dashboard</a></li>
            @endif
            <li class="breadcrumb-item"><a href="{{ URL::to('classroom/classroom-type/') }}">Classroom Types</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-12">
            <h5 class="form-title"><span>{{ $title }}</span></h5>
        </div>
        <div class="col-12">
            <div class="form-group local-forms">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $classroom_type->name }}"
                    readonly>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group local-forms">
                <label for="description">Description</label>
                <input type="text" id="description" name="description" class="form-control"
                    value="{{ $classroom_type->description }}" readonly>
            </div>
        </div>
        <div class="col-12">
            <div class="classroom-type-submit">
                <a href="{{ URL::to('classroom/classroom-type/') }}" class="btn btn-sm btn-secondary">Back</a>
            </div>
        </div>
    @endsection
