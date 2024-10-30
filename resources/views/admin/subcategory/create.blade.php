@extends('admin.layouts.layout')

@section('admin_layout')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create Sub Category</h2>
                </div>
                
                <div class="card-body">
                    @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category">Select Category:</label>
                            <select name="category" id="category" class="form-select">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="mb-3">
                            <label for="subcategory" class="form-label">Create Subcategory</label>
                            <input type="text" class="form-control" name="subcategory" required>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection


    
   
