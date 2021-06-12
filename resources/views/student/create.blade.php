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
                    <form method="POST" action="{{ route('student.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input required type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input required min="15" max="50" type="number" name="age" class="form-control" id="Age" placeholder="Age" value="{{ old('age') }}">
                        </div>
                        <div class="form-check">
                            <input required value="M" class="form-check-input" type="radio" name="gender" id="male" {{ old('gender')==='M'?'checked':'' }}>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input required value="F" class="form-check-input" type="radio" name="gender" id="female" {{ old('gender')==='F'?'checked':'' }}>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>

                        <select required name="teacher_id" class="form-select form-control">
                            <option>Select Teachers</option>
                            @foreach($teachers as $teacher)
                            <option {{old('teacher_id') === $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}"> {{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        <hr>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection