@extends('layouts.app')

@section('title', 'Delete Employee')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Employees</span>
        <h2>Delete Employee</h2>
        <p class="subtitle">Employee removal confirmation.</p>
    </div>

    <p>Employee with ID <strong>{{ $empid }}</strong> has been removed (demo only).</p>

    <div class="action-row" style="justify-content: flex-start; margin-top: 20px;">
        <a class="btn btn-secondary" href="{{ url('/employee/home') }}">Back Home</a>
    </div>
@endsection
