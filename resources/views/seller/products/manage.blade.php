@extends('seller.layouts.master')

@section('seller_layout')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between p-10" >
                    <h2>Products Table</h2>
                    <div>
                        <a href="{{route('product.create')}}" class="btn btn-sm btn-primary"> Add New</a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Filter
                        </button>
                    </div>
                    
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter Products</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('product.manage')}}" method="GET" class="">
                                    <div class="mb-3">
                                        <label for="store_id" class="form-label">Store</label>
                                        
                                        <select name="store_id" id="store_id" class="form-select">
                                            <option value="">All Stores</option>
                                            @foreach($stores as $store)
                                            <option value="{{ $store->id }}" {{ request('store_id') == $store->id ? 'selected' : '' }}>
                                                {{ $store->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select name="category" id="categoryId" class="form-select">
                                            <option value="">All Categories</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ request('categoryId') == $category->id ? 'selected' : ''}}>{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="price_min" class="form-label">Min Price</label>
                                        <input type="number" name="price_min" class="form-control mx-2" placeholder="Min Price" value="{{ request('price_min') }}">
                                        
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="price_max" class="form-label">Max Price</label>
                                        <input type="number" name="price_max" class="form-control mx-2" placeholder="Max Price" value="{{ request('price_max') }}">
                                    </div>
                                
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </form>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope = "col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Product Description</th>
                            <th scope="col">Subcategory Name</th>
                            <th scope="col">Store Name</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" style="height: 50px; width:auto"></td>
                                <td>{{ $product->name}}</td>
                                <td>{{$product->subcategories->category->category_name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->productDescription}}</td>
                                <td>{{$product->subcategories->name}}</td>
                                <td>{{$product->store->name}}</td>
                                <td class="d-flex gap-4 pb-5 pt-3">
                                    <form action="{{route('product.delete', $product->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                    </form>
                                    <a href="{{route('product.edit', $product->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                          
                          @endforeach
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
