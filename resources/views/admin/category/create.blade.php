@extends('admin.layouts.layout')

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Create Category</h2>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{route('store.cat')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="createCat" class="form-label">Category Name</label>
                          <input type="text" class="form-control" id="createCat" name="createCat" aria-describedby="Category">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
