@extends('layouts.app')

@section('title', 'Edit Employee')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Employees</span>
        <h2>Edit Employee Information</h2>
        <p class="subtitle">Update the employee record with the latest details.</p>
    </div>

    <form method="POST" action="{{ url('/employee/update/'.$empid) }}">
        @csrf
        <div class="form-group">
            <label>Employee ID</label>
            <input type="text" value="{{ $empid }}" readonly>
        </div>

        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="empname" value="{{ $empname }}">
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" value="{{ $position }}">
        </div>

        <div class="action-row" style="justify-content: flex-start;">
            <button type="submit" class="btn btn-primary">Update</button>
            <a class="btn btn-secondary" href="{{ url('/employee/home') }}">Back Home</a>
        </div>
    </form>
@endsection
