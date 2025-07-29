@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<h4>Edit Product - {{ $product->name }}</h4>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control" required>
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected':'' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Price (Ksh)</label>
        <input type="number" name="price" value="{{ $product->price }}" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Image</label><br>
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mb-2">
        @endif
        <input type="file" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" rows="4" class="form-control">{{ $product->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>
@endsection
