@extends('layouts.app')

@section('content')
<div class="container">
    @if (Session::has('message'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        @if(Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif
    </div>
    @endif
    <a class="btn btn-primary" href="{{ route('student.create') }}">Create Student</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Gender</th>
            <th scope="col">Reporting Teacher</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <th scope="row">{{ $student->id}}</th>
                <td>{{ $student->name }}</td>
                <td>{{ $student->age }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->teacher->name }}</td>
                <td>
                    <form method="POST" action="{{ route('student.destroy', $student->id) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <a class="p-2 btn btn-primary" href="{{ route('student.edit', $student->id) }}">Edit</a>
                        <button type="submit" class="p-2 btn btn-danger" href="{{ route('student.destroy', $student->id) }}">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $students->links() }}
</div>

@endsection