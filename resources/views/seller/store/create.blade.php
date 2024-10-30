@extends('seller.layouts.master')

@section('seller_layout')
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
                <form action="{{route('store.s')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="store_name" class="form-label">Store Name</label>
                      <input type="text" class="form-control" id="store_name" name="store_name" aria-describedby="Store">
                      <label for="details" class="form-label">Details</label>
                      <textarea name="details" id="details" rows="4" cols="50" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
