@extends('layouts.app')

@section('title', 'List Employee Information')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Employees</span>
        <h2>Employee Information</h2>
        <p class="subtitle">Manage the employee directory and access details quickly.</p>
    </div>

    <div class="action-row" style="justify-content: flex-start; margin: 24px 0;">
        <a class="btn btn-primary" href="{{ url('/employee/create') }}">Add New Employee</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Employee Name</th>
                <th>Position</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $emp)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $emp['empname'] }}</td>
                    <td><span class="status-tag">{{ $emp['position'] }}</span></td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('/employee/detial/'.$emp['empid'].'/'.$emp['empname'].'/'.$emp['position']) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
