@extends('admin.layouts.layout')

@section('admin_layout')
    
    <div class="container">
        <h1>Edit Category</h1>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is required to make a PUT request -->
    
            <div class="form-group">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="{{ old('category_name', $category->category_name) }}" required>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Update Category</button>    
            </div>
        </form>
    </div>
@endsection