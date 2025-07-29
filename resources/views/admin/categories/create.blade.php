@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
    <h2>Add New Category</h2>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <div class="mb-3">
            <label>Category Name</label>
            <input name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <button class="btn btn-success">Save Category</button>
    </form>
@endsection
