@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="hero">
        <span class="eyebrow">Midterm Project Dashboard</span>
        <h1>Welcome to UMVISAL-SV34 Project</h1>
        <p class="subtitle">Laravel 13 Midterm Exam Demo Project — Web Project (SV34)</p>

        <div class="action-row">
            <a class="btn btn-primary" href="/product/listproduct">View Products</a>
            <a class="btn btn-success" href="/category/show">View Categories</a>
            <a class="btn btn-secondary" href="/employee/home">Employee List</a>
        </div>
    </div>
@endsection
