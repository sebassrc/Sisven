<!-- resources/views/PayMode/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Pay Mode</h1>
    <form action="{{ route('pay_mode.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="observation">Observation</label>
            <textarea class="form-control" id="observation" name="observation"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
