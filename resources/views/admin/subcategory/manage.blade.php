@extends('admin.layouts.layout')

@section('admin_layout')
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h2>SubCategories Table</h2>
                                
                            </div>
                            <div>
                                <a href="{{route('subcategory.create')}}"  class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>+
                        @endif
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope = "col">Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategories as $subCategory)
                                <tr>
                                    <td>{{ $subCategory->name}}</td>
                                    <td>{{ $subCategory->category->category_name}}</td>
                                    <td class="d-flex gap-4">
                                        <form action="{{route('subcategory.destroy', $subCategory->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                        </form>
                                        <a href="{{route('subcategory.edit',$subCategory->id)}}" class="btn btn-sm btn-warning">Edit</a>
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
</body>

@endsection
