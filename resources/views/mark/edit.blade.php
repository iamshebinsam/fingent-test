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
                    <form method="POST" action="{{ route('mark.update', $mark->id) }}">
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student</label>
                            <select id="student_id" name="student_id" class="form-select form-control">
                                <option>Open this select menu</option>
                                @foreach($students as $student)
                                <option {{ $mark->student_id === $student->id ? 'selected' : '' }} value="{{ $student->id }}"> {{ $student->name }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="term_id" class="form-label">Term</label>
                                <select id="term_id" name="term_id" class="form-select form-control">
                                    <option>Open this select menu</option>
                                    @foreach($terms as $term)
                                    <option {{$mark->term_id === $term->id ? 'selected' : '' }} value="{{ $term->id }}"> {{ $term->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="maths" class="form-label">Maths</label>
                                <input type="number" name="maths" class="form-control" id="maths" placeholder="Maths" value="{{ old('maths')?old('maths'):$mark->maths }}">
                            </div>

                            <div class="mb-3">
                                <label for="science" class="form-label">Science</label>
                                <input type="number" name="science" class="form-control" id="science" placeholder="Science" value="{{ old('science')?old('science'):$mark->science }}">
                            </div>

                            <div class="mb-3">
                                <label for="history" class="form-label">History</label>
                                <input type="number" name="history" class="form-control" id="history" placeholder="History" value="{{ old('history')?old('history'):$mark->history }}">
                            </div>

                            <hr>
                            <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection