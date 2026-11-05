@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Categories</span>
        <h2>Add Category Information</h2>
        <p class="subtitle">Add a new item category to the database.</p>
    </div>

    <form>
        <div class="form-group">
            <label for="category-name">Category Name</label>
            <input id="category-name" type="text" placeholder="Enter category name">
        </div>
        <div class="form-group">
            <label for="category-desc">Description</label>
            <textarea id="category-desc" rows="4" placeholder="Enter category description"></textarea>
        </div>
        <div class="action-row" style="justify-content: flex-start;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/category/show" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
