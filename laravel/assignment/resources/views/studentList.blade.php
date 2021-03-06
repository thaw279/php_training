@extends('layouts.app')
@section('content')
@if (Session::has('successMessage'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('successMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (Session::has('deleteMessage'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ Session::get('deleteMessage') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="mb-3">
    <a href="{{ route('addStudent.get') }}" class="btn btn-outline-success"> <i class="fa fa-plus"></i> Add Student</a>
    <div class="float-end">
        <a href="{{ route('student.export.pdf') }}" class="btn btn-outline-secondary"><i class="fas fa-download"></i> Export PDF</a>
        <a href="{{ route('student.export') }}" class="btn btn-outline-primary"><i class="fas fa-download"></i> Export CSV</a>
        <a href="{{ route('student.import.get') }}" class="btn btn-outline-info"><i class="fas fa-file-import"></i> Import</a>
        <a href="{{ route('search.get') }}" class="btn btn-outline-secondary"><i class="fas fa-search"></i> Search</a>
        <a href="{{ route('mail.get') }}" class="btn btn-outline-info"><i class="far fa-envelope"></i> Send Mail</a>
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>City</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (count($students)>0)
        @foreach ($students as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->major->name }}</td>
            <td>{{ $item->city }}</td>
            <td>
                <a href="{{ route('edit.student.get',$item->id) }}"><i class="fas fa-edit text-primary"></i></a>
                <i class="fas fa-trash-alt text-danger" data-bs-toggle="modal" data-bs-target="#modal{{ $item->id }}"></i>
                <!-- Modal -->
                <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete this record?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <a href="{{ route('delete.student',$item->id) }}" class="btn btn-danger">Yes</a>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6">
                <p class="d-flex justify-content-center text-danger">No students yet!</p>
            </td>
        </tr>
        @endif


    </tbody>
</table>
@endsection
