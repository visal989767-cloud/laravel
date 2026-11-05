@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    <div class="hero" style="padding: 30px 24px; text-align: left;">
        <span class="eyebrow">Products</span>
        <h2>Add Product Information</h2>
        <p class="subtitle">Create a new product entry in the catalog system.</p>
    </div>

    <form>
        <div class="form-group">
            <label for="name">Product Name</label>
            <input id="name" type="text" placeholder="Enter product name">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input id="price" type="text" placeholder="Enter product price">
        </div>
        <div class="action-row" style="justify-content: flex-start;">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="/product/listproduct" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
