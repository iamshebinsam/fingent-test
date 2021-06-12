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
    <a class="btn btn-primary" href="{{ route('mark.create') }}">Create Mark</a>
    <hr>
    <table class="table table-bordered">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Maths</th>
            <th scope="col">Science</th>
            <th scope="col">History</th>
            <th scope="col">Term</th>
            <th scope="col">Total Marks</th>
            <th scope="col">Created On</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach ($marks as $mark)
            <tr>
                <th scope="row">{{ $mark->id}}</th>
                <td>{{ $mark->student->name }}</td>
                <td>{{ $mark->maths }}</td>
                <td>{{ $mark->science }}</td>
                <td>{{ $mark->history }}</td>
                <td>{{ $mark->term->name }}</td>
                <td>{{ $mark->getTotal() }}</td>
                <td>{{ $mark->created_at}}</td>
                <td>
                    <form method="POST" action="{{ route('mark.destroy', $mark->id) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <a class="btn btn-primary" href="{{ route('mark.edit', $mark->id) }}">Edit</a>
                        <button type="submit" class="p-2 btn btn-danger" href="{{ route('mark.destroy', $mark->id) }}">Delete</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $marks->links() }}
</div>


@endsection