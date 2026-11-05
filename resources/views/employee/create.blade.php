@extends('layouts.app')

@section('title', 'Add Employee')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Employees</span>
        <h2>Add Employee Information</h2>
        <p class="subtitle">Add a new employee record to the team directory.</p>
    </div>

    <form method="POST" action="{{ url('/employee/save') }}">
        @csrf
        <div class="form-group">
            <label>Employee Name</label>
            <input type="text" name="empname" placeholder="Enter employee name">
        </div>

        <div class="form-group">
            <label>Position</label>
            <input type="text" name="position" placeholder="Enter position">
        </div>

        <div class="action-row" style="justify-content: flex-start;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-secondary" href="{{ url('/employee/home') }}">Back Home</a>
        </div>
    </form>
@endsection
