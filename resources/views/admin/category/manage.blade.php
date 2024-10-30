@extends('admin.layouts.layout')

@section('admin_layout')
   
        
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2>Categories Table</h2>
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
                                    <th scope = "col">Id</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id}}</td>
                                        <td>{{ $category->category_name}}</td>
                                        <td class="d-flex gap-4">
                                            <form action="{{route('categories.destroy', $category->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">Delete</button>
                                            </form>
                                            <a href="{{route('categories.edit',$category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                        </td>
                                        
                                    </tr>
                                  
                                  @endforeach
                                  
                                </tbody>
                            </table>
                           
                                <div class="d-flex h-50">
                                    
                                        {{ $categories->links() }}
                                    
                                    
                                </div>
                                
                                                       
                            
                               
                        </div>
                            
                        
                            
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
@endsection
