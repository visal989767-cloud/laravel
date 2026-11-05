@extends('layouts.app')

@section('title', 'Add Student')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Students</span>
        <h2>Welcome to Add Student Form</h2>
        <p class="subtitle">Enter new student information into the system.</p>
    </div>

    <form>
        <div class="form-group">
            <label for="student-name">Student Name</label>
            <input id="student-name" type="text" placeholder="Enter student name">
        </div>
        <div class="form-group">
            <label for="student-class">Class</label>
            <input id="student-class" type="text" placeholder="Enter class name">
        </div>
        <div class="action-row" style="justify-content: flex-start;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/student/info/allstudent" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
