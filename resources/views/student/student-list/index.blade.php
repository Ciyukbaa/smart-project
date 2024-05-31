@extends('layouts.main')
@section('container')
    @if (session()->has('successMessage'))
        <div class="alert alert-success">
            {{ session('successMessage') }}
        </div>
    @endif

    @if (session()->has('errorMessage'))
        <div class="alert alert-danger">
            {{ session('errorMessage') }}
        </div>
    @endif

    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{ $title }}</h3>
            </div>
            <div class="col-auto text-end float-end ms-auto download-grp">
                <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                <a href="{{ URL::to('student/student-list/create') }}" class="btn btn-primary"><i
                        class="fas fa-plus"></i></a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead class="student-thread">
                <tr class="text-center">
                    <th>#</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone</th>
                    <th>NIK</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $index => $student)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->username }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->born_date }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->nik }}</td>
                        <td>{{ $student->address }}</td>
                        <td class="align-middle text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <a href="{{ URL::to('student/student-list/' . $student->id) }}"
                                    class="btn btn-sm btn-outline-info me-2"><i class="fas fa-eye"></i></a>
                                <a href="{{ URL::to('student/student-list/' . $student->id) . '/edit' }}"
                                    class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form method="POST"
                                    action="{{ URL::to('student/student-list/' . $student->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Anda yakin mau menghapus siswa {{ $student->name }} ?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
