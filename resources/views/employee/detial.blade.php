@extends('layouts.app')

@section('title', 'Employee Detail')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Employees</span>
        <h2>Employee Detail</h2>
        <p class="subtitle">Detailed profile information for the selected employee.</p>
    </div>

    <table>
        <tr><th>Employee ID</th><td>{{ $empid }}</td></tr>
        <tr><th>Name</th><td>{{ $empname }}</td></tr>
        <tr><th>Position</th><td><span class="status-tag">{{ $position }}</span></td></tr>
    </table>

    <div class="action-row" style="justify-content: flex-start; margin-top: 24px;">
        <a class="btn btn-secondary" href="{{ url('/employee/home') }}">Back Home</a>
        <a class="btn btn-primary" href="{{ url('/employee/edit/'.$empid.'/'.$empname.'/'.$position) }}">Edit</a>
        <a class="btn btn-danger" href="{{ url('/employee/delete/'.$empid) }}">Delete</a>
    </div>
@endsection
