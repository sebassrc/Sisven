<!-- resources/views/PayModes/edit.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pay Mode</h1>
    <form action="{{ route('pay_mode.update', $payMode->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $payMode->name }}" required>
        </div>
        <div class="form-group">
            <label for="observation">Observation</label>
            <textarea class="form-control" id="observation" name="observation">{{ $payMode->observation }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
