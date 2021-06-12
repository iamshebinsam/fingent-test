@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('student.update', $student->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name')?old('name'):$student->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" name="age" class="form-control" id="Age" placeholder="Age" value="{{ old('age')?old('age'):$student->age }}">
                        </div>
                        <div class="form-check">
                            <input value="M" class="form-check-input" type="radio" name="gender" id="male" {{ $student->gender ==='M'?'checked':'' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input value="F" class="form-check-input" type="radio" name="gender" id="female" {{ $student->gender ==='F'?'checked':'' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>

                        <select name="teacher_id" class="form-select form-control" aria-label="Default select example">
                            <option>Open this select menu</option>
                            @foreach($teachers as $teacher)
                            <option {{$student->teacher->id == $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection