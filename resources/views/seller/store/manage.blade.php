@extends('seller.layouts.master')

@section('seller_layout')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Stores Table</h2>
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
                            <th scope="col">Store Name</th>
                            <th scope="col">Details</th>
                            <th scope="col">Owner</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $store)
                            <tr>
                                <td>{{ $store->name}}</td>
                                <td>{{ $store->details}}</td>
                                <td>{{ $store->user->name}}</td>
                                <td class="d-flex gap-4">
                                    <form action="{{route('store.destroy', $store->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                    </form>
                                    <a href="{{route('store.edit', $store->id)}}" class="btn btn-sm btn-warning">Edit</a>
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
</html>
@endsection
