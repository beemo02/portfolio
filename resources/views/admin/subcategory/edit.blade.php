@extends('admin.layouts.layout')

@section('admin_layout')
    
    <div class="container">
        <h1>Edit SubCategory</h1>
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('subcategory.update', $subCat->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- This is required to make a PUT request -->
    
            <div class="form-group">
                <label for="scategory_name">Name</label>
                <input type="text" class="form-control" id="scategory_name" name="scategory_name" value="{{ old('name', $subCat->name) }}" required>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary">Update SubCategory</button>    
            </div>
        </form>
    </div>
@endsection