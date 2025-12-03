@extends('layouts.layout')


@section('title', 'Student List')


@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>List of students</h2>
        <a href="{{ route('students.create') }}" class="btn btn-success">Add a student</a>
        <a href="{{ route('students.trashed') }}" class="btn btn-success">Show removed</a>
       
    </div>


    <table class="table table-striped">
        <thead>
            <tr>
            <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Address</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->surname }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->phone }}</td>
                <td>{{ $student->city->name }}</td>


                <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
               
            </tr>
            @endforeach


        </tbody>
    </table>


    {{ $students->links() }} <!-- Pagination -->
@endsection
