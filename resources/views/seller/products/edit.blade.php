@extends('admin.layouts.layout')

@section('admin_layout')
<div class="container">
    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('product.update', $products->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- This is required to make a PUT request -->

        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $products->name) }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $products->price) }}" required>
        </div>
        <div class="form-group">
            <label for="productDescription">Description</label>
            <input type="text" class="form-control" id="productDescription" name="productDescription" value="{{ old('productDescription', $products->productDescription) }}" required>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary">Update</button>    
        </div>
    </form>
</div>
    
@endsection