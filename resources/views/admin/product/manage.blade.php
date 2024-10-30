@extends('admin.layouts.layout')



@section('admin_layout')
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-10" >
                            <h2>Categories Table</h2>
                            <a href="{{route('admin.products.create')}}" class="btn btn-sm btn-primary"> Add New</a>
                            
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
                                        <td class="d-flex gap-4 pb-5 pt-3">
                                            <form action="{{route('admin.products.delete', $product->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                            </form>
                                            <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-sm btn-warning">Edit</a>
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

