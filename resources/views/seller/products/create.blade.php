@extends('seller.layouts.master')

@section('seller_layout')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create Product</h2>
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
            
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="productDescription" name="productDescription" required>
                    </div>
            
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select id="categorydropdown" class="form-control" required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
            
                    <div class="mb-3">
                        <label for="subCategoryID" class="form-label">SubCategory</label>
                        <select id="subCategorydropdown" name="subCategoryID" class="form-control" required>
                            <option value="">Select SubCategory</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="stores" class="form-label">Store</label>
                        <select id="storedropdown" name="stores" class="form-control" required>
                            <option value="">Select Stores</option>
                            @foreach ($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="productImage" name="productImage" accept="image/*" required>
                    </div>
            
                    <button type="submit" class="btn btn-primary">Create Product</button>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script> var subCatUrl = "{{route('get.subcategories')}}";</script>
<script src="{{asset('admin-asset/js/query.js')}}"></script>
@endsection
@endsection
