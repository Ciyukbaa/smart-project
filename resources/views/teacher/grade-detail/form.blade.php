@extends('layouts.main')
@section('container')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (isset($gradeDetail))
    <form method="POST" action="{{ route('grade-detail.update', $gradeDetail->id) }}" autocomplete="off">
    @method('PUT')
@else
    <form method="POST" action="{{ route('grade-detail.store') }}" autocomplete="off">
@endif
    @csrf

    <div class="row">
        <div class="col-12">
            <h5 class="form-title"><span>{{ $title }}</span></h5>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="grade_id"> Grade <span class="login-danger">*</span></label>
                <select name="grade_id" id="grade_id" class="form-control data-select-2 @error('grade_id') is-invalid @enderror">
                    <option value="">Select Grade</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}"
                            @if (isset($gradeDetail) && $gradeDetail->grade_id == $grade->id)
                                selected
                            @endif >
                            {{ $grade->taskType->name ?? '' }} -
                            {{ $grade->teacherClassroomRelationship->teacherHomeroomRelationship->classroom->classroomType->name ?? '' }} -
                            {{ $grade->teacherClassroomRelationship->teacherHomeroomRelationship->classroom->name ?? '' }} -
                            {{ $grade->teacherClassroomRelationship->teacherSubjectRelationship->teacher->name ?? '' }} -
                            {{ $grade->teacherClassroomRelationship->teacherSubjectRelationship->subject->name ?? '' }}
                        </option>
                    @endforeach
                </select>
                @error('grade_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-sm-6">
            <div class="form-group local-forms">
                <label for="student_id">Student <span class="login-danger">*</span></label>
                <select name="student_id" id="student_id" class="form-control data-select-2 @error('student_id') is-invalid @enderror">
                    <option value="">Select Student</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}"
                            @if (isset($gradeDetail) && $gradeDetail->student_id == $student->id)
                                selected
                            @endif
                        >
                            {{ $student->name }}
                        </option>
                    @endforeach
                </select>
                @error('student_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="form-group local-forms">
                <label for="value">Value <span class="login-danger">*</span></label>
                <input type="text" id="value" name="value" class="form-control @error('value') is-invalid @enderror" value="{{ isset($gradeDetail) ? $gradeDetail->value : old('value') }}">
                @error('value')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="col-12">
            <div class="gradeDetail-submit">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('grade-detail.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
    </form>

@endsection