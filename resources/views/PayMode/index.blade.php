<!-- resources/views/PayMode/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pay Modes</h1>
    <a href="{{ route('pay_mode.create') }}" class="btn btn-primary">Create New Pay Mode</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Observation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payMode as $payMode)
                <tr>
                    <td>{{ $payMode->id }}</td>
                    <td>{{ $payMode->name }}</td>
                    <td>{{ $payMode->observation }}</td>
                    <td>
                        <a href="{{ route('pay_mode.show', $payMode->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('pay_mode.edit', $payMode->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pay_mode.destroy', $payMode->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
